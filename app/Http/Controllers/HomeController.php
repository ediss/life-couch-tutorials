<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Jenssegers\Agent\Agent;


class HomeController extends Controller
{
    public function index() {

        $courses = Course::take(6)->orderBy('course_available', 'desc')->get();

        // dd($courses);

        return view ("homepage", [
            "courses" => $courses
        ]);

    }

    public function about() {
        return view ("about");

    }
}
