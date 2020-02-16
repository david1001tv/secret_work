@extends('layouts.app')

@section('title', $products->name)

@section('content')


<div class="container-no-flex">
    <div class="crumbs">
        <a href="/">Home</a>
        <p>/</p>
        <a href="#">{{ $products->name }}</a>
    </div>
    <div class="product"
     <div class="product-img">
         <img src="{{ $products->image }}" alt="large_default">
     </div>
     <div class="product-charst">
         <div class="name-product">
            {{ $products->name }}
         </div>
         <div class="price">
            {{ $products->cost }}
         </div>
         <div class="desc">
           {{ $products->description }}
         </div>
         <form action="">
             <div class="quantity">
                     <label for="">
                         <p>Quantity</p>
                         <input type="number" name="count-product" id="" min="1" value="1" max="100">
                     </label>
                     <input type="text" hidden value="1">
                     <input type="submit" value="Buy" class="submit">
             </div>
         </form>
     </div>
    </div>
    <div class="product-description">
        <h2>DESCRIPTION</h2>
        <p>
            {{ $products->description }}
        </p>
    </div>
</div>

@endsection
