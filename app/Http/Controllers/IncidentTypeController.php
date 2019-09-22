<?php

namespace App\Http\Controllers;
use App\IncidentType;
use App\User;
use Auth;
use Validator;
use Illuminate\Support\Facades\Input;
use Response;
use Illuminate\Http\Request;

class IncidentTypeController extends Controller
{
    public function rules()
    {
        return [
            'incident_type' => 'required | string | unique:incident_types| max:60'
        ];
    }

    public function index()
    {
        $incident_types = IncidentType::orderBy('id')->get();
        
        return view('businessDev.pages.maintenance.incident-type',compact('incident_types'));
    }

    public function store(Request $request)
    {
        if (IncidentType::where('incident_type', $request->incident_type)->onlyTrashed()->exists()) {
            $incident_type = IncidentType::withTrashed()->where('incident_type', $request->incident_type)->restore();
            return response()->json(array('success' => true, 'Successfully Added', $incident_type), 200);
         } else {
            $validator = Validator::make(Input::all(), $this->rules());
    
            if ($validator->fails()) {
                return response()->json(array(
                    'success' => false,
                    'errors' => $validator->getMessageBag()->toArray()
                ));
            } else {
                $incident_type = new IncidentType([
                    'incident_type' => strtoupper($request->incident_type),
                ]);
                $incident_type->save();
    
                return response()->json(array('success' => true, 'Successfully Added', $incident_type), 200);
            }
         }
    }

    public function edit($id)
    {
        $incident_types = IncidentType::where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('incident_types'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(Input::all(), $this->rules());

        if ($validator->fails()) {
            return response()->json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ));
        } else {
            $incident_type = IncidentType::where('id', $id)->firstOrFail();
            $incident_type->incident_type = strtoupper($request->incident_type);
            $incident_type->save();
            return response()->json(array('success' => true, 'Successfully Update', $incident_type), 200);
        }
    }

    public function destroy($id)
    {
        $incident_type = IncidentType::find($id);
        $incident_type->delete();
        
        return response()->json(array('success' => true, 'Successfully Deleted!', $incident_type), 200);
    }

    public function redraw()
    {
        $incident_types = IncidentType::orderBy('id')->get();
        if (request()->ajax()) {
            return datatables()->of($incident_types)
            ->make(true);
        }
    }
}

