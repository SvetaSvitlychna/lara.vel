<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $title= 'Contact Page';
        return view('contact.index', compact('title'));
    }
}
