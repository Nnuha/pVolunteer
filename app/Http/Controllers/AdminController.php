<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.home');
    }

    public function showUser()
    {
        $users = User::all();
        return view('admin.users')->with('users',$users);

    }

    public function showProfile($id)
    {
     
        $users = User::find($id);
        return view('admin.view-user')->with('users',$users);

    }


    public function add(User $users, Request $request)
    { 
        // dd($request);  -> if function are working
        // dd($request->is_admin);
        $users->update(['is_admin'=> $request->has('is_admin') ? 1 : 0]);

        $users->save();
       
        return redirect('admin/admins')->with('success', 'Admin Added!');
    }

    public function showAdmin()
    {
        $users = User::where('is_admin',true)->get();
        return view('admin.admins')->with('users',$users);
    }

    public function showProfileAdmin($id)
    {
     
        $users = User::find($id);
        return view('admin.view-admin')->with('users',$users);

    }

    public function remove(User $users, Request $request)
    { 
        // dd($request);  -> if function are working
        // dd($request->is_admin);
        $users->update(['is_admin'=> $request->has('is_admin') ? 0 : 1]);

        $users->save();
       
        return redirect('admin/admins')->with('success', 'Admin Removed!');
    }

  

    public function edit()
    {
        if(Auth::user()){
            $user = User::find(Auth::user()->id);
            if($user){
                return view('admin.edit')->withUser($user);
            } else {
                return redirect()->back();
            } 
        } else{
            return redirect()->back();
            }
    }

    
    public function update(Request $request)
    {
        
        $user = User::find(Auth::user()->id);
        if ($user){
            $validate = null;
            if (Auth::user()->email === $request ['email']) {
                $validate = $request->validate([
                    'name' => 'required',
                    'email' => 'required',
                    'ic' => 'required',
                    'phone' => 'required',
                    'address' => 'required'
                ]);
            } else {
                $validate = $request->validate([
                    'name' => 'required',
                    'email' => 'required',
                    'ic' => 'required',
                    'phone' => 'required',
                    'address' => 'required'
                ]);
            }
            if($validate){
 
                $user->name = $request['name'];
                $user->email =$request['email'];
                $user->ic = $request['ic'];
                $user->phone = $request['phone'];
                $user->address = $request['address'];

                $user->save();
               
            
                return redirect()->back()->with('success','Profile Updated.');
            } else{
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }
  


}
