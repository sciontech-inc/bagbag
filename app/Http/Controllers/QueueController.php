<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QueueNumber;
use Auth;
class QueueController extends Controller
{
    public function index()
    {
        $queues = QueueNumber::with('user')->orderBy('id')->get();
        $queue = QueueNumber::with('user')->where('status', '0n-Queue')->orderBy('created_at')->limit(1)->get();
        return view('businessDev.pages.queue.index',compact('queues', 'queue'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $queue = new QueueNumber([
            'queue_no' => $request->queue_no,
            'date' => $request->date,
            'status' => $request->status,
            'purpose' => $request->purpose,
            'user_id' => Auth::user()->id,
        ]);
        $queue->save();
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $queue = QueueNumber::where('id', $id)->first();
        $queue->status = $request->status;
        $queue->update();
        
    }

    public function destroy($id)
    {
        //
    }
}
