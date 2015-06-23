<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Mail;
use Laracasts\Flash\Flash;

class ContactsController extends Controller
{
    public function index()
    {
        $currUser = \Auth::user();
        return view('contacts', compact('currUser'));
    }

    public function sendEmailAndSaveIt(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $message = $request->input('message');

        $mail = new Mail();
        $mail->name = $name;
        $mail->email = $email;
        $mail->message = $message;
        $mail->save();
        // Email::send($email, $message);
        Flash::success('Your massage is send!');
        return redirect('contacts');
    }
}
