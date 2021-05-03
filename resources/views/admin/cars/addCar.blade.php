@extends('admin.layouts.index')

@section('title','Thêm xe')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Xe
                    <small>Thêm</small>
                </h1>
                <form action="{{ route('car.add') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="form-group">
                        <label for="title">Tên xe:</label>
                        <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" id="title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="sku">Mã xe:</label>
                        <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" id="sku" name="sku">
                    </div>
                    <div class="form-group">
                        <label for="brand_id">Hãng xe:</label>
                        <select class="form-control" name="brand_id" id="brand_id">
                            @foreach ($brands as $brand)
                                <option value="{{ $brand['id'] }}">{{ $brand['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price">Giá tiền:</label>
                        <input type="number" class="form-control" placeholder="Nhập giá tiền" id="price" name="price" min=1>
                    </div>
                    <div class="form-group">
                        <label for="hire_price">Giá thuê:</label>
                        <input type="number" class="form-control" placeholder="Nhập giá tiền" id="hire_price" name="hire_price" min=1>
                    </div>
                    <div class="form-group">
                        <label for="content">Mô tả xe:</label>
                        <textarea class="form-control" id="content" name="content"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Chọn hình ảnh</label>
                        <input id="image" type="file" name="image" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                  </form>
            </div>
        </div>
    </div>    
</div>
@endsection