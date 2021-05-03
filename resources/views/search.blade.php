@extends('layouts.template')

@section('title','Tìm kiếm')

@section('content')
<div class="container mt-3 mb-3">
    <div class="row mb-4">
        <div class="col-lg-3 col-md-12">
            <div class="menu-news">
                <h5 class="new-title">Tìm kiếm với từ khóa '{{ $q }}'</h5>
            </div>
        </div>
        <div class="col-lg-9 col-md-12">
            <div class="row ml-4">
                @if ($q != '')
                    @foreach ($products as $product)
                        <div class="col-lg-3 mb-4">
                            <form action="" method="POST">
                                @csrf
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
                            </form>
                        </div>
                    @endforeach
                    {{ $products->links() }}
                @else
                    Không có xe nào phù hợp với từ khóa.
                @endif
            </div>
        </div>
    </div>
</div>
@endsection