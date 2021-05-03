<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Calendar;
use Illuminate\Support\Facades\Mail;
use App\Mail\Notification;
use App\Car;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calendars = DB::select(
        'select l.*,x.name car_name from lichdatxe l,xe x
         where l.car_id = x.id'
        );
        return view('admin.calendars.listCalendar',['calendars' => $calendars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'identity' => 'required',
            'sex' => 'required',
            'address' => 'required',
            'car_id' => 'required',
            'start_date_at' => 'required',
            'start_time_at' => 'required'
        ]);
        $calendar = Calendar::create([
           'name' => $validated['name'],
           'phone' => $validated['phone'],
           'email' => $validated['email'],
           'sex' => $validated['sex'],
           'address' => $validated['address'],
           'car_id' => $validated['car_id'],
           'start_date_at' => $validated['start_date_at'],
           'start_time_at' => $validated['start_time_at'],
           'identity_card_number' => $validated['identity']
        ]);
        $calendar->save();
        $car = Car::find($validated['car_id']);
        $calendar['car_name'] = $car->name;
        $car->status = 0;
        $car->save();
        Mail::to($validated['email'])->send(new Notification($calendar));
            return redirect()->route('index')->with("success","Cảm ơn bạn đã thuê xe của chúng tôi.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $calendar = DB::select(
            'select l.*,x.name car_name,h.name brand_name from lichdatxe l,xe x,hangxe h
             where l.car_id = x.id and x.brand_id = h.id and l.id = ?',[$id]
        );
        return view('admin.calendars.detailCalendar',['calendar' => $calendar[0]]);
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
        $calendar = Calendar::find($id);
        $calendar->delete();
        return redirect()->route('calendar.list')->with("success","Xóa thành công");
    }
}
