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

        return view('dashboard.ph-merged');
    }


    public function dashboardActivate(){

        return view('dashboard.account-activate');
    }

//This shows the merg
    public function showPH(){

        return view('dashboard.ph-approve');
    }


//This return the gh pending page view

    public function ghPending(){

         return view('dashboard.gh-pending');        
    }

//This return the ph pending page view

     public function phPending(){

         return view('dashboard.ph-pending');        
    }

//GH  make withdrawal where users can enter the amount they
//want to GH

     public function ghWithdrawal(){

         return view('dashboard.gh-withdrawal');        
    }

//PH Enter Amount Page where users can enter the amount they
//want to PH 

    public function phEnterAmount(){

        return view('dashboard.ph-enter-amount');
    }
}
