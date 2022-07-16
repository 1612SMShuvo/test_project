<?php

namespace App\Http\Controllers\Booking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect;
use App\Model\Schedule;
use App\Model\Booking;
use DB;

class BookingController extends Controller
{
    public function index()
    {
        $today = date('d-m-Y',strtotime(now()));
        $schedule = Schedule::orderBy('created_at','desc')->where('status',1)->get();
        $booking = Booking::where('book_date',$today)->get();
        // dd($booking);
        $id = Booking::max('id');
        if($id == null){
            $book_no = 1;
        }else{
            $book_no = $id + 1;
        }
        $book = DB::table('bookings')
                ->join('schedules','schedules.id','=','bookings.schedule_id')
                ->select('bookings.*','schedules.schedule_time')
                ->where('bookings.status',1)
                ->orderBy('bookings.created_at','desc')
                ->get();
                // dd($book);
        return view('Book.bookList',compact('schedule','booking','book_no','book'));
    }

    public function store_book(Request $request)
    {
        
        $request->validate([
            'book_no'   => 'required',
            'customer_name'   => 'required',
            'schedule_id'   => 'required',
        ],
            [
                'book_no.required' => 'Book Name Field Required',
                'customer_name.required' => 'Customer Name Field Required',
                'schedule_id.required' => 'Schedule Field Required',
            ]);
        $input['book_no'] = $request->book_no;
        $input['customer_name'] = $request->customer_name;
        $input['schedule_id'] = $request->schedule_id;
        $input['status'] = 1;
        $input['book_date'] = date('d-m-Y',strtotime(now()));
        $insert = Booking::insert($input);
        return Redirect::route('booking-index');
    }
}
