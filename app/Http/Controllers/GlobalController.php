<?php

namespace App\Http\Controllers;
use App\Registration;
use App\Resident;
use App\Blotter;
use App\QueueNumber;
use App\Cashier;
use Illuminate\Http\Request;
class GlobalController extends Controller
{
    public function registerCode()
    {
        $code = Registration::latest('id')->withTrashed()->first();
        return response()->json(compact('code'));
    }

    public function residentCode()
    {
        $code = Resident::latest('id')->withTrashed()->first();
        return response()->json(compact('code'));
    }

    public function blotterCode()
    {
        $code = Blotter::latest('id')->withTrashed()->first();
        return response()->json(compact('code'));
    }

    public function queuingCode()
    {
        $code = QueueNumber::latest('id')->first();
        return response()->json(compact('code'));
    }

    public function receiptNo()
    {
        $code = Cashier::latest('id')->first();
        return response()->json(compact('code'));
    }
}
