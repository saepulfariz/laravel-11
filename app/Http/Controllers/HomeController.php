<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    function index(Request $request): View
    {
        // cara dapatkan request
        // dd($request->name);
        return view('home.index');
    }

    function welcome($name = null): View
    {

        return view('home.welcome', compact('name'));
        // return view('home.welcome')->with('name', $name);
    }
}
