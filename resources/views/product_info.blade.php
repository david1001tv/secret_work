@extends('layouts.app', ['isSearch' => true])

@section('title', $product->name)

@section('content')


<div class="container-no-flex">
    <div class="crumbs">
        <a href="/">Home</a>
        <p>/</p>
        <a href="#">{{ $product->name }}</a>
    </div>
    <div class="product">
     <div class="product-img">
         <img src="{{ asset('images/' . $product->image) }}" alt="large_default">
     </div>
     <div class="product-charst">
         <div class="name-product">
            {{ $product->name }}
         </div>
         <div class="price">
            ${{ $product->cost }}
         </div>
         <div class="desc">
           {{ $product->description }}
         </div>
         <form method="GET" action="{{ route('add_to_cart') }}">
             <div class="quantity">
                 <label for="">
                     <p>Quantity</p>
                     <input type="number" name="count" id="quantity" min="1" value="1" max="100">
                 </label>
                 <input type="number" hidden name="product_id" value="{{ $product->id }}">
                 <input type="number" hidden name="is_to_checkout" value="1">
                 <input type="submit" value="Buy" class="submit">
             </div>
         </form>
     </div>
    </div>
    <div class="product-description">
        <h2>Characteristics</h2>
        @foreach($product->characteristics as $characteristic)
            <div class="row">
                <p class="h2 col-2">
                    {{ $characteristic->type->name }}
                </p>
                <p class="col-3">
                    {{ $characteristic->value }}
                </p>
            </div>
        @endforeach
    </div>
</div>

@endsection
