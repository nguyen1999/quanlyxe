@extends('admin.layouts.index')

@section('title','Thêm phụ tùng')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Phụ tùng
                    <small>Thêm</small>
                </h1>
                <form action="{{ route('accessary.add') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="form-group">
                        <label for="accessary-name">Tên phụ tùng:</label>
                        <input type="text" class="form-control" placeholder="Nhập tên phụ tùng" id="accessary-name" name="accessary-name" required>
                    </div>
                    <div class="form-group">
                        <label for="date-manufacture">Ngày sản xuất:</label>
                        <input type="date" class="form-control"  id="date-manufacture" name="date-manufacture" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                  </form>
            </div>
        </div>
    </div>    
</div>
@endsection