<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function getIndex(){
        return view('pages.welcome');
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
