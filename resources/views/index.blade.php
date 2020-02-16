@extends('layouts.app')

@section('title', 'Index')

@section('content')

<div class="container">
    <!-- <div class="slider">
        <img src="assets/img/1.jpg" alt="1" class="u-img">
        <img src="assets/img/lenovo-legion-y25f-10-01.jpg" alt="2" class="u-img">
    </div> -->
    <div class="wrapped-items">
        <div class="filter">
            <!-- categoty -->
            <div class="title">
                <p>Filter by</p>
            </div>
            <ul>
                @foreach($categories as $category)
                    <li>
                        <a href="{{ route('home') . '?category=' . $category->id }}">{{ $category->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="products">
            @if (count($products))
                @foreach($products as $product)
                    <div class="product-item">
                        <a href="{{ route('product.show', ['id' => $product->id]) }}">
                            <img src="{{ asset('images/' . $product->image) }}" alt="product-img" class="product-img">
                        </a>
                        <div class="footer-product">
                            <div class="wrapped-product">
                                <div class="title d-inline-block text-truncate" style="max-width: 200px;">
                                    {{ $product->description }}
                                </div>
                                <div class="price">
                                    ${{ $product->cost }}
                                </div>
                            </div>
                            <div class="buy-btn">
                                <img src="{{ asset('images/buy.png') }}" alt="buy" class="img-buy">
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div>
                    Empty
                </div>
            @endif
        </div>
    </div>
</div>

@endsection
