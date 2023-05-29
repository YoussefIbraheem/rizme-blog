<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Mail\UserMailAuto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //view message form
    public function viewContactPage(){
        return view('front.contact');
    }

    // send message to mods
    public function sendMessage(Request $request)
    {
        $validatedData = $request->validate([
            'name' =>'required|string|max:255',
            'email' =>'required|string|email|max:255',
            'subject' =>'required|string|max:255',
            'body'=>'required|string|max:1000'
        ]);

        Message::create($validatedData);
        Mail::to($request->email)->send(new UserMailAuto($validatedData));
        session()->flash('success',"Message sent successfully");
        return redirect()->back();
    }
}
