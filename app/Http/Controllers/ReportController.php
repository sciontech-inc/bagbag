<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resident;
use App\Certification;
use App\Cashier;

class ReportController extends Controller
{
    public function resident()
    {
        $residents = Resident::orderBy('id')->get();
        return view('businessDev.pages.report.resident-report', compact('residents'));
    }

    public function clearance()
    {
        $clearances = Certification::with('resident')->orderBy('id')->get();
        return view('businessDev.pages.report.clearance-report', compact('clearances'));
    }

    public function receipt()
    {
        $receipts = Cashier::orderBy('id')->get();
        return view('businessDev.pages.report.receipt-report', compact('receipts'));
    }
}
