<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('id')->get();
        return view('businessDev.pages.events.index',compact('events'));
    }

    public function store(Request $request)
    {
        $event = $request->validate([
            'title' => ['required', 'max:60'],
            'description' => ['required','max:200'],
            'date' => ['required'],
            'time_from' => ['required'],
            'time_to' => ['required'],
            'location' => ['required','max:200'],
            'image' => ['required','image','max:2048'],
        ]);

        $image = $request->file('image');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);

        $event = new Event([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'time_from' => $request->time_from,
            'time_to' => $request->time_to,
            'location' => $request->location,
            'image' => $new_name,
        ]);
        $event->save();

        return redirect()->back()->with('success','Successfully Added');
    }

    public function edit($id)
    {
        $events = Event::where('id',$id)->orderBy('id')->firstOrFail();
        return response()->json(compact('events'));
    }

    public function update(Request $request, $id)
    {
        Event::find($id)->update($request->all());
        return redirect()->back()->with('success','Successfully Updated');
    }

    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();
        return redirect()->back()->with('success','Successfully Deleted!');
    }
}
