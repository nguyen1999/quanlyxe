@extends('admin.layouts.index')

@section('title','Danh sách xe')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Xe
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
                    <tr align="center">
                        <th>Số thứ tự</th>
                        <th>Mã sản phẩm</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá tiền</th>
                        <th>Giá thuê</th>
                        <th>Mô tả</th>
                        <th>Hãng</th>
                        <th>Trạng thái</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cars as $car)
                        <tr>
                            <td>{{ $car->id }}</td>
                            <td>{{ $car->sku }}</td>
                            <td><img src="{{ asset('storage/images/cars/'.$car->image_path) }}" width=60px ></td>
                            <td>{{ $car->name }}</td>
                            <td>{{ $car->price }}đ</td>
                            <td>{{ $car->hire_price }}đ/ngày</td>
                            <td>{!! $car->description !!}</td>
                            <td>{{ $car->brand_name }}</td>
                            <td> 
                                @if ($car->status === 1)
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                @else
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                @endif
                            </td>
                            <td>
                                <a data-href="{{ route('car.delete',['id'=>$car->id]) }}" data-target="#confirm-delete" data-toggle="modal"><i class="fa fa-times" aria-hidden="true"></i></a>
                                <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                Bạn có chắc chắn sẽ muốn xe này ?
                                            </div>
                                            <div class="modal-footer">
                                                <a class="btn btn-danger btn-ok">Xóa</a>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('car.edit.form',['id'=>$car->id]) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
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