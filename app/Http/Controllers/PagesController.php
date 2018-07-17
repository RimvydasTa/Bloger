<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function getIndex(){

        $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
        return view('pages.welcome')->withPosts($posts);
    }
    public function getAbout(){
        $firstName = 'Rimvydas';
        $lastName = 'Tamosiunas';
        $fullName = $firstName . " " . $lastName;
        $email = 'someEmail@gmail.com';
        $data = [$firstName, $lastName, $email, $fullName];

        return view('pages.about')->withData($data);
    }
    public function getContact(){
        return view('pages.contact');
    }
}
