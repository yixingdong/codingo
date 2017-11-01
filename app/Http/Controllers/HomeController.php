<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class HomeController extends Controller
{
    use SEOToolsTrait;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('welcome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->seo()->setTitle('Home');
        $this->seo()->setDescription('This is a description for this page');
        $this->seo()->setCanonical(url('post'));
        return view('home');
    }

    public function welcome()
    {
        $this->seo()->setTitle('Home');
        $this->seo()->setDescription('This is a description for this page');
        $this->seo()->setCanonical(url('post'));

        return view('welcome');
    }
}
