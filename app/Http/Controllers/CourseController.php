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

        $courses = Course::orderBy('created_at', 'desc')->get();

        return view('all-courses', ['courses' => $courses]);
    }


    /*this method is not used anymore*/
    public function preparingCourse(Request $request){
        $id = $request->input('course_id');
        $device_id = $request->input("device_id");
        // if($device_id != (Auth::user()->device_id || Auth::user()->device_id_2)) {

        // }
        $route = route('single-course',['id'=>$id, 'device'=>$device_id])."#course-content";
        return $route;
    }

    public function singleCourse($slug) {
        $course = Course::where("slug", "=", $slug)->first();

        $user_assigned_to_course = null;
        $course_price = CoursePrice::where('course_id', '=', $course->id)->first();


        //checking if loged user have permission to see course
        if(Auth::user()) {
            $user_assigned_to_course = UserCourse::where('user_id', '=', Auth::user()->id)
            ->where("course_id", "=", $course->id)->get();

        }

        //checking if user attempts to watch course from 3td device


        return view('course3', [
            "course" => $course,
            "user_assigned_to_course" => $user_assigned_to_course,
            "course_price"  => $course_price,
        ]);
    }

    public function courseSubscription(Request $request, $course_id=null) {
        $course         = Course::where('id', $course_id)->first();


        $course_name    = $course->name;
        $course_slug    = $course->first('slug');
        $course_slug    = $course_slug->slug;

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
                $course_name    = $course_name;

                $payment_country = $request->input('payment_country');
                $payment_method  = $request->input("payment_method");

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
                    'country_code'  => false,
                    'payment_country' => $payment_country,
                    'payment_method' => $payment_method,
                    'course_slug'    => $course_slug
                ];


                Mail::send(['text'=>'mails.to-admin'], $data, function($message) use ($data) {
                    $message->to('prijava.kursevi@gmail.com', $data['name'])->subject ($data['name'])->replyTo($data['email']);
                    $message->from($data['email'], $data['name'] );
                });




                if($course->is_free == 0) {
                    $mail_tmpl = ($payment_country === "Iz inostranstva") ? 'mails.test-mail' : 'mails.to-user';
                }else {
                    $mail_tmpl = 'mails.to-user-free-course';
                }


                Mail::send(['html'=>$mail_tmpl], $data, function($message) use ($data) {
                    $message->to($data['email'], 'Prijava na kurs')->subject ('Prijava na kurs')->replyTo($data['email']);
                    $message->from($data['email'], $data['course_name'] );
                });
            }
            else {

                $validator = Validator::make($request->all(), [
                    "name"      => "required",
                    "password"  => "required",
                    "email"     => "required|unique:users,email",
                    "phone"     => "required",
                    "countries" => "required"

                ],
                [
                    "name.required"               => "Polje 'Ime i Prezime' je obavezno.",
                    "password.required"           => "Polje 'Lozinka' je obavezno!",
                    "phone.required"              => "Molimo unesite Vaš broj telefona",
                    "email.required"              => "Polje 'E-mail' je obavezno.",
                    "email.unique"                => "Uneta e-mail adresa već postoji. Ulogujte se i probajte ponovo sa prijavom.",
                    "countries.required"          => "Polje 'Država' je obavezno.",


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

                    $payment_country = $request->input('payment_country');
                    $payment_method  = $request->input("payment_method");


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
                            'course_name'   => $course->name,
                            'course_price'  => $course_price,
                            'payment_country' => $payment_country,
                            'payment_method' => $payment_method,
                            'course_slug'    => $course_slug

                        ];

                        
                        Mail::send(['text'=>'mails.to-admin'], $data, function($message) use ($data) {
                            $message->to('prijava.kursevi@gmail.com', $data['name'])->subject ($data['name'])->replyTo($data['email']);
                            $message->from($data['email'], $data['name'] );
                        });


                        if($course->is_free == 0) {
                            $mail_tmpl = ($payment_country === "Iz inostranstva") ? 'mails.test-mail' : 'mails.to-user';
                        }else {
                            $mail_tmpl = 'mails.to-user-free-course';
                        }
                        

                        Mail::send(['html'=>$mail_tmpl], $data, function($message) use ($data) {
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
                'anchor'    => 'success',
                'user'      => $name,
                'course'    => $course,
                'gender'    => $gender
            ]);

        }

        if(!Auth::user()) {
            return view('form-for-apply', [
                'course'        => $course,
                'course_id'     => $course_id,
                'countries'     => $countries,
                'course_price'  => $course_price
    
            ]);
        }else {
            return redirect()->route('homepage');
        }

      
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
