<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    /*
    for navigation to home page
    */
    public function index()
    {
      return view('pages.index');
    }
    /*
    for navigation to about page
    */
    public function about()
    {
      return view('pages.about');
    }
}
