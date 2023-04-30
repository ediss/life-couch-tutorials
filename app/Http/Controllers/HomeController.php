<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Jenssegers\Agent\Agent;


class HomeController extends Controller
{
    public function index() {

        $course = new Course;
        $courses = $course->take(6)->orderBy('created_at', 'desc')->get();

        // dd($courses);

        return view ("homepage", [
            "courses" => $courses
        ]);

    }

    public function about() {
        return view ("about");

    }
}
