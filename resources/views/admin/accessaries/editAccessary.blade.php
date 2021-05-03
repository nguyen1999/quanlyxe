@extends('admin.layouts.index')

@section('title','Cập nhật phụ tùng')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Phụ tùng
                    <small>Cập nhật</small>
                </h1>
                <form action="{{ route('accessary.edit',['id' => $accessary['id']]) }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="form-group">
                        <label for="accessary-name">Tên phụ tùng:</label>
                        <input type="text" class="form-control" placeholder="Nhập tên phụ tùng" id="accessary-name" name="accessary-name" value="{{ $accessary['name'] }}" required>
                    </div>
                    <div class="form-group">
                        <label for="date-manufacture">Ngày sản xuất:</label>
                        <input type="date" class="form-control"  id="date-manufacture" name="date-manufacture" value="{{ $accessary['date_manufacture'] }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                  </form>
            </div>
        </div>
    </div>    
</div>
@endsection