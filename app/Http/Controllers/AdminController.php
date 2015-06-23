<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Image;
use Laracasts\Flash\Flash;

class AdminController extends Controller
{
    public function index()
    {
        $currUser = \Auth::user();
        $users = User::orderBy('created_at', 'desc')->take(5)->get();
        $images = Image::orderBy('created_at', 'desc')->take(6)->get();
        if ($currUser) {
            if ($currUser->email == "admin@admin.com") {
                return view('admin.home', compact('currUser', 'users', 'images'));
            } else {
                return abort(404);
            }
        } else {
            return abort(404);
        }
    }

    public function pictures()
    {
        $images = Image::orderBy('created_at', 'desc')->simplePaginate(10);
        $images->setPath('/TestApp/public/admin/pictures');
        $currUser = \Auth::user();
        if ($currUser) {
            if ($currUser->email == "admin@admin.com") {
                return view('admin.pictures', compact('images', 'currUser'));
            } else {
                return abort(404);
            }
        } else {
            return abort(404);
        }
    }

    public function users()
    {
        $currUser = \Auth::user();
        $users = User::orderBy('created_at', 'desc')->simplePaginate(10);
        $users->setPath('users');
        if ($currUser) {
            if ($currUser->email == "admin@admin.com") {
                return view('admin.users', compact('currUser', 'users'));
            } else {
                return abort(404);
            }
        } else {
            return abort(404);
        }
    }

    public function deleteUser($id)
    {
        User::destroy($id);
        Flash::success('The user is deleted.');
        return redirect('admin/users');
    }

    public function showImages($id)
    {
        $images = Image::where('uploader', $id)->get();
        return view('admin.show', compact('images'));
    }
}
