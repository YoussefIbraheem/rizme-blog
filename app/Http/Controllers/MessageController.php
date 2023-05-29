<?php

namespace App\Http\Controllers;

use App\Mail\UserMail;
use App\Models\Message;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    //view messages page
    public function showMessagesList(Request $request){
        $messages = Message::all();
        return view('front.messages', compact('messages'));
    }

    //reply to user email
    public function replyToUser(Request $request , $id){
        $validatedData = $request->validate([
            'body' => 'required'
        ]);
        $repliedToMessage = Message::findOrFail($id);
        Mail::to($repliedToMessage->email)->queue(new UserMail($validatedData , $repliedToMessage ));
        return redirect()->back();
    }

    //change message status

    public function changeMessageStatus($id){
        $message = Message::findOrFail($id);
        $message->sorted = $message->sorted == 0? 1 : 0;
        $message->update();
        return redirect()->back();
    }
}