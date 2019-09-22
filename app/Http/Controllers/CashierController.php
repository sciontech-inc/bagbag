<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use App\Http\Controllers\Controller;
use App\Cashier;
use App\Transaction;
use App\Receipt;
use App\User;
use Auth;
use Validator;
use Illuminate\Support\Facades\Input;
use Response;

class CashierController extends Controller
{
    public function rules($id)
    {
        return [
            'tin' => 'required | max:60',
            'resident' => 'required | max:60',
            'discount' => 'max:10',
            'sub_total' => 'max:10',
            'total_amount' => 'max:15',
            'pay_amount' => 'max:15',
            'change' => 'max:15',
            'item' => 'required | max:200',
            'quantity' => 'required | max:200',
            'price' => 'required | max:200',
            'total' => 'required | max:200',
            'receipt_no' => 'required | max:200',
        ];
    }

    public function index()
    {
        $cashiers = Cashier::orderBy('id')->get();
        $receipt = Receipt::first();
        $residents = User::where('role', 'User')->orderBy('id')->get();

        return view('businessDev.pages.cashier.index',compact('cashiers', 'receipt', 'residents'));
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
                $receipt_detail = Receipt::firstOrFail();
                if(Cashier::where('receipt_no', $request->receipt_no)->exists()) {
                    $cashier = Cashier::where('receipt_no', $request->receipt_no)->first();
                    $cashier->discount = $request->discount;
                    $cashier->sub_total = $request->sub_total;
                    $cashier->total_amount = $request->total_amount;
                    $cashier->pay_amount = $request->pay_amount;
                    $cashier->change = $request->change;
                } else {
                    $cashier = new Cashier([
                        'receipt_no' => $request->receipt_no,
                        'tin' => $request->tin,
                        'resident' => $request->resident,
                        'contact' => $request->contact,
                        'address' => $request->address,
                        'discount' => $request->discount,
                        'sub_total' => $request->sub_total,
                        'total_amount' => $request->total_amount,
                        'pay_amount' => $request->pay_amount,
                        'change' => $request->change,
                        'contact' => $receipt_detail->contact,
                        'address' => $receipt_detail->address,
                    ]);
                    $cashier->save();
                }
    
                $transaction = new Transaction([
                    'cashier_id' => $cashier->id,
                    'item' => $request->item,
                    'quantity' => $request->quantity,
                    'price' => $request->price,
                    'total' => $request->quantity * $request->price,
                ]);
                $transaction->save();

                // Computation
                $total = Transaction::where('cashier_id', $cashier->id)->get();
                $total_payment = $total->sum('total');
                return response()->json(array('success' => true, 'Successfully Added', $cashier, 'total_amount' => $total_payment),200);
            }
    }

    public function edit($id)
    {
        $cashiers = Cashier::where('id',$id)->orderBy('id')->firstOrFail();
        return response()->json(compact('cashiers'));
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
            $image = $request->file('image');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $new_name);

            $cashier = Cashier::where('id',$id)->firstOrFail();
            $cashier->firstname = $request->firstname;
            $cashier->middlename = $request->middlename;
            $cashier->surname = $request->surname;
            $cashier->position = $request->position;
            $cashier->about = $request->about;
            $cashier->address = $request->address;
            $cashier->contact = $request->contact;
            $cashier->image = $new_name;
            $cashier->save();
            return response()->json(array('success' => true, 'Successfully Added', $cashier), 200);
        }
    }

    public function destroy($id)
    {
        $cashier = Cashier::find($id);
        $cashier->delete();
        
        return response()->json(array('success' => true, 'Successfully Deleted!', $cashier), 200);
    }

    public function redraw($id)
    {
        $transaction = Transaction::where('cashier_id', $id)->orderBy('id','desc')->get();
        if (request()->ajax()) {
            return datatables()->of($transaction)
            ->addIndexColumn()
            ->make(true);
        }
    }

    function addSpaces($string = '', $valid_string_length = 0) {
        if (strlen($string) < $valid_string_length) {
            $spaces = $valid_string_length - strlen($string);
            for ($index1 = 1; $index1 <= $spaces; $index1++) {
                $string = $string . ' ';
            }
        }
    
        return $string;
    }

    public function printReceipt($id) 
    {
        $record = Cashier::with('transaction')->where('id', $id)->first();
        $sub_total = Transaction::select('total')->where('cashier_id', $id)->GroupBy('cashier_id')->sum('total');;
        try {
                $connector = new WindowsPrintConnector("smb://DESKTOP-EDUV80E/thermal");
                $printer = new Printer($connector);
                $printer->selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
                $printer->setJustification(Printer::JUSTIFY_CENTER);
                $printer->text("Barangay Bagbag\n");
                $printer->selectPrintMode();
                $printer->text( $record->address . "\n" );
                $printer->text( $record->contact . "\n" );
                $printer->text( $record->tin . "\n\n\n" );
                $printer->setJustification(Printer::JUSTIFY_LEFT);
                $printer->text("Receipt No. :" . $record->receipt_no . "\n");

                $printer->feed();
                /* Title of receipt */
                $printer->setJustification(Printer::JUSTIFY_CENTER);
                $printer->setEmphasis(true);
                $printer->text("RECEIPT\n");
                $printer->setEmphasis(false);
                $printer->text( $record->created_at . "\n" );

                $printer->feed(1);

                $printer->setEmphasis(true);
                $printer->text($this->addSpaces('Item', 15) . $this->addSpaces('QtyxPrice', 11) . $this->addSpaces('Total', 7) . "\n");
                $printer->setEmphasis(false);

                foreach ($record->transaction as $key => $value) {
                    $printer->text($this->addSpaces($value->item, 15) . $this->addSpaces($value->quantity . "x" . $value->price , 11) . $this->addSpaces($value->total, 7) . "\n");
                }
                $printer->setJustification(Printer::JUSTIFY_CENTER);
                $printer->text("-------------------------------\n");
               
                $printer->feed(2);
                $printer->setJustification(Printer::JUSTIFY_LEFT);
                $printer->text("Sub Total : Php. " . $sub_total . "\n");
                $printer->text("Discount : Php. " . $record->discount . "\n");
                $printer->text("Cash : Php. " . $record->pay_amount . "\n");
                $printer->text("Change : Php. " . (($record->pay_amount -  $sub_total) + ($record->discount))  . "\n");

                $printer->feed(2);

                $printer->setEmphasis(true);
                $printer->text("Total : Php. " . ($sub_total - $record->discount) . "\n");

                $printer->setEmphasis(false);
                $printer->setJustification(Printer::JUSTIFY_CENTER);
                $printer->text("Thank You! " . $record->resident . "\n");
                /* Cut the receipt and open the cash drawer */
                $printer->feed(3);

                $printer->cut();
                $printer->pulse();
                /* Close printer */
                $printer->close();
                // echo "Sudah di Print";
                response()->json($printer);
            } catch (Exception $e) {
                $message = "Couldn't print to this printer: " . $e->getMessage() . "\n";
                return false;
            }
    }
}
