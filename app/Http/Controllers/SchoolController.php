<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;
class SchoolController extends Controller
{
    public function index()
    {
        $schools = School::orderBy('id')->get();
        return view('businessDev.pages.school.school',compact('schools'));
    }

    public function store(Request $request)
    {
        $school = $request->validate([
            'name' => ['required', 'max:60'],
            'address' => ['required','max:200'],
            'level' => ['required','max:60'],
            'contact' => ['required','max:60'],
        ]);

        $school = new School([
            'name' => $request->name,
            'address' => $request->address,
            'level' => $request->level,
            'contact' => $request->contact,
        ]);
        $school->save();

        return redirect()->back()->with('success','Successfully Added');
    }

    public function edit($id)
    {
        $schools = School::where('id',$id)->orderBy('id')->firstOrFail();
        return response()->json(compact('schools'));
    }

    public function update(Request $request, $id)
    {
        School::find($id)->update($request->all());
        return redirect()->back()->with('success','Successfully Updated');
    }

    public function destroy($id)
    {
        $school = School::find($id);
        $school->delete();
        return redirect()->back()->with('success','Successfully Deleted!');
    }
}
