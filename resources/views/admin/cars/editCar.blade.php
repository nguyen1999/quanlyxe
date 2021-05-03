@extends('admin.layouts.index')

@section('title','Cập nhật xe')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Xe
                    <small>Cập nhật</small>
                </h1>
                <form action="{{ route('car.edit',['id' => $car['id']]) }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="form-group">
                        <label for="title">Tên xe:</label>
                        <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" id="title" name="title" value="{{ $car['name'] }}">
                    </div>
                    <div class="form-group">
                        <label for="sku">Mã xe:</label>
                        <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" id="sku" name="sku" value="{{ $car['sku'] }}">
                    </div>
                    <div class="form-group">
                        <label for="brand_id">Thương hiệu sản phẩm:</label>
                        <select class="form-control" name="brand_id" id="brand_id">
                            @foreach ($brands as $brand)
                                @if ($brand['id'] === $car['brand_id'])
                                    <option value="{{ $brand['id'] }}" selected>{{ $brand['name'] }}</option>
                                @else
                                    <option value="{{ $brand['id'] }}">{{ $brand['name'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price">Giá tiền:</label>
                        <input type="number" class="form-control" placeholder="Nhập giá tiền" id="price" name="price" min=1 value="{{ $car['price'] }}">
                    </div>
                    <div class="form-group">
                        <label for="hire_price">Giá thuê:</label>
                        <input type="number" class="form-control" placeholder="Nhập giá tiền" id="hire_price" name="hire_price" min=1 value={{ $car['hire_price'] }}>
                    </div>
                    <div class="form-group">
                        <label for="content">Mô tả xe:</label>
                        <textarea class="form-control" id="content" name="content">{!! $car['description'] !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="status">Trạng thái:</label>
                        <select class="form-control" name="status" id="status">
                            @if ($car['status'] === 1)
                                <option value="1" selected>Còn trống</option>
                                <option value="0">Có người thuê</option>
                            @else
                                <option value="1">Còn trống</option>
                                <option value="0" selected>Có người thuê</option>
                            @endif
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                  </form>
            </div>
        </div>
    </div>    
</div>
@endsection