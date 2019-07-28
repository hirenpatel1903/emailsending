<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendmail;

class sendEmailController extends Controller
{
    function index(){
        return view("send_email");
    }

    function send(Request $request){
        $this->validate($request, [
            'name'  => 'required',
            'email' => 'required|email',            
            'message' => 'required',
        ]);

        $data = array(
            'name' => $request->name,
            'message' => $request->message
            
        );

        Mail::to('patelhiren.hp19@gmail.com')->send(new sendmail($data));
        return back()->with('success','Thanks for concating us!');
    }
}
