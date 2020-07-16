<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class HomeController extends Controller
{
    public function index() {

        $courses = Course::all();

        // dd($courses);

        return view ("homepage", [
            "courses" => $courses
        ]);

    }

    public function about() {
        return view ("about");

    }
}
