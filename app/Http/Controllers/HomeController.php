<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Event;
use App\User;
use App\EventUser;


class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $events = Event::latest()->limit(3)->get();
        return view('home')->with('events', $events);
    }

  

    public function show($id)
    {
        $event= Event::find($id);
        return view('user.event.view-event')->with('event', $event);
    }

    public function list()
    {
        $events = Event::latest()->get();
        return view('user.event.list')->with('events', $events);
    }

    public function applyEvent($id) //create
    {
        $event= Event::find($id);
        return view('user.event.register')->with('event', $event);
    }


    public function storeEventUser(Request $request)
    {
       $user = User::find(Auth::user()->id);
       $event = Event::find($request->event_id); 
       
         if($event->event_status == 'Active' &&  $event->event_availability > 0 ){
                $user->events()->syncWithoutDetaching([$request->event_id]);
                $event = Event::find($request->event_id); 
                $event->update([ 'event_availability' => (int)$event->event_availability-1 ]);
 
                 if($event->event_availability == 0){
                    $event->update(['event_status'=> 'Closed']);
                      return redirect('/user/event/applied')->with('success', 'Successfully joined!');
                    }
                    else
                         return redirect('/user/event/applied')->with('success','Successfully joined!');
                            
        }
        
    }


    public function applied(){

        $events = Auth()->user()->events;
        return view('user.event.applied')->with('events', $events); 
    }

    public function destroy($event)
    {
        $event= Event::findOrFail($event);
        Auth::user()->events()->detach($event);

        if($event->event_status == 'Closed' &&  $event->event_availability == 0 ){
            $event->update(['event_status'=> 'Active']);
            $event->update([ 'event_availability' => (int)$event->event_availability+1 ]);
            return redirect()->back()->with('success','Deleted.');
        } 
        else
         $event->update([ 'event_availability' => (int)$event->event_availability+1 ]);

        return redirect()->back()->with('success','Deleted.');
    }
   
}
