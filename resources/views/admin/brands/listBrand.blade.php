@extends('admin.layouts.index')

@section('title','Danh sách brand')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Hãng xe
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
                        <th>Ảnh</th>
                        <th>Tên hãng xe</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody align="center">
                    @foreach ($brands as $brand)
                        <tr>
                            <td>{{ $brand['id'] }}</td>
                            <td><img src="{{ asset('storage/images/brands/'.$brand['img_path']) }}" width=60px ></td>
                            <td>{{ $brand['name'] }}</td>
                            <td>
                                <a data-href="{{ route('brand.delete',['id'=>$brand['id']]) }}" data-target="#confirm-delete" data-toggle="modal"><i class="fa fa-times" aria-hidden="true"></i></a>
                                <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                Bạn có chắc chắn sẽ muốn xóa hãng xe này ?
                                            </div>
                                            <div class="modal-footer">
                                                <a class="btn btn-danger btn-ok">Xóa</a>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('brand.edit.form',['id'=>$brand['id']]) }}" style="margin:0 1rem;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
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