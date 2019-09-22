<?php

namespace App\Http\Controllers;
use App\Kagawad;
use App\Position;
use Auth;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Input;
use Response;

class KagawadController extends Controller
{
    public function index()
    {
        $kagawads = Kagawad::orderBy('id')->get();
        $positions = Position::orderBy('id')->get();
        return view('businessDev.pages.kagawad.index',compact('kagawads', 'positions'));
    }

    public function store(Request $request)
    {
        $Kagawad = $request->validate([
            'firstname' => ['required', 'max:60'],
            'middlename' => ['required','max:200'],
            'surname' => ['required'],
            'position' => ['required'],
            'about' => ['required'],
            'address' => ['required','max:200'],
            'contact' => ['required','max:11'],
            'image' => ['required','image','max:2048'],
        ]);

        $image = $request->file('image');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);

        $Kagawad = new Kagawad([
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'surname' => $request->surname,
            'position' => $request->position,
            'about' => $request->about,
            'address' => $request->address,
            'contact' => $request->contact,
            'image' => $new_name,
        ]);
        $Kagawad->save();

        return redirect()->back()->with('success','Successfully Added');
    }

    public function edit($id)
    {
        $kagawads = Kagawad::where('id',$id)->orderBy('id')->firstOrFail();
        return response()->json(compact('kagawads'));
    }

    public function update(Request $request, $id)
    {
        Kagawad::find($id)->update($request->all());
        return redirect()->back()->with('success','Successfully Updated');
    }

    public function destroy($id)
    {
        $Kagawad = Kagawad::find($id);
        $Kagawad->delete();
        return redirect()->back()->with('success','Successfully Deleted!');
    }
}