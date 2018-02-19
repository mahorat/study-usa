<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function welcome(){
        $school = new \App\school;
        $level = new \App\DegreeLevel;
        $spec = new \App\Speciality;

        return view('welcome', [
            'school' => $school->where('status', 1)->get(),
            'level' => $level->all(),
            'spec' => $spec->all()
        ]);
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }
}
