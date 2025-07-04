<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home', ['title' => 'Welcome']);
    }

    public function about()
    {
        return view('pages.about', ['title' => 'About Us']);
    }

    public function services()
    {
        return view('pages.services', ['title' => 'Our Services']);
    }

    public function contact()
    {
        return view('pages.contact', ['title' => 'Contact Us']);
    }

    public function terms()
    {
        return view('pages.terms', ['title' => 'Terms & Conditions']);
    }

    public function privacy()
    {
        return view('pages.privacy', ['title' => 'Privacy Policy']);
    }
}