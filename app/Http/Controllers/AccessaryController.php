<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Accessary;
use Illuminate\Support\Facades\DB;

class AccessaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accessaries = Accessary::all();
        return view('admin.accessaries.listAccessary',['accessaries'=>$accessaries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.accessaries.addAccessary');
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
            'accessary-name' => 'required',
            'date-manufacture' => 'required'
        ]);
        //  Store data in database
        $accessary = new Accessary([
            'name' => $request->input('accessary-name'),
            'date_manufacture' => $request->input('date-manufacture'),
        ]);
        $accessary->save();
        return redirect()->route('accessary.list')->with("success","Lưu thành công");
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
        $accessary = Accessary::find($id);
        return view('admin.accessaries.editAccessary',['accessary' => $accessary]);
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
        $acccessary = Accessary::find($id);
        $acccessary->name = $request->input('accessary-name');
        $acccessary->date_manufacture = $request->input('date-manufacture');
        $acccessary->save();
        return redirect()->route('accessary.list')->with("success","Sửa thành công");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $check = DB::select('select * from lapxe where accessary_id = :id', ['id' => $id]);
        if (is_array($check)) {
            if (count($check) > 0) {
                return back()->with("invalid", "Hiện đang có 1 số dòng xe đang được trang bị phụ kiện này.");
            }
            else{
                $brand = Accessary::find($id);
                $brand->delete();
                return redirect()->route('accessary.list')->with("success","Xóa thành công");
            }
        }
    }

    /**
     * Disable status accessary
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function disable($id)
    {
        $accessary = Accessary::find($id);
        $accessary->status = 0;
        $accessary->save();
        return redirect()->route('accessary.list')->with("success","Vô hiệu hóa thành công");
    }

    /**
     * Enable status accessary
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function enable($id)
    {
        $accessary = Accessary::find($id);
        $accessary->status = 1;
        $accessary->save();
        return redirect()->route('accessary.list')->with("success","Mở thành công");
    }
}
