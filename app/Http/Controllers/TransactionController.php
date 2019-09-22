<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resident;
use App\Certification;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function clearance()
    {
        $residents = Resident::orderBy('id')->get();
        $certifications = Resident::where('id', 20000)->orderBy('id')->get();
        return view('businessDev.pages.transaction.clearance', compact('residents','certifications'));
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $clearance = $request->validate([
            'resident_id' => ['required','max:60'],
            'purpose' => ['required','max:60'],
            'image' => ['required','image','max:2048'],
        ]);

        $image = $request->file('image');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);

        $clearance = new Certification([
            'resident_id' => $request->resident_id,
            'purpose' => $request->purpose,
            'image' => $new_name,
        ]);
        $clearance->save();

        $residents = Resident::orderBy('id')->get();
        $certifications = Certification::with('resident')->where('id', $clearance->id)->get();
        return view('businessDev.pages.transaction.clearance', compact('residents', 'certifications'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
