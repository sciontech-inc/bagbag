<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mission;
use App\Event;
use App\Announcement;
use App\School;
use App\Project;
use App\QueueNumber;
use Carbon\Carbon;

class BarangayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mission = Mission::orderBy('id')->firstOrFail();
        $events = Event::orderBy('id')->get();
        $announcements = Announcement::orderBy('id')->get();
        $projects = Project::orderBy('id')->get();
        $schools = School::orderBy('id')->get();
        $schoolCount = $schools->count();
        $queues = QueueNumber::with('user')->orderBy('id')->get();
        $queue = QueueNumber::with('user')->where('status', '0n-Queue')->orderBy('created_at')->limit(1)->get();

        return view('frontend.master.template',compact('mission','events','announcements','projects', 'queues', 'queue', 'schools', 'schoolCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function queue()
    {
        $queues = QueueNumber::with('user')->where('status', 'On-Queue')->orderBy('id')->get();
        $queue = QueueNumber::with('user')->where('status', 'On-Queue')->orderBy('created_at')->limit(2)->get();

        return view('frontend.pages.queue',compact('queues', 'queue'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
