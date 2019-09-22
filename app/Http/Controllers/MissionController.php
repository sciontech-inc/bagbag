<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mission;
class MissionController extends Controller
{
    public function index()
    {
        $mission = Mission::orderBy('id')->first();
        return view('businessDev.pages.mission.index',compact('mission'));
    }
    public function edit($id)
    {
        $mission = Mission::where('id',$id)->firstOrFail();
        return response()->json(compact('mission'));
    }

    public function update(Request $request, $id)
    {
        $mission = $request->validate([
            'mission' => ['required', 'max:200'],
            'vission' => ['required', 'max:200'],
        ]);

        Mission::find($id)->update($request->all());
        return redirect()->back()->with('success','Successfully Updated');
    }
}
