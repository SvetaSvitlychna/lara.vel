<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

use Carbon\Carbon;

class UserController extends Controller
{
    protected $users;
    /**
     * Create a new controller instance.
     *
     * @param  Repository $users
     * @return void
     */
    public function __construct(User $users)
    {
        $this->users = $users;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Admin";
        $subtitle = "Users";
        $users = User::paginate(5);
        return view('admin.users.index', compact('users', 'title', 'subtitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Admin";
        $subtitle = " Add Users";
       
        return view('admin.users.create', compact('title', 'subtitle'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $users=User::create([
            'name'=>$request['name'],
            'email'=>$request['email'],
            'password'=>$request['password'],
            
        ]);
        // Session::flash('message', 'Successfully created shark!');
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // $user = User:: find($id);
        $title = "Admin";
        $subtitle = "Users";
        return view('admin.users.show', compact('user', 'title', 'subtitle'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // $user = DB::table('users')->find($id);
        $title = "Admin";
        $subtitle = "Users";
        return view('admin.users.edit', compact('user', 'title', 'subtitle'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update([
            'name' => $request['name'], 
            'email' => $request['email'],  
            'password'=>$request['password'],
        
            ]);
    return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        
        $user->profile()->delete();
        return back();
    }

    public function trashed(){
        $title = "Admin";
        $subtitle = "Menagement Trashed users";
        $users = User::onlyTrashed()-> paginate(5);
        return view('admin.users.trashed', compact('users', 
        'title', 'subtitle'));
   
    }
    public function restore($id){
        
         User::withTrashed()->where('id', $id)->first()->restore();
        return back();
   
    }
    public function force($id){
        
        User::withTrashed()
        ->where('id', $id)
        ->first()
        ->forceDelete();
       return back();
  
   }
}