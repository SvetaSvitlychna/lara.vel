<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
// use DB;
use Carbon\Carbon;

class CategoryController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $categories = DB::table('categories')->get();
        // //  dd(DB::table('categories')->pluck('id'));
        // return view('admin.categories.index', compact('categories'));
        $title = "Admin";
        $subtitle = "Manage categories";
        $categories = Category::paginate(5);
        return view('admin.categories.index', compact('categories', 
        'title', 'subtitle'));
        // $categories =DB::table('categories')->orderBy('id')
        // ->chunk(10, function($items){
        //     foreach($items as $i){
        //         dump($i);
        //     }
        // });
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $title = "Admin";
        $subtitle = "Add Category";
        return view('admin.categories.create', compact('title', 'subtitle'));
       
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category=Category::create([
            'name'=>$request['name'],
            'description'=>$request['description'],
            
        ]);
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        // $category = DB::table('categories')->find($id);
        $title = "Admin";
        $subtitle = "Categories";
        return view('admin.categories.show', compact('category', 'title', 'subtitle'));


        // $post = DB::table('categories')->where('id', $id)->first();
        // $post = DB::table('categories')->find($id);
        // dump($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        // $category = Category::find($id);
        $title = "Admin";
        $subtitle = "Categories";
        return view('admin.categories.edit', compact('category', 'title', 'subtitle'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category ->update([
                'name' => $request['name'], 
                'description' => $request['description'],  
                'published'=>($request->published =='on')?1:0,
                ]);
        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
      $category->posts()->delete();
        return back();
    }
   
    public function trashed(){
        $title = "Admin";
        $subtitle = "Menagement Trashed categories";
        $categories = Category::onlyTrashed()-> paginate(5);
        return view('admin.categories.trashed', compact('categories', 
        'title', 'subtitle'));
   
    }
    public function restore($id){
        
         Category::withTrashed()->where('id', $id)->first()->restore();
        return back();
   
    }
    public function force($id){
        
        Category::withTrashed()
        ->where('id', $id)
        ->first()
        ->forceDelete();
       return back();
  
   }
        
}
