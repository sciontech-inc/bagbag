<?php

namespace App\Http\Controllers;
use App\Position;
use App\User;
use Auth;
use Validator;
use Illuminate\Support\Facades\Input;
use Response;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function rules()
    {
        return [
            'position' => 'required | string | unique:positions| max:60'
        ];
    }

    public function index()
    {
        $positions = Position::orderBy('id')->get();
        
        return view('businessDev.pages.maintenance.position',compact('positions'));
    }

    public function store(Request $request)
    {
        if (Position::where('position', $request->position)->onlyTrashed()->exists()) {
            $position = Position::withTrashed()->where('position', $request->position)->restore();
            return response()->json(array('success' => true, 'Successfully Added', $position), 200);
         } else {
            $validator = Validator::make(Input::all(), $this->rules());
    
            if ($validator->fails()) {
                return response()->json(array(
                    'success' => false,
                    'errors' => $validator->getMessageBag()->toArray()
                ));
            } else {
                $position = new Position([
                    'position' => strtoupper($request->position),
                ]);
                $position->save();
    
                return response()->json(array('success' => true, 'Successfully Added', $position), 200);
            }
         }
    }

    public function edit($id)
    {
        $positions = Position::where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('positions'));
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
            $position = Position::where('id', $id)->firstOrFail();
            $position->position = strtoupper($request->position);
            $position->save();
            return response()->json(array('success' => true, 'Successfully Update', $position), 200);
        }
    }

    public function destroy($id)
    {
        $position = Position::find($id);
        $position->delete();
        
        return response()->json(array('success' => true, 'Successfully Deleted!', $position), 200);
    }

    public function redraw()
    {
        $positions = Position::orderBy('id')->get();
        if (request()->ajax()) {
            return datatables()->of($positions)
            ->make(true);
        }
    }
}
