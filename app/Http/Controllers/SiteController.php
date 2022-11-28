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
        return view('test.dashboard');
    }

    public function gallery()
    {
        return view('gallery');
    }
    public function picture()
    {
        return view('test.picture');
    }
    public function love()
    {
        return view('test.love');
    }

    public function spiral()
    {
        return view('test.spiral');
    }

    public function demo()
    {

        $name = '原儀';
        $age = '20';
        return view('test.demo', compact('name', 'age'));
    }

}
