<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

    //Landing page display

    public function index(){

    	return view('test.index');
    }

    public function login(){

    	return view('test.login');
    }


   	public function register(){

    	return view('test.register');
    }

    public function register2(){

        return view('test.register2');
    }


    public function dashboard(){

        return view('dashboard.index');
    }
}
