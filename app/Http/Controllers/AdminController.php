<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        return view('Admin/dashboard');
    }
    public function button(){
        return view('Admin/buttons');
    }
}
