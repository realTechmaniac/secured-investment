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
}
