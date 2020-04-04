@extends('layouts.app', ['isSearch' => true])

@section('title', 'PCShop')

@section('content')

    <div class="container">
        <div class="dropdown p-40 p-b-20">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Categories
            </button>
            <span>Current category: {{ app('request')->input('category') ? \App\Models\ProductCategory::find(app('request')->input('category'))->name : "All" }}</span>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="{{ route('home') }}">All</a>
                @foreach($categories as $category)
                    <a class="dropdown-item"
                       href="{{ route('home') . '?category=' . $category->id }}">{{ $category->name }}</a>
                @endforeach
            </div>
        </div>
        @if (count($products))
            <div class="row justify-content-center">
                @foreach($products as $product)
                    <div class="col-12 col-md-4 p-b-20">
                        <div class="card" style="width: 18rem;">
                            <a href="{{ route('product.show', ['id' => $product->id]) }}">
                                <img src="{{ asset('images/' . $product->image) }}" alt="product-img"
                                     class="card-img-top img-thumbnail" style="height: 200px;">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text p-b-20">${{ $product->cost }}</p>
                                <a class="add-to-cart btn btn-primary" href="#" data-product-id="{{ $product->id }}">
                                    Add to cart <img src="{{ asset('images/buy.png') }}" alt="buy" class="img-buy">
                                </a>
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

    <script>
        $(document).ready(() => {
            $('.add-to-cart').click((e) => {
                e.preventDefault();
                const productId = e.currentTarget.dataset.productId;

                $.get(`/add-to-cart?product_id=${productId}`, function (data, status) {
                    if (status === 'success') {
                        $('#cartCount').text(data.length);
                    }
                });
            });
        });
    </script>

@endsection
