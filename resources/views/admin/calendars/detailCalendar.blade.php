@extends('admin.layouts.index')

@section('title','Chi tiết lịch thuê xe')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Lịch thuê xe
                    <small>Chi tiết</small>
                </h1>
            </div>
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6">
                        <h3>Thông tin người thuê</h3>
                        <p>Tên: {{ $calendar->name }}</p>
                        <p>Giới tính: {{ $calendar->sex }}</p>
                        <p>Số điện thoại: {{ $calendar->phone }}</p>
                        <p>Email: {{ $calendar->email }}</p>
                        <p>Chứng minh thư: {{ $calendar->identity_card_number }}</p>
                        <p>Địa chỉ: {{ $calendar->address }}</p>
                        <p>Ngày bắt đầu thuê: {{ $calendar->start_date_at }}</p>
                        <p>Thời gian bắt đầu thuê: {{ $calendar->start_time_at }}</p>
                    </div>
                    <div class="col-lg-6">
                        <h3>Thông tin xe</h3>
                        <p>Tên xe: {{ $calendar->car_name }}</p>
                        <p>Hãng xe: {{ $calendar->brand_name  }}</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection