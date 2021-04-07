<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use DB;

use App\Models\{Post, Category, User};


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title ="Blog page";
        $posts = Post::with('category')
        ->with('user')
        ->get();
        
         return view('blog.index', compact('title','posts'));
    }

    public function postsByUser($id)
    {
        $title ="Blog page";
        $posts = Post::where('user_id', $id)
        ->with('category')
        ->with('user')
        ->get();
        
         return view('blog.index', compact('title','posts'));
    }

    public function postsByCategory($id)
    {
        $posts = Post::where('category_id', $id)
            ->with('user')
            ->with('category')
            ->orderBy('created_at', 'desc')
            ->simplePaginate();
        
        return view('blog.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug) {
        if (is_numeric($slug)){
            $post = Post::findOrFail($slug);
            return redirect (route('blog.show', $post->slug), 301);
        }
        $title ="Blog post";
        $post = Post::whereSlug($slug)
        ->with('user')
            ->with('category')
            ->firstOrFail();
            // ->join('categories', 'categories.id', '=', 'posts.category_id')
            // ->join('users', 'users.id', '=', 'posts.user_id')
            // ->select('posts.*', 'categories.name As categoryname', 'users.name As username')
            // ->where('posts.id', $id)->first();
        // dd($post);
        return view('blog.show', compact('title','post'));
    }

    
    public function like($id) {
        $post = Post::where('id', $id)
            ->increment('votes');
        return back();
    }
    public function resent(){
        return "Resent";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
