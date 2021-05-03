@extends('admin.layouts.index')

@section('title','Danh sách lắp phụ tùng xe')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Lắp phụ tùng
                    <small>Thêm</small>
                </h1>
                <form action="{{ route('combine.add') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="form-group">
                        <label for="car">Xe:</label>
                        <select class="form-control" name="car" id="car" required>
                            @foreach ($cars as $car)
                                <option value="{{ $car['id'] }}">{{ $car['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="accessary">Phụ tùng xe:</label>
                        <select class="form-control" name="accessary" id="accessary" required>
                            @foreach ($accessaries as $accessary)
                                <option value="{{ $accessary->id }}">{{ $accessary->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                  </form>
            </div>
        </div>
    </div>    
</div>
@endsection