@extends('admin.layouts.index')

@section('title','Cập nhật brand')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Hãng xe
                    <small>Cập nhật</small>
                </h1>
                <form action="{{ route('brand.edit',['id' => $brand['id']]) }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="form-group">
                        <label for="brand-name">Tên hãng xe:</label>
                        <input type="text" class="form-control" placeholder="Nhập tên thương hiệu" id="brand-name" name="brand-name" value='{{ $brand['name'] }}' required>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                    <a href="{{ route('brand.back') }}" type="button" class="btn btn-danger">Quay lại</a>
                  </form>
            </div>
        </div>
    </div>   
</div>
@endsection