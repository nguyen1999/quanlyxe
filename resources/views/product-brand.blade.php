@extends('layouts.template')

@section('title')
Hãng
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
            @if (count($products) > 0)
                <div class="row mb-4" id="product-container">
                    @foreach ($products as $product)
                        <div class="col-lg-3 mb-4">
                            <div class="product-item-box">
                                <div class="product-item">
                                    <div class="image">
                                        <a href="{{ route('product.detail',['id' => $product->id]) }}">
                                            <img src="{{ asset('storage/images/cars/'.$product->image_path) }}" alt="{{ $product->id }}" width="100%" height="100%" name="product-image" class="product-image" />
                                        </a>
                                        <a href="{{ route('product.detail',['id' => $product->id]) }}" class="more-info"><i class="fas fa-search"></i> XEM THÊM</a>
                                    </div>
                                    <a href="{{ route('product.detail',['id' => $product->id]) }}" class="product-name mt-4">{{ $product->name }}</a>
                                    <div class="price-new" name="price-new">{{ number_format($product->hire_price,-3,',',',') }} VND / ngày</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div>Hãng này hiện tại chưa có hàng, xin vui lòng quay lại sau.</div>
            @endif
        </div>
    </div>
</div>
@endsection