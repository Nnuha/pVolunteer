<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use App\Event;
use App\User;

class EventController extends Controller
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

    public function dashboard()
    {
        $events = Event::latest()->limit(5)->get();
        return view('admin.home')->with('events', $events);
       
    }
    
    public function index()
    {
        $events = Event::latest()->get();
        return view('admin.event.list')->with('events', $events);
    
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // dd($request);  -> if function are working

         $this->validate($request,[
            'event_name' => 'required',
            'event_details' => 'required',
            'event_note' => 'required',
            'event_date' =>'required',
            'event_location' =>'required',
            'event_image'=>'image|nullable|max:1999',
            'event_availability'=>'required',
        ]);

        //handle the file upload
        if($request->hasFile('event_image')){   // to check if user has opted to upload the file
        
            // get filename with extention
            $filenameWithExt = $request->file('event_image')->getClientOriginalName();

            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get ext (extention)
            $extension =$request->file('event_image')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename .'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('event_image')->storeAs('public/event_images',$fileNameToStore);
       }else{
           $fileNameToStore ='noimage.jpg'; // if user dont have any file this name will be put on the database
       }

       $event = new Event;
       $event->event_name = $request->input('event_name');
       $event->event_details = $request->input('event_details');
       $event->event_note = $request->input('event_note');
       $event->event_date = $request->input('event_date');
       $event->event_location = $request->input('event_location');
       $event->event_image =$fileNameToStore;
       $event->event_availability =$request->input('event_availability');
       $event->admin_id = auth()->user()->id;

       $event->save();
      
       return redirect('/admin/event/list')->with('success', 'New event created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $events = Event::with('users')->where('id', $id)->get();
        return view('admin.event.user')->with('events', $events); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event= Event::find($id);

        return view('admin.event.edit')->with('event', $event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Event $event, Request $request)
    {
        $this->validate($request,[
            'event_name' => 'required',
            'event_details' => 'required',
            'event_note' => 'required',
            'event_date' =>'required',
            'event_location' =>'required',
            'event_image'=>'image|nullable|max:1999',
            'event_availability'=>'required',
        ]);

         //handle the file upload
         if($request->hasFile('event_image')){   // to check if user has opted to upload the file
            $filenameWithExt = $request->file('event_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension =$request->file('event_image')->getClientOriginalExtension();
            $fileNameToStore = $filename .'_'.time().'.'.$extension;
            $path = $request->file('event_image')->storeAs('public/event_images',$fileNameToStore);
         }
     

  
         $event->event_name = $request->input('event_name');
         $event->event_details = $request->input('event_details');
         $event->event_note = $request->input('event_note');
         $event->event_date = $request->input('event_date');
         $event->event_location = $request->input('event_location');

         if($request->hasFile('event_image')){
            $event->event_image =$fileNameToStore;
             }
        

         $event->event_availability =$request->input('event_availability');
         $event->admin_id = auth()->user()->id;
  
         $event->save();
        
         return redirect('/admin/event/list')->with('success', 'Even Updated.');
    
    }

    
}
