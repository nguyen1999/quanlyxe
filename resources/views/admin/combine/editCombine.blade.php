@extends('admin.layouts.index')

@section('title','Cập nhật lắp phụ tùng xe')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Lắp phụ tùng
                    <small>Cập nhật</small>
                </h1>
                <form action="{{ route('combine.edit',['id' => $combine['id']]) }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="form-group">
                        <label for="car">Xe:</label>
                        <select class="form-control" name="car" id="car" required>
                            @foreach ($cars as $car)
                                @if ($combine['car_id'] === $car['id'])
                                    <option value="{{ $car['id'] }}" selected>{{ $car['name'] }}</option>
                                @else
                                    <option value="{{ $car['id'] }}">{{ $car['name'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="accessary">Phụ tùng xe:</label>
                        <select class="form-control" name="accessary" id="accessary" required>
                            @foreach ($accessaries as $accessary)
                                @if ($combine['accessary_id'] === $accessary->id)
                                    <option value="{{ $accessary->id }}" selected>{{ $accessary->name }}</option>
                                @else
                                    <option value="{{ $accessary->id }}">{{ $accessary->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                  </form>
            </div>
        </div>
    </div>    
</div>
@endsection