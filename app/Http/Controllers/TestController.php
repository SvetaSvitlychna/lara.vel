<?php

namespace App\Http\Controllers;

use View;
class TestController extends Controller
{
    public function index()
    {
        $title="Hello Var";
        $subtitle="test test sets";
        // return view ('hello/index', compact('title', 'subtitle'));
        // return View::make('hello/index', compact('title','subtitle'));
        // return view('hello.index')->with('title', "hello Controller")->with('subtitle',"bla bal bla");
        return view('hello.index')->withTitle("Hello Controller")->
        withSubtitle("bla bla bla");
        // return view('hello.index',['title'=>"Hello Controller", 'subtitle']);
    }
    public function foo()
    {
    
        return view('foo');
        
    }

}

