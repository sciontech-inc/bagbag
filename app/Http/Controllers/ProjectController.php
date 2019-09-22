<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('id')->get();
        return view('businessDev.pages.projects.index',compact('projects'));
    }

    public function store(Request $request)
    {
        $project = $request->validate([
            'title' => ['required','max:60'],
            'description' => ['required','max:200'],
            'date' => ['required'],
            'image' => ['required','image','max:2048'],
        ]);

        $image = $request->file('image');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);

        $incident_type = new Project([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'image' => $new_name,
        ]);
        
        $incident_type->save();

        return redirect()->back()->with('success','Successfully Added');
    }

    public function edit($id)
    {
        $projects = Project::where('id',$id)->orderBy('id')->firstOrFail();
        return response()->json(compact('projects'));
    }

    public function update(Request $request, $id)
    {
        Project::find($id)->update($request->all());
        return redirect()->back()->with('success','Successfully Updated');
    }

    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();
        return redirect()->back()->with('success','Successfully Deleted!');
    }
}

