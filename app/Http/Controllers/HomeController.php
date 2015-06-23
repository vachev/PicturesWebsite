<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Image as Image;

class HomeController extends Controller
{
    public function index()
    {
        $images = Image::orderBy('created_at', 'desc')->take(7)->get();
        $currUser = \Auth::user();
        return view('welcome', compact('currUser', 'images'));
    }
}