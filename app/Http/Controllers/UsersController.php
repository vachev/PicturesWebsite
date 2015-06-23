<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class UsersController extends Controller
{
    public function index()
    {
        $currUser = \Auth::user();
        $users = User::orderBy('photosUploaded', 'desc')->simplePaginate(10);
        $users->setPath('users');
        return view('users', compact('currUser', 'users'));
    }
}
