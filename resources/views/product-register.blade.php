@extends('layouts.template')

@section('title')
Thuê {{ $product['name'] }}
@endsection
@section('content')
<div class="container mt-4 mb-4">
    <div class="row">
        <div class="col-lg-3">
            <div class="menu-about">
                <div class="heading-lg">
                    <h1>CHÍNH SÁCH GIAO HÀNG</h1>
                </div>
                <ul class="list-group mb-5">
                    <li class="list-group-item">Giao hàng TOÀN QUỐC</li>
                    <li class="list-group-item">Thanh toán khi nhận hàng</li>
                    <li class="list-group-item">Đổi trả trong
                        <span class="color-pink">15 ngày</span></li>
                    <li class="list-group-item">Hoàn ngay tiền mặt</li>
                    <li class="list-group-item">Chất lượng đảm bảo</li>
                </ul>
                <div class="heading-lg">
                    <h1>HƯỚNG DẪN THUÊ XE</h1>
                </div>
                <ul class="list-group mb-5">
                    <li class="list-group-item">Gọi điện thoại
                        <b class="color-pink">089 810 3236</b> để thuê xe</li>
                    <li class="list-group-item">Mua tại cửa hàng Cars Store:
                        <b class="color-pink">Hà Nội</b></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-9">
            <small><a href="{{ route('index') }}" class="text-dark">Trang chủ</a> <i class="fas fa-angle-double-right"></i> <a
                    href="{{ route('cars') }}" class="text-dark">Xe</a>
                <i class="fas fa-angle-double-right"></i> <a
                href="{{ route('product.detail',['id'=>$product['id']]) }}" class="text-dark">Chi tiết xe</a>
                    </span>
                <i class="fas fa-angle-double-right"></i> <span class="introduce">Thuê xe</span></small>
            <h4 class="mt-4">Đăng ký thuê xe</h4>
            <form action="{{ route('hire.car') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Họ tên:</label>
                    <input type="text" class="form-control" placeholder="Nhập họ tên" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại:</label>
                    <input type="tel" class="form-control" placeholder="Nhập số điện thoại" id="phone" name="phone" pattern="[0-9]{10}" required>
                </div>
                <div class="form-group">
                    <label for="email">Địa chỉ email:</label>
                    <input type="email" class="form-control" placeholder="Nhập email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="identity">Số chứng minh nhân dân:</label>
                    <input type="text" class="form-control" placeholder="Nhập số chứng minh nhân dân" id="identity" name="identity" required>
                </div>
                <div class="form-group">
                    <label for="sex">Giới tính:</label>
                    <select name="sex" id="sex" class="form-control" required>
                        <option value="male">Nam</option>
                        <option value="female">Nữ</option>
                        <option value="other">Khác</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="address">Địa chỉ:</label>
                    <input type="text" class="form-control" placeholder="Nhập địa chỉ" id="address" name="address" required>
                </div>
                <div class="form-group">
                    <label for="car">Xe:</label>
                    <input type="text" class="form-control" id="car" name="car" value="<?= $product['name'] ?>" readonly>
                </div>
                <input type="hidden" value="<?= $product['id'] ?>" name="car_id" />
                <div class="form-group">
                    <label for="start_date_at">Ngày bắt đầu thuê:</label>
                    <input type="date" class="form-control" id="start_date_at" name="start_date_at" required>
                    <div style="color:red" id="error-date-text"></div>
                </div>
                <div class="form-group">
                    <label for="start_time_at">Thời gian bắt đầu:</label>
                    <input type="time" class="form-control" id="start_time_at" name="start_time_at" required>
                    <div style="color:red" id="error-time-text"></div>
                </div>
                <button type="submit" class="btn btn-danger btn-add-to-cart" onclick="return validateForm();">Thuê xe</button>
            </form>
        </div>
    </div>
</div>
@endsection