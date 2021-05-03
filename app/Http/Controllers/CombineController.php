<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Combine;
use App\Car;
use App\Accessary;
use Illuminate\Support\Facades\DB;

class CombineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $combines = DB::select(
           'select l.*,x.name car_name,p.name accessary_name from lapxe l,xe x,phutungxe p
            where x.id = l.car_id and p.id = l.accessary_id'
            );
        return view('admin.combine.listCombine',['combines'=>$combines]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cars = Car::all();
        $accessaries =  DB::table('phutungxe')->where('status', '=', 1)->get();
        return view('admin.combine.addCombine',['cars' => $cars,'accessaries' => $accessaries]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // Form validation
         $this->validate($request, [
            'car' => 'required',
            'accessary' => 'required'
        ]);
        //  Store data in database
        $combine = new Combine([
            'car_id' => $request->input('car'),
            'accessary_id' => $request->input('accessary'),
        ]);
        $combine->save();
        return redirect()->route('combine.list')->with("success","Lưu thành công");
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
        $combine = Combine::find($id);
        $cars = Car::all();
        $accessaries = DB::table('phutungxe')->where('status', '=', 1)->get();
        return view('admin.combine.editCombine',['cars' => $cars,'accessaries' => $accessaries,'combine' => $combine]);
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
        $combine = Combine::find($id);
        $combine->car_id = $request->input('car');
        $combine->accessary_id = $request->input('accessary');
        $combine->save();
        return redirect()->route('combine.list')->with("success","Cập nhật thành công");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $combine = Combine::find($id);
        $combine->delete();
        return redirect()->route('combine.list')->with("success","Xóa thành công");
    }
}
