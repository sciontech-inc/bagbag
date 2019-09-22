<?php

namespace App\Http\Controllers;
use App\Resident;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Input;
use Response;

class ResidentController extends Controller
{
    public function rules($id)
    {
        return [
            'reference' => 'required |string | max:60 | unique:residents,reference,' . $id . ',id,deleted_at,NULL',
            'surname' => 'required | string | max:60',
            'firstname' => 'required | string | max:60',
            'middlename' => 'required | string | max:60',
            'nickname' => 'required | string | max:60',
            'resident_date' => 'required | string | max:200',
            'citizenship' => 'required | string | max:60',
            'gender' => 'required | string | max:60',
            'civil_status' => 'required | string | max:60',
            'gender' => 'required | string | max:60',
            'birthday' => 'required | string | max:60',
            'age' => 'required | max:60',
            'birthplace' => 'required | string | max:60',
            'contact_no' => 'required | max:60',
            'current_address' => 'required | string | max:180',
            'other_address' =>  'max:180',
            'educational' => 'required | string | max:60',
            'occupation' => 'required | string | max:60',
            'card_presented' => 'required | string | max:60',
            'email' => 'required | string | max:60',
        ];
    }

    public function index()
    {
        $residents = Resident::orderBy('id')->get();
        return view('businessDev.pages.general.residence',compact('residents'));
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

                $resident = new Resident([
                    'reference' => $request->reference,
                    'surname' => $request->surname,
                    'firstname' => $request->firstname,
                    'middlename' => $request->middlename,
                    'nickname' => $request->nickname,
                    'resident_date' => $request->resident_date,
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
                $resident->save();
    
                return response()->json(array('success' => true, 'Successfully Added',$resident),200);
            }
    }

    public function edit($id)
    {
        $residents = Resident::where('id',$id)->orderBy('id')->firstOrFail();
        return response()->json(compact('residents'));
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

            $resident = Resident::where('id',$id)->firstOrFail();
            $resident->reference = $request->reference;
            $resident->surname = $request->surname;
            $resident->firstname = $request->firstname;
            $resident->middlename = $request->middlename;
            $resident->nickname = $request->nickname;
            $resident->resident_date = $request->resident_date;
            $resident->citizenship = $request->citizenship;
            $resident->gender = $request->gender;
            $resident->civil_status = $request->civil_status;
            $resident->birthday = $request->birthday;
            $resident->age = $request->age;
            $resident->birthplace = $request->birthplace;
            $resident->contact_no = $request->contact_no;
            $resident->current_address = $request->current_address;
            $resident->other_address = $request->other_address;
            $resident->educational = $request->educational;
            $resident->occupation = $request->occupation;
            $resident->card_presented = $request->card_presented;
            $resident->email = $request->email;
            $resident->save();
            return response()->json(array('success' => true, 'Successfully Update', $resident), 200);
        }
    }

    public function destroy($id)
    {
        $resident = Resident::find($id);
        $resident->delete();
        
        return response()->json(array('success' => true, 'Successfully Deleted!', $resident), 200);
    }

    public function redraw()
    {
        $residents = Resident::orderBy('id')->get();
        if (request()->ajax()) {
            return datatables()->of($residents)
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function fingerPrint($id)
    {
        $residents = Resident::find($id)->first();
        return view('businessDev.pages.general.biodata',compact('residents'));
    }
}
