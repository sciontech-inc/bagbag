<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Receipt;
use App\Position;
use Auth;
use Validator;
use Illuminate\Support\Facades\Input;
use Response;
use DataTables;
class ReceiptController extends Controller
{
    public function rules($id)
    {
        return [
            'tin' => 'required | max:60',
            'user_id' => 'required | max:60',
            'contact' => 'required | max:11 | min:11',
            'address' => 'required | max:200',
        ];
    }

    public function index()
    {
        $receipts = Receipt::orderBy('id')->get();
        return view('businessDev.pages.cashier.receipt',compact('receipts'));
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
                $image = $request->file('image');
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $new_name);

                $receipt = new Receipt([
                    'tin' => $request->tin,
                    'user_id' => $request->user_id,
                    'contact' => $request->contact,
                    'address' => $request->address,
                ]);
                $receipt->save();
    
                return response()->json(array('success' => true, 'Successfully Added',$receipt),200);
            }
    }

    public function edit($id)
    {
        $receipts = Receipt::where('id',$id)->orderBy('id')->firstOrFail();
        return response()->json(compact('receipts'));
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
            $receipt = Receipt::where('id',$id)->firstOrFail();
            $receipt->user_id = $request->user_id;
            $receipt->tin = $request->tin;
            $receipt->contact = $request->contact;
            $receipt->address = $request->address;
            $receipt->save();
            return response()->json(array('success' => true, 'Successfully Added', $receipt), 200);
        }
    }

    public function destroy($id)
    {
        $receipt = Receipt::find($id);
        $receipt->delete();
        
        return response()->json(array('success' => true, 'Successfully Deleted!', $receipt), 200);
    }

    public function redraw()
    {
        $receipts = Receipt::orderBy('id')->get();
        if (request()->ajax()) {
            return datatables()->of($receipts)
            ->addIndexColumn()
            ->make(true);
        }
    }
}
