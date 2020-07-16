<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\UserCourse;
use App\Models\CoursePrice;

use App\User;
use Carbon\Carbon;

use Validator;

class AdminController extends Controller
{
    public function index() {
        $courses = Course::all();

        return view ("admin.courses", [
            "courses" => $courses
        ]);
    }
    public function createCourse(Request $request) {

        $validator = null;
        if ($request->isMethod('post')) {
            //validation
            $validator = Validator::make($request->all(), [
                "course_name"           => "required",
                "intro_url"             => "required",
                "course_url"            => "required",
                // "cover_img"             => "required",
                "course_desc"           => "required",
                "course_program"        => "required",
                "course_content"        => "required",
                "course_organisation"   => "required",

            ]);

            if ($validator->passes()){
               //call model or Repo to save basic data

               $intro_url           = $request->input("intro_url");
            //    $cover_img           = $request->input("cover_img");
               $course_url          = $request->input("course_url");
               $course_desc         = $request->input("course_desc");
               $course_name         = $request->input("course_name");
               $course_content      = $request->input("course_content");
               $course_program      = $request->input("course_program");
               $course_organisation = $request->input("course_organisation");

               //prices
               $payment_in_full     = $request->input("payment_in_full");
               $premium_package     = $request->input("premium_package");
               $aplication_to       = $request->input("aplication_to");
               $number_of_rate      = $request->input("number_of_rate");
               $price_in_rate       = $request->input("price_in_rate");
               
               $payment_from_foreign_countries      = $request->input("payment_from_foreign_countries");
               $aplication_to_and_payfull           = $request->input("aplication_to_and_payfull");

               

               $course = new Course();
               $course->name                = $course_name;
               $course->intro_url           = $intro_url;
               //$course->cover_img         = $cover_img;
               $course->course_url          = $course_url;
               $course->description         = $course_desc;
               $course->course_content      = $course_content;
               $course->plan_and_program    = $course_program;
               $course->course_available    = Carbon::now()->addMonth(3);
               $course->course_organisation = $course_organisation;

            //    $course->save();
               //$course->saveCourse($course_data);

               if($course->save()) {
                    $course_price = new CoursePrice();

                    $course_price->course_id = $course->id;
                    $course_price->payment_in_full = $payment_in_full;
                    $course_price->payment_from_foreign_countries = $payment_from_foreign_countries;
                    $course_price->premium_package = $premium_package;
                    $course_price->aplication_to = $aplication_to;
                    $course_price->aplication_to_and_payfull = $aplication_to_and_payfull;
                    $course_price->number_of_rate = $number_of_rate;
                    $course_price->price_in_rate = $price_in_rate;

                    $course_price->save();

                    return back()->with('info','Uspesno ste uneli kurs!');

               }


                // if save success {
                 //   call model or repo to save price about course
               // }
            }

        }
        return view("admin.create_course", [
            "validator" => $validator
        ]);
    }

    public function addUserToCourse(Request $request, $course_id) {

        $users = User::where("role_id", "=", "2" )->get();

        if ($request->isMethod('post')) {

            //get user(s) id
            $users_id = $request->input("users");
            foreach($users_id as $user_id) {


                $user_course = new UserCourse();

                $user_course->course_id = $course_id;
                $user_course->user_id = $user_id;

                $user_course->save();

                
            }
            return back()->with('info','Uspesno ste dodelili kurs korisniku!');




        //add id course and userid to db
        }


        return view('admin.user-course', [
            'course_id' => $course_id,
            'users' => $users
        ]);
    }

    public function editCourse(Request $request, $course_id) {

        $course         = Course::find($course_id);
        $course_price   = CoursePrice::where('course_id', '=', $course_id)->first();

        if ($request->isMethod('post')) {
            //update and return with session message

            $intro_url           = $request->input("intro_url");
            //    $cover_img           = $request->input("cover_img");
            $course_url          = $request->input("course_url");
            $course_desc         = $request->input("course_desc");
            $course_name         = $request->input("course_name");
            $course_content      = $request->input("course_content");
            $course_program      = $request->input("course_program");
            $course_organisation = $request->input("course_organisation");

               //prices
            $payment_in_full     = $request->input("payment_in_full");
            $premium_package     = $request->input("premium_package");
            $aplication_to       = $request->input("aplication_to");
            $number_of_rate      = $request->input("number_of_rate");
            $price_in_rate       = $request->input("price_in_rate");
               
            $payment_from_foreign_countries      = $request->input("payment_from_foreign_countries");
            $aplication_to_and_payfull           = $request->input("aplication_to_and_payfull");

            $course->name                = $course_name;
            $course->intro_url           = $intro_url;
               //$course->cover_img         = $cover_img;
            $course->course_url          = $course_url;
            $course->description         = $course_desc;
            $course->course_content      = $course_content;
            $course->plan_and_program    = $course_program;
            $course->course_available    = Carbon::now()->addMonth(3);
            $course->course_organisation = $course_organisation;

            if($course->save()) {
                $course_price = CoursePrice::where("course_id", "=", $course_id)->first();

                $course_price->course_id = $course->id;
                $course_price->payment_in_full = $payment_in_full;
                $course_price->payment_from_foreign_countries = $payment_from_foreign_countries;
                $course_price->premium_package = $premium_package;
                $course_price->aplication_to = $aplication_to;
                $course_price->aplication_to_and_payfull = $aplication_to_and_payfull;
                $course_price->number_of_rate = $number_of_rate;
                $course_price->price_in_rate = $price_in_rate;

                $course_price->save();

                return back()->with('info','Uspesno ste izmenili kurs!');

           }
        }

        return view('admin.edit-course',[
            'course'        => $course,
            'course_price'  => $course_price,
        ]);
    }
}
