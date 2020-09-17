<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
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
        return view('home');
    }

   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user= User::find($id);
        if($user){
            return view('user.profile')->withUser($user);
        }else {
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        if(Auth::user()){
            $user = User::find(Auth::user()->id);
            if($user){
                return view('user.edit')->withUser($user);
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
