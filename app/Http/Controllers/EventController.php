<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\TimeZone;

use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $title = "Events";
        $all_events = Event::where('user_id',Auth::user()->id)->get();
        // dd($all_events);
        $timezone = TimeZone::where('is_active',1)->get();
        return view('user.event.index',get_defined_vars());
    }

    public function create_events(Request $request){
       $create = new Event;

       if($request->has('img_thumbnail')){
        $attechment  = $request->file('img_thumbnail');
        $img_2 =  time().$attechment->getClientOriginalName();
        $attechment->move(public_path('assets/images/event'),$img_2);
       }
       $create->user_id = Auth::user()->id;
       $create->event_type = $request->event_type;
       $create->img_thumbnail = $img_2;
       $create->event_title = $request->event_title;
       $create->event_start_date = $request->event_start_date;
       $create->event_start_time = $request->event_start_time;
       $create->event_end_date = $request->event_end_date;
       $create->event_end_time = $request->event_end_time;
       $create->time_zone_id = $request->time_zone_id;
       $create->save();
       toast('Event Created Successfuly', 'success');
        return redirect()->back()->with('success','Event Created Successfuly');
    }
}
