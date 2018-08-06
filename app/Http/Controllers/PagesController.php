<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about(){
        $name = 'About';
        return view('pages.about', compact('name'));
    }

    public function contact(){
        $name = 'Contact';
        return view('pages.contact', compact('name'));
    }
}
