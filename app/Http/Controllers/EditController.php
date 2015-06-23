<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class EditController extends Controller
{
    public function index()
    {
        $currUser = \Auth::user();
        return view('edit', compact('currUser'));
    }

    public function makeEdit(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $cpassword = $request->cpassword;

        if ($password == $cpassword) {
            $currUser = \Auth::user();
            $currUser->name = $name;
            $currUser->email = $email;
            $currUser->password = bcrypt($password);
            $currUser->save();
            Flash::success('Your changes are saved.');
            return redirect('edit');
        } else {
            Flash::error('Passwords don\'t match');
            return redirect('edit');
        }

        $currUser = \Auth::user();
        $currUser->name = $name;
        $currUser->email = $email;
        $currUser->password = bcrypt($password);
        $currUser->save();
        Flash::success('Your changes are saved.');
        return redirect('edit');
    }
}
