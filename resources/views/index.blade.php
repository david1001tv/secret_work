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
                <li>
                    <a href="#">Category name</a>
                </li>
                <li>
                    <a href="#">Category name</a>
                </li>
                <li>
                    <a href="#">Category name</a>
                </li>
            </ul>
        </div>
        <div class="products">
            <div class="product-item">
                <a href="">
                    <img src="{{ asset('images/default.png') }}" alt="product-img" class="product-img">
                </a>
               <div class="footer-product">
                    <div class="wrapped-product">
                        <div class="title">
                            Lorem ipsum dolor sit amet
                        </div>
                        <div class="price">
                            $12.90
                        </div>
                    </div>
                    <div class="buy-btn">
                        <img src="{{ asset('images/buy.png') }}" alt="buy" class="img-buy">
                    </div>
               </div>
            </div>

            <div class="product-item">
                <a href="">
                    <img src="{{ asset('images/default.png') }}" alt="product-img" class="product-img">
                </a>
               <div class="footer-product">
                    <div class="wrapped-product">
                        <div class="title">
                            Lorem ipsum dolor sit amet
                        </div>
                        <div class="price">
                            $12.90
                        </div>
                    </div>
                    <div class="buy-btn">
                        <img src="{{ asset('images/buy.png') }}" alt="buy" class="img-buy">
                    </div>
               </div>
            </div>

            <div class="product-item">
                <a href="">
                    <img src="{{ asset('images/default.png') }}" alt="product-img" class="product-img">
                </a>
               <div class="footer-product">
                    <div class="wrapped-product">
                        <div class="title">
                            Lorem ipsum dolor sit amet
                        </div>
                        <div class="price">
                            $12.90
                        </div>
                    </div>
                    <div class="buy-btn">
                        <img src="{{ asset('images/buy.png') }}" alt="buy" class="img-buy">
                    </div>
               </div>
            </div>
        </div>
    </div>
</div>

@endsection
