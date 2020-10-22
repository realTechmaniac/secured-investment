<?php

namespace App\Http\Controllers;

use App\ReferrerDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Telegram\Bot\Laravel\Facades\Telegram;

class HomeController extends Controller
{
    use AppMainTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       /*//Get Telegram group ID.. Admin last message must be sent to the group
        $activity = Telegram::getUpdates();
        dd($activity);*/

        /*//Telegram Bot notification
          $text = "Message From The Developer\n"
            . "<b>Ignore Please: </b>\n"
            . "<b>Message: </b>\n"
            . "Telegram Bot test successful";

        Telegram::sendMessage([
            'chat_id' => env('TELEGRAM_CHANNEL_ID', ''),
            'parse_mode' => 'HTML',
            'text' => $text
        ]);*/

        /*//SMS Functionality
        $phone = $this->serializePhoneNumberForSms(Auth::user()->phone);
        $message = 'Congratulations! '
            .Auth::user()->username.
            ', you have successfully registered with Secured Investment.';
        $this->sendSms($message, $phone);
        session()->flash('success', 'SMS test sent successfully');*/

        $from = ReferrerDetail::where('user_id', auth()->user()->referred_from_id)->first();
        $ref = null;
        if ($from){
            $ref = $from->user->username;
        }
        return view('home', compact('ref'));
    }

    public function terms()
    {
        return view('terms');
    }
}
