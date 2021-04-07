<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $title="About Page";
        return view('about.index', compact('title'));
    }
}
