<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Course;
use App\Models\UserCourse;
use App\Models\CoursePrice;
use App\User;
use Mail;
use Validator;
use Response;
use View;
use Auth;
use Hash;
use Carbon\Carbon;




class CourseController extends Controller
{
    public function index() {

        $courses = Course::all();

        return view('all-courses', ['courses' => $courses]);
    }


    public function preparingCourse(Request $request){
        $id = $request->input('course_id');
        $device_id = $request->input("device_id");
        // if($device_id != (Auth::user()->device_id || Auth::user()->device_id_2)) {

        // }
        $route = route('single-course',['id'=>$id, 'device'=>$device_id])."#course-content";
        return $route;
    }

    public function singleCourse($id, $device) {



        $course = Course::findOrFail($id);
        $user_assigned_to_course = null;
        $course_price = CoursePrice::where('course_id', '=', $id)->first();


        //checking if loged user have permission to see course
        if(Auth::user()) {
            $user_assigned_to_course = UserCourse::where('user_id', '=', Auth::user()->id)
            ->where("course_id", "=", $id)->get();

        }

        //checking if user attempts to watch course from 3td device


        return view('course2', [
            "course" => $course,
            "user_assigned_to_course" => $user_assigned_to_course,
            "course_price"  => $course_price,
            'device' => $device
        ]);
    }

    public function courseSubscription(Request $request, $course_id=null) {
        $course_name    = Course::where('id', $course_id)->first('name');
        $course_price   = CoursePrice::where("course_id", '=', $course_id)->first();

        $path = storage_path() . "/json/countries.json";

        $countries = json_decode(file_get_contents($path), true);

        if ($request->isMethod('post')) {

            if(Auth::user()) {
                //send maja mail|
                //send user mail
                $user           = Auth::user();
                $name           = $user->name;
                $gender         = $user->gender;
                $course_name    = $course_name->name;

                $data = [
                    'name'          => $name,
                    'email'         => $user->email,
                    'birth_year'    => $user->birth_year,
                    'phone'         => $user->mobile_phone,
                    'relationship'  => $user->relationship,
                    'profession'    => $user->proffesion,
                    'gender'        => $gender,
                    'country'       => $user->place_of_living,
                    'course_name'   => $course_name,
                    'course_price'  => $course_price,
                    'country_code'  => false
                ];


                Mail::send(['text'=>'mails.to-admin'], $data, function($message) use ($data) {
                    $message->to('prijava.kursevi@gmail.com', 'Nova Prijava')->subject ('Nova Prijava')->replyTo($data['email']);
                    $message->from($data['email'], $data['name'] );
                });


                Mail::send(['html'=>'mails.test-mail'], $data, function($message) use ($data) {
                    $message->to($data['email'], 'Prijava na kurs')->subject ('Prijava na kurs')->replyTo($data['email']);
                    $message->from($data['email'], $data['course_name'] );
                });
            }else {

                $validator = Validator::make($request->all(), [
                    "name"      => "required",
                    "yob"       => "required",
                    "password"  => "required",
                    "email"     => "required|unique:users,email",

                ],
                [
                    "name.required"               => "Polje 'Ime i Prezime' je obavezno!",
                    "password.required"           => "Polje 'Lozinka' je obavezno!",
                    "yob.required"                => "Molimo izaberite godinu rodjenja",
                    "email.required"              => "Polje 'E-mail' je obavezno!",
                    "email.unique"                => "Uneta e-mail adresa vec postoji. Ulogujte se i probajte ponovo sa prijavom.",


                ]);
                if ($validator->passes()){

                    $name           = $request->input("name");
                    $yob            = $request->input("yob");
                    $email          = $request->input("email");
                    $password       = $request->input("password");
                    $country_code   = $request->input("country_code");
                    $phone          = $request->input("phone");
                    $reason         = $request->input("reason");
                    $country        = $request->input("countries");
                    $profession     = $request->input("profession");
                    $relationship   = $request->input("relationship");


                    $user_ip        = $request->ip();
                    $device_id      = $request->input('device_id');
                    $course_name    = $request->input('course_name');

                    $gender         = $request->input('gender');
                    $course_id      = $request->input('course_id');


                    $user = new User();

                    $user->name             = $name;
                    $user->email            = $email;
                    $user->birth_year       = $yob;
                    //posebno za pass
                    $user->password         = Hash::make($request->input('password'));
                    $user->mobile_phone     = $country_code.'/'.$phone;
                    $user->relationship     = $relationship;
                    $user->place_of_living  = $country;
                    $user->proffesion       = $profession;
                    $user->gender           = $gender;
                    $user->ip_address       = $user_ip;
                    $user->device_id        = $device_id;

                    $user->role_id       = 2;

                    if($user->save()) {

                        $data = [
                            'name'          => $name,
                            'email'         => $email,
                            'birth_year'    => $yob,
                            'gender'        => $gender,
                            'country_code'  => $country_code,
                            'phone'         => $phone,
                            'relationship'  => $relationship,
                            'profession'    => $profession,
                            'country'       => $country,
                            'course_name'   => $course_name,
                            'course_price'  => $course_price
                        ];
                        Mail::send(['text'=>'mails.to-admin'], $data, function($message) use ($data) {
                            $message->to('prijava.kursevi@gmail.com', 'Nova Prijava')->subject ('Nova Prijava')->replyTo($data['email']);
                            $message->from($data['email'], $data['name'] );
                        });


                        Mail::send(['html'=>'mails.test-mail'], $data, function($message) use ($data) {
                            $message->to($data['email'], 'Prijava na kurs')->subject ('Prijava na kurs')->replyTo($data['email']);
                            $message->from($data['email'], $data['course_name'] );
                        });


                    }


                    //return with success message
                }else {


                    return redirect(url()->previous().'#form-apply')
                    ->withErrors($validator)
                    ->withInput();
                }

                // return redirect(url()->previous().'#form-apply')->with('success','Uspesno ste se prijavili na kurs!');

            }


            return view('success-apply', [
                'anchor' => 'success',
                'user'   => $name,
                'course' => $course_name,
                'gender' => $gender
            ]);

        }

        return view('form-for-apply', [
            'course_name' => $course_name->name,
            'course_id'   => $course_id,
            'countries'   => $countries
        ]);
    }

    public function getPhoneCode(Request $request) {

        $path = storage_path() . "/json/countries.json";

        $countries = json_decode(file_get_contents($path), true);

        $countries = array_filter($countries);

        $country = collect($countries)->where("name","=","$request->country")->first();

        $country_phone_code = $country['dial_code'];



        return response()->json(['success'=>$country_phone_code]);
    }
}
