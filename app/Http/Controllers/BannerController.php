<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Banner::all();
        return view('admin.banners.listBanner',['slides'=>$slides]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banners.addBanner');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            //  Let's do everything here
            if ($request->file('image')->isValid()) {
                //
                $validated = $request->validate([
                    'slide-name' => 'required',
                    'sort-order' => 'required',
                    'image' => 'mimes:jpeg,png,webp|max:1014',
                ]);
                $extension = $request->image->extension();
                $request->image->storeAs('/public/images/banners', $validated['slide-name'].".".$extension);
                $slide = Banner::create([
                   'name' => $validated['slide-name'],
                   'sort_order' => $validated['sort-order'],
                   'image_path' => $validated['slide-name'].".".$extension,
                ]);
                $slide->save();
                return redirect()->route('banner.list')->with("success","Lưu thành công");
            }
        }
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
        $slide = Banner::find($id);
        return view('admin.banners.editBanner',['slide' => $slide]);
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
        $slide = Banner::find($id);
        $slide->name = $request->input('slide-name');
        $slide->sort_order = $request->input('sort-order'); 
        $slide->save();
        return redirect()->route('banner.list')->with("success","Cập nhật thành công");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = Banner::find($id);
        $slide->delete();
        return redirect()->route('banner.list')->with("success","Xóa thành công");
    }

    /**
     * Disable status slide
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function disable($id)
    {
        $slide = Banner::find($id);
        $slide->status = 0;
        $slide->save();
        return redirect()->route('banner.list')->with("success","Vô hiệu hóa thành công");
    }

    /**
     * Enable status slide
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function enable($id)
    {
        $slide = Banner::find($id);
        $slide->status = 1;
        $slide->save();
        return redirect()->route('banner.list')->with("success","Mở thành công");
    }
}
