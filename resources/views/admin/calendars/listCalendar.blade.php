@extends('admin.layouts.index')

@section('title','Danh sách lịch thuê xe')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Lịch thuê xe
                    <small>Danh sách</small>
                </h1>
                @if(Session::has('invalid'))
                    <div class="alert alert-danger alert-dismissible">
                         <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                         {{Session::get('invalid')}}
                    </div>
               @endif
               @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible">
                         <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                         {{Session::get('success')}}
                    </div>
               @endif
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>Số thứ tự</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Giới tính</th>
                        <th>Địa chỉ</th>
                        <th>Số chứng minh nhân dân</th>
                        <th>Xe</th>
                        <th>Trạng thái</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody align="center">
                    @foreach ($calendars as $calendar)
                        <tr>
                            <td>{{ $calendar->id }}</td>
                            <td>{{ $calendar->name }}</td>
                            <td>{{ $calendar->email }}</td>
                            <td>{{ $calendar->phone }}</td>
                            <td>{{ $calendar->sex }}</td>
                            <td>{{ $calendar->address }}</td>
                            <td>{{ $calendar->identity_card_number }}</td>
                            <td>{{ $calendar->car_name }}</td>
                            <td>{{ ($calendar->status === 1)?"Đang thuê":"Đã trả" }}</td>
                            <td>
                                <a href="{{ route('calendar.delete',['id'=>$calendar->id]) }}"><i class="fa fa-times" aria-hidden="true"></i></a>
                                <a href="{{ route('calendar.show',['id'=>$calendar->id]) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection