<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Brand;
use App\Car;
use App\Calendar;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = DB::select(
        'select x.*,h.name brand_name from xe x,hangxe h
            where x.brand_id = h.id'
        );
        return view('admin.cars.listCar',['cars'=>$cars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        return view('admin.cars.addCar',['brands' => $brands]);
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
                    'title' => 'required',
                    'price' => 'required',
                    'hire_price' => 'required',
                    'content' => 'required',
                    'brand_id' => 'required',
                    'image' => 'mimes:jpeg,png,webp|max:1014',
                    'sku' => 'required'
                ]);
                $extension = $request->image->extension();
                $request->image->storeAs('/public/images/cars', $validated['title'].".".$extension);
                $car = Car::create([
                   'name' => $validated['title'],
                   'price' => $validated['price'],
                   'hire_price' => $validated['hire_price'],
                   'image_path' => $validated['title'].".".$extension,
                   'description' => $validated['content'],
                   'brand_id' => $validated['brand_id'],
                   'sku' => $validated['sku']
                ]);
                $car->save();
                return redirect()->route('car.list')->with("success","Lưu thành công");
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
        $product = Car::find($id);
        $brand = Brand::find($product['brand_id']);
        $accessaries = DB::select('select p.name from lapxe l,phutungxe p where l.accessary_id = p.id and l.car_id = ?',[$id]);
        $randomProduct = Car::inRandomOrder()->limit(3)->get();
        return view('product-detail',['product'=>$product,'randomProduct'=>$randomProduct,'brand_img' => $brand->img_path,'accessaries' => $accessaries]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Car::find($id);
        $brands = Brand::all();
        return view('admin.cars.editCar',['brands' => $brands,'car' => $car]);
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
        $car = Car::find($id);
        $car->name = $request->input('title');
        $car->price = $request->input('price');
        $car->hire_price = $request->input('price');
        $car->brand_id = $request->input('brand_id');
        $car->description = $request->input('content');
        $car->sku = $request->input('sku');
        $car->status = $request->input('status');
        $car->save();
        $calendar = Calendar::where('car_id', '=', $car->id)->get();
        foreach($calendar as $item){
            $item->status = 0;
            $item->save();
        }
        return redirect()->route('car.list')->with("success","Cập nhật thành công");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $check = DB::select('select * from lichdatxe where car_id = :id', ['id' => $id]);
        if(is_array($check)){
            if(count($check) >= 0){
                return back()->with("invalid","Hiện tại xe này có nằm trong lịch thuê xe.");
            }else{
                $car = Car::find($id);
                $car->delete();
                return redirect()->route('car.list')->with("success","Xóa thành công");
            }
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $products = DB::table('xe')->where('status','=',1)->paginate(12);
        return view('products',['products'=>$products]);
    }

    /**
     * Show the form for registering the car.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function register($id)
    {
        $product = Car::find($id);
        return view('product-register',['product'=>$product]);
    }
}
