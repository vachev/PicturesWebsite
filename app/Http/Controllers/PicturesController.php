<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Image;
use Laracasts\Flash\Flash;
use App\Comment;
use Route;

class PicturesController extends Controller
{
    public function index()
    {
        //$images = Image::orderBy('created_at', 'desc')->get();
        $images = Image::orderBy('created_at', 'desc')->simplePaginate(10);
        $images->setPath('pictures');
        $currUser = \Auth::user();
        return view('pictures', compact('images', 'currUser'));
    }

    public function upload()
    {
        $currUser = \Auth::user();
        return view('upload', compact('currUser'));
    }

    public function show($id)
    {
        $currUser = \Auth::user();
        $image = Image::all()->find($id);
        $comments = $image->comments_paginated;
        $comments->setPath($id);
        return view('show', compact('image', 'currUser', 'comments'));
    }

    public function deleteComment($idCom, $idPic)
    {
        Comment::destroy($idCom);
        Flash::success('Your comment is deleted.');
        return redirect('show/' . $idPic);
    }

    public function deletePicture($id)
    {
        Image::destroy($id);
        Flash::success('Your picture is deleted.');
        $currUser = \Auth::user();
        $currUser->photosUploaded--;
        $currUser->save();
        return redirect('pictures');
    }

    public function storeComment($id)
    {
        $message = Request::input('message');
        $author = \Auth::user()->name;
        $pictureId = $id;

        $comment = new Comment();
        $comment->author = $author;
        $comment->content = $message;
        $comment->image_id = $pictureId;
        $comment->save();
        Flash::success('Your comment is published.');
        return redirect('show/' . $id);
    }

    public function store()
    {
        Flash::success('Your picture is uploaded!');
        $currUser = \Auth::user();
        if (!$currUser->photosUploaded) {
            $currUser->photosUploaded = 1;
            $currUser->save();
        } else {
            $currUser->photosUploaded++;
            $currUser->save();
        }


        $file = Request::file('image');
        $extension = $file->getClientOriginalExtension();

        $entry = new Image();
        $entry->mime = $file->getClientMimeType();
        $entry->original_filename = $file->getClientOriginalName();
        $entry->filename = $file->getFilename() . '.' . $extension;
        $entry->uploader = $currUser->id;
        $entry->save();
        $imageName = $file->getFilename() . '.' . $extension;

        $file->move(
            base_path() . '/public/images/pictures/', $imageName
        );
        return redirect('pictures');
    }
}
