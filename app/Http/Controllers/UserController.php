<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserCourse;

use Auth;


class UserController extends Controller
{
    public function index() {
        $user_id = Auth::user()->id;

        $my_courses = UserCourse::where('user_id', '=', $user_id)->get();

        return view('user-courses', ['user_courses' => $my_courses]);
    }
}
