<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    
    //Landing page display

    public function index(){

    	return view('test.index');
    }

    public function terms(){

        return view('test.terms');
    }


    public function work(){

        return view('test.work');
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

//This method returns each user Profile
    
    public function showProfile(){

        return view('test.dashboard.profile');
    }


//Latest Transactions

    public function showTransactions(){

        return view('test.dashboard.transactions');

    }


//Shows news page 


    public function showNews(){

        return view('test.dashboard.news');
    }

//show admin dashboard

    public function showAdmin(){

        return view('test.dashboard.admin_dashboard');
    }


     public function showAdminSupport(){

        return view('test.dashboard.admin-support');
    }


    public function showReferrals(){

        return view('test.dashboard.referrals');
    }


     public function postNews(){

        return view('test.dashboard.post-news');
    }

    public function showNewsSummary(){

        return view('test.dashboard.news-summary');
    }
}


