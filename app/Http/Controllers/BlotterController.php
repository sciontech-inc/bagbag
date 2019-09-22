<?php

namespace App\Http\Controllers;
use App\Blotter;
use App\Resident;
use App\IncidentType;
use Auth;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Input;
use Response;

class BlotterController extends Controller
{
    public function rules($id)
    {
        return [
            'suspect' => 'required | string | max:60',
            'victim' => 'required | string | max:60',
            'reason' => 'required | string | max:200',
            'datetime' => 'required | string | max:60',
            'place' => 'required | string | max:60',
            'fingerprint' => 'required | string | max:60',
        ];
    }

    public function index()
    {
        $blotters = Blotter::orderBy('id')->get();
        return view('businessDev.pages.transaction.blotter',compact('blotters'));
    }

    public function store(Request $request)
    {
            $validator = Validator::make(Input::all(), $this->rules(''));
    
            if ($validator->fails()) {
                return response()->json(array(
                    'success' => false,
                    'errors' => $validator->getMessageBag()->toArray()
                ));
            } else {
                $blotter = new Blotter([
                    'reference' => $request->reference,
                    'complainant' => $request->complainant,
                    'respondent' => $request->respondent,
                    'incident_type' => $request->incident_type,
                    'date_report' => $request->date_report,
                    'date_incident' => $request->date_incident,
                    'place' => $request->place,
                    'description' => $request->description,
                ]);
                $blotter->save();
    
                return response()->json(array('success' => true, 'Successfully Added',$blotter),200);
            }
    }

    public function edit($id)
    {
        $blotters = Blotter::where('id',$id)->orderBy('id')->firstOrFail();
        return response()->json(compact('blotters'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(Input::all(), $this->rules($id));
 
        if ($validator->fails()) {
            return response()->json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ));
        } else {
            $blotter = Blotter::where('id',$id)->firstOrFail();
            $blotter->reference = $request->reference;
            $blotter->complainant = $request->complainant;
            $blotter->respondent = $request->respondent;
            $blotter->incident_type = $request->incident_type;
            $blotter->date_report = $request->date_report;
            $blotter->date_incident = $request->date_incident;
            $blotter->place = $request->place;
            $blotter->description = $request->description;
            $blotter->save();
            return response()->json(array('success' => true, 'Successfully Update', $blotter), 200);
        }
    }

    public function destroy($id)
    {
        $blotter = Blotter::find($id);
        $blotter->delete();
        
        return response()->json(array('success' => true, 'Successfully Deleted!', $blotter), 200);
    }

    public function redraw()
    {
        $blotters = Blotter::select('blotters.*', 'residents.firstname as firstname', 'residents.middlename as middlename', 'residents.surname as surname',
                                     'incident_types.incident_type as incident_type')
        ->join('residents', 'residents.id', '=', 'blotters.complainant')
        ->join('incident_types', 'incident_types.id', '=', 'blotters.incident_type')
        ->get();
        
        if (request()->ajax()) {
            return datatables()->of($blotters)
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function blotterVerification()
    {
        $blotters = Blotter::orderBy('id')->get();
        return view('businessDev.pages.cashier.blotter-verification',compact('blotters'));
    }
}
