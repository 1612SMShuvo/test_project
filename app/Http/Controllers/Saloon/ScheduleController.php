<?php

namespace App\Http\Controllers\Saloon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect;
use App\Model\Schedule;

class ScheduleController extends Controller
{
    //
    public function index()
    {
        $schedule = Schedule::orderBy('created_at','desc')->get();
        $id = Schedule::max('id');
        if($id == null){
            $schedule_no = 1;
        }else{
            $schedule_no = $id + 1;
        }
        return view('schedule.scheduleList',compact('schedule','schedule_no'));
    }

    public function store_schedule(Request $request)
    {
        $input['schedule_no'] = $request->schedule_no;
        $input['schedule_time'] = $request->schedule_time;
        $input['status'] = 1;
        $insert = Schedule::insert($input);
        return Redirect::route('schedule-index');
    }
}
