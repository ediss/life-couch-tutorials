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


    public function preparingCourse($id, $device){

        $route = route('single-course',['id'=>$id, 'device'=>$device])."#course-content";
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
        

        if ($request->isMethod('post')) {


            if(Auth::user()) {
                //send maja mail|
                //send user mail
            }else {

                $validator = Validator::make($request->all(), [
                    "name"      => "required",
                    "yob"       => "required",
                    "email"     => "required|unique:users,email",

                ],
                [
                    "name.required"               => "Polje 'Ime i Prezime ' je obavezno!",
                    "yob.required"                => "Molimo izaberite godinu rodjenja",
                    "email.required"              => "Polje 'E-mail ' je obavezno!",
                    "email.unique"                => "Uneta e-mail adresa vec postoji. Ulogujte se i probajte ponovo sa prijavom.",


                ]);
                if ($validator->passes()){

                    $name           = $request->input("name");
                    $yob            = $request->input("yob");
                    $email          = $request->input("email");
                    $password       = $request->input("password");
                    $phone          = $request->input("phone");
                    $reason         = $request->input("reason");
                    $country        = $request->input("country");
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
                    $user->password         = Hash::make("12345678");
                    $user->mobile_phone     = $phone;
                    $user->relationship     = $relationship;
                    $user->place_of_living  = $country;
                    //profession is forgoten
                    $user->ip_address       = $user_ip;
                    $user->device_id        = $device_id;

                    $user->role_id       = 2;

                    if($user->save()) {

                        $data = [
                            'name'          => $name,
                            'email'         => $email,
                            'birth_year'    => $yob,
                            'gender'        => $gender,
                            'phone'         => $phone,
                            'relationship'  => $relationship,
                            'profession'    => $profession,
                            'country'       => $country,
                            'course_name'   => $course_name,
                            'course_price'  => $course_price
                        ];
                        Mail::send(['text'=>'mails.to-admin'], $data, function($message) use ($data) {
                            $message->to('skenderi.e94@gmail.com', 'Nova Prijava')->subject ('Nova Prijava')->replyTo($data['email']);
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

                return view('success-apply', [
                    'user' => $name,
                    'course' => $course_name,
                    'gender' => $gender
                ]);
            }


        }

        return view('form-for-apply', [
            'course_name' => $course_name->name,
            'course_id'   => $course_id
        ]);
    }
}
