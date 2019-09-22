<?php

namespace App\Http\Controllers;
use App\Clearance;
use App\IncidentType;
use Auth;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Input;
use Response;

class ClearanceController extends Controller
{
    public function rules($id)
    {
        return [
            'entry_number' => 'required |string | max:60 | unique:clearances,entry_number,' . $id . ',id,deleted_at,NULL',
            'incident_type' => 'required | string | max:200',
            'description' => 'required | string | max:200',
            'date_time_report' => 'required | string| max:60',
            'date_time_incident' => 'required | max:60',
            'place_incident' => 'required | string | max:200',
            'surname' => 'required | string | max:60',
            'middlename' => 'required | string | max:60',
            'citizenship' => 'required | string | max:60',
            'gender' => 'required | string | max:60',
            'civil_status' => 'required | string | max:60',
            'birthday' => 'required | string | max:60',
            'age' => 'required | max:60',
            'birthplace' => 'required | string | max:60',
            'contact_no' => 'required | max:60',
            'current_address' => 'required | string | max:200',
            'other_address' => 'required | string | max:200',
            'educational' => 'required | string | max:60',
            'occupation' => 'required | string | max:60',
            'card_presented' => 'required | string | max:60',
            'email' => 'required | string | max:60',
        ];
    }

    public function index()
    {
        $clearances = Clearance::orderBy('id')->get();
        $incident_types = IncidentType::orderBy('id')->get();
        return view('businessDev.pages.clearance.index',compact('clearances','incident_types'));
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
                $clearance = new Clearance([
                    'entry_number' => $request->entry_number,
                    'description' => $request->description,
                    'incident_type' => $request->incident_type,
                    'date_time_report' => $request->date_time_report,
                    'date_time_incident' => $request->date_time_incident,
                    'place_incident' => $request->place_incident,
                    'surname' => $request->surname,
                    'firstname' => $request->firstname,
                    'middlename' => $request->middlename,
                    'nickname' => $request->nickname,
                    'citizenship' => $request->citizenship,
                    'gender' => $request->gender,
                    'civil_status' => $request->civil_status,
                    'birthday' => $request->birthday,
                    'age' => $request->age,
                    'birthplace' => $request->birthplace,
                    'contact_no' => $request->contact_no,
                    'current_address' => $request->current_address,
                    'other_address' => $request->other_address,
                    'educational' => $request->educational,
                    'occupation' => $request->occupation,
                    'card_presented' => $request->card_presented,
                    'email' => $request->email,
                ]);
                $clearance->save();
    
                return response()->json(array('success' => true, 'Successfully Added',$clearance),200);
            }
    }

    public function edit($id)
    {
        $clearances = Clearance::where('id',$id)->orderBy('id')->firstOrFail();
        return response()->json(compact('clearances'));
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
            $clearance = Clearance::where('id',$id)->firstOrFail();
            $clearance->entry_number = $request->entry_number;
            $clearance->description = $request->description;
            $clearance->incident_type = $request->incident_type;
            $clearance->date_time_report = $request->date_time_report;
            $clearance->date_time_incident = $request->date_time_incident;
            $clearance->place_incident = $request->place_incident;
            $clearance->surname = $request->surname;
            $clearance->firstname = $request->firstname;
            $clearance->middlename = $request->middlename;
            $clearance->nickname = $request->nickname;
            $clearance->citizenship = $request->citizenship;
            $clearance->gender = $request->gender;
            $clearance->civil_status = $request->civil_status;
            $clearance->birthday = $request->birthday;
            $clearance->age = $request->age;
            $clearance->birthplace = $request->birthplace;
            $clearance->contact_no = $request->contact_no;
            $clearance->current_address = $request->current_address;
            $clearance->other_address = $request->other_address;
            $clearance->educational = $request->educational;
            $clearance->occupation = $request->occupation;
            $clearance->card_presented = $request->card_presented;
            $clearance->email = $request->email;
            $clearance->save();
            return response()->json(array('success' => true, 'Successfully Added', $clearance), 200);
        }
    }

    public function destroy($id)
    {
        $clearance = Clearance::find($id);
        $clearance->delete();
        
        return response()->json(array('success' => true, 'Successfully Deleted!', $clearance), 200);
    }

    public function redraw()
    {
        $clearances = Clearance::orderBy('id')->get();
        if (request()->ajax()) {
            return datatables()->of($clearances)
            ->addIndexColumn()
            ->make(true);
        }
    }
}
