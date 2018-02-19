<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function loginIndex(){
        return view('includes.admin.login');
    }

    public function index(){
        return view('includes.admin.index');
    }
}
