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

        return view('test.dashboard.ph-merged');
    }


    public function dashboardActivate(){

        return view('test.dashboard.account-activate');
    }

//This shows the merg
    public function showPH(){

        return view('test.dashboard.ph-approve');
    }


//This return the gh pending page view

    public function ghPending(){

         return view('test.dashboard.gh-pending');        
    }

//This return the ph pending page view

     public function phPending(){

         return view('test.dashboard.ph-pending');        
    }

//GH  make withdrawal where users can enter the amount they
//want to GH

     public function ghWithdrawal(){

         return view('test.dashboard.gh-withdrawal');        
    }

//PH Enter Amount Page where users can enter the amount they
//want to PH 

    public function phEnterAmount(){

        return view('test.dashboard.ph-enter-amount');
    }

//This leads to the user sanctioned page 

    public function userSanction(){

        return view('test.dashboard.account-sanction');
    }

    public function ghMerged(){

        return view('test.dashboard.gh-merged') ;
    }

//return merge pemding gh

    public function ghPendingMerge(){

        return view('test.dashboard.merge-pending-gh');
    }


//return merge pemding ph

    public function phPendingMerge(){

        return view('test.dashboard.merge-pending-ph');
    }


//return account reactivation page

    public function accountReactivate(){

        return view('test.dashboard.reactivate');
    }
}


