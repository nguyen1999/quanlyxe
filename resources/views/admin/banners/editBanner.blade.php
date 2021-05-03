@extends('admin.layouts.index')

@section('title','Cập nhật banner')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Banner
                    <small>Cập nhật</small>
                </h1>
                <form action="{{ route('banner.edit',['id' => $slide['id']]) }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="form-group">
                        <label for="slide-name">Tên slide:</label>
                        <input type="text" class="form-control" placeholder="Nhập tên slide" id="slide-name" name="slide-name" value='{{ $slide['name'] }}'>
                    </div>
                    <div class="form-group">
                        <label for="sort-order">Thứ tự hiển thị</label>
                        <input type="text" class="form-control" placeholder="Nhập thứ tự xuất hiện" id="sort-order" name="sort-order" value='{{ $slide['sort_order'] }}'>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                  </form>
            </div>
        </div>
    </div>   
</div>
@endsection