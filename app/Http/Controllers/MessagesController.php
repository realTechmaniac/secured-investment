<?php

namespace App\Http\Controllers;

use App\Chat;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MessagesController extends Controller
{
    public function showMessages()
    {
        $user_sent = Auth::user()->senderChats;
        $user_received = Auth::user()->receiverChats;

        $user_sent_count = $user_sent->count();
        $user_received_count = $user_received->count();
        $total_chats = $user_sent_count + $user_received_count;
        Auth::user()->update([
            'read_messages' => $total_chats
        ]);

        $chats = $user_received->merge($user_sent)->sortByDesc('id')->paginate(20);

        return view('messages.show-messages', compact(
            'user_sent', 'user_received', 'chats'
        ));
    }

    public function singleMessages($token)
    {
        $chat = Chat::where('token', $token)->first();
        return view('messages.single-message', compact('chat'));
    }

    public function saveMessages(Request $request)
    {
        $this->validate($request, [
            'message_title' => ['required', 'string', 'max:100'],
            'message_body' => ['required', 'string', 'max:400'],
        ]);
        if ($request->username){
            $user_id = User::where('username', $request->username)->pluck('id')->first();
            if (!$user_id){
                return redirect()->back()->with('danger', 'Username does not exist');
            }
            Chat::create([
                'message_title' => $request->message_title,
                'message_body' => $request->message_body,
                'from_id' => 1,
                'to_id' => $user_id,
                'token' => Str::random(40),
            ]);
        }
        else{
            Chat::create([
                'message_title' => $request->message_title,
                'message_body' => $request->message_body,
                'from_id' => Auth::id(),
                'to_id' => 1,
                'token' => Str::random(40),
            ]);
        }

        return redirect()->back()->with('success', 'Message sent successfully');
    }

    public function showAdminMessages()
    {
        $all_chats = Chat::all()->sortByDesc('id')->paginate(20);
        return view('messages.show-admin-messages', compact('all_chats'));
    }

    public function singleAdminMessages($chat_token)
    {
        $chat = Chat::where('token', $chat_token)->first();
        if (!$chat){
            return redirect()->back('danger', 'Message not found');
        }
        return view('messages.single-admin-message', compact('chat'));
    }
}
