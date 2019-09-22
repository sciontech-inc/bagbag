<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Biodata;
use App\Resident;
class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
       $residents = Resident::where('id', $id)->get();
       $biodatas = Biodata::latest('id')->limit(1)->get();
       return view('businessDev.pages.general.biodata', compact('residents', 'biodatas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fingerprint($id)
    {
       $biodatas = Biodata::latest('id')->limit(1)->first();
       if ($biodatas->id == $id) {
            return response()->json(array('success' => false),200);
       } else {
            $biodatas = Biodata::latest('id')->limit(1)->first();
            return response()->json(array('success' => true, $biodatas),200);
       }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function residentUpdate(Request $request)
    {
        $resident = Resident::where('id', $request->resident)->first();
        var_dump($resident); die();
        $resident->biodata_fingerprint = $request->biodata;
        $resident->save();
        return response()->json(array('success' => true, 'Successfully Update', $resident), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
