@extends('admin.layouts.index')

@section('title','Thêm banner')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Banner
                    <small>Thêm</small>
                </h1>
                <form action="{{ route('banner.add') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="form-group">
                        <label for="slide-name">Tên banner:</label>
                        <input type="text" class="form-control" placeholder="Nhập tên banner" id="slide-name" name="slide-name" required>
                    </div>
                    <div class="form-group">
                        <label for="sort-order">Thứ tự hiển thị:</label>
                        <input type="number" class="form-control" placeholder="Nhập thứ tự xuất hiện" id="sort-order" name="sort-order" required>
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