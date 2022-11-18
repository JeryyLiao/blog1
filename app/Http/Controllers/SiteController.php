<?php

namespace App\Http\Controllers;

class SiteController extends Controller
{
    public function hello()
    {
        return 'Hello';
    }

    public function play($id)
    {
        if ($id == 1) {
            return view('game1');
        } elseif ($id == 2) {
            return view('game2');
        }
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function gallery()
    {
        return view('gallery');
    }
    public function picture()
    {
        return view('picture');
    }
}