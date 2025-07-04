<?php

namespace App\Controllers;

class Page extends BaseController
{
    public function login()
    {
        return view('login');
    }
        public function home()
    {
        return view('pages/home');
    }

    public function about()
    {
        return view('pages/about');
    }

    public function team()
    {
        return view('pages/team');
    }

    public function gallery()
    {
        return view('pages/gallery');
    }

    public function guide()
    {
        return view('pages/guide');
    }

    public function testing()
    {
        return view('pages/testing');
    }
}
