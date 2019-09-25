<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcement;
class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::orderBy('id')->get();
        return view('businessDev.pages.announcements.index',compact('announcements'));
    }

    public function store(Request $request)
    {
        $announcement = $request->validate([
            'title' => ['required', 'max:60'],
            'description' => ['required', 'max:200'],
            'date' => ['required', 'max:60'],
            'image' => ['required','image','max:2048'],
        ]);
        
        $image = $request->file('image');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('app/public/images'), $new_name);

        $announcement = new Announcement([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'image' => $new_name,
        ]);
        
        $announcement->save();

        return redirect()->back()->with('success','Successfully Added');
    }

    public function edit($id)
    {
        $announcements = Announcement::where('id',$id)->orderBy('id')->firstOrFail();
        return response()->json(compact('announcements'));
    }

    public function update(Request $request, $id)
    {
        Announcement::find($id)->update($request->all());
        return redirect()->back()->with('success','Successfully Updated');
    }

    public function destroy($id)
    {
        $announcement = Announcement::find($id);
        $announcement->delete();
        return redirect()->back()->with('success','Successfully Deleted!');
    }
}
