@extends('layouts.template')

@section('title')
{{ $product['name'] }}
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
                    href="{{ route('cars') }}" class="text-dark">Sản phẩm</a>
                <i class="fas fa-angle-double-right"></i> <span class="introduce">Chi tiết sản
                    phẩm</span></small>
            <div class="row mt-4 mb-3">
                <div class="col-md-6 sp-large">
                    <a href=""><img src="{{ asset('storage/images/cars/'.$product['image_path']) }}" alt="{{ $product['id'] }}"
                            alt=""></a>
                </div>
                <div class="col-md-6 describe">
                    <h2 class="ng-binding">{{ $product['name'] }}</h2>
                    <span class="product-code ng-binding d-block mb-2"><b>Mã xe:</b> {{ $product['sku'] }} </span>
                    <span class="product-code ng-binding d-block mb-2"><b>Hãng xe:</b> <img src="{{ asset('storage/images/brands/'.$brand_img) }}" width="100px" height="70px"> </span>
                    <span class="product-code ng-binding d-block mb-2"><b>Phụ kiện đi kèm:</b> 
                        @if (is_array($accessaries))
                           @if (count($accessaries) > 0)
                               @php
                                   $data = [];
                               @endphp
                               @foreach($accessaries as $item)
                                    @php
                                        $data[] = $item->name;
                                    @endphp
                               @endforeach
                               <?= implode(",",$data); ?>
                           @else
                               chưa được cập nhật
                           @endif
                        @else
                            chưa được cập nhật
                        @endif
                    </span>
                    <div class="price">
                        <span class="price-new ng-binding">Giá bán ngoài thị trường: {{ number_format($product['price'],-3,',',',') }} VND</span>
                    </div>
                    <div class="price mt-2">
                        <span class="price-new ng-binding">Giá thuê: {{ number_format($product['hire_price'],-3,',',',') }} VND / ngày</span>
                    </div>
                    <form class="add-to-cart" action={{ route('car.register',['id' => $product['id']]) }} method="GET">

                        @csrf
                        <div class="btn-buy mt-4">
                            <button type="submit" class="btn btn-danger btn-add-to-cart">
                                <i class="fas fa-shopping-cart"></i>Thuê xe</button>
                        </div>
                    </form>

                </div>
            </div>
            <div class="menu-about">
                <div class="heading-lg mb-2">
                    <h1>CHI TIẾT SẢN PHẨM</h1>
                </div>
                <div class="content-describe mb-5 text-justify">
                    {!! $product['description'] !!}
                </div>

                <div class="heading-lg">
                    <h1>MỘT SỐ DÒNG XE HOT</h1>
                </div>
                <div class="row">
                @foreach ($randomProduct as $item)
                   
                        <div class="col-3 mt-3">
                            <div class="card">
                                <div class="card-image">
                                    <a href="{{ route('product.detail',['id' => $item['id']]) }}">
                                        <img src="{{ asset('storage/images/cars/'.$item['image_path']) }}" class="card-img-top" />
                                    </a>
                                </div>
                            </div>
                            <div class="box-product-block">
                                <div class="name text-center">
                                    <a href="{{ route('product.detail',['id' => $item['id']]) }}" class="text-dark  ">
                                        <b>{{ $item['name'] }}</b>
                                    </a>
                                </div>
                            </div>
                            <div class="price text-center">
                                <span class="price-new">{{ number_format($item['hire_price'],-3,',',',') }} VND / ngày</span>
                            </div>
                        </div>
                    
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection