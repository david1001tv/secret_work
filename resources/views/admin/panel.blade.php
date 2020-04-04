@extends('layouts.app', ['isSearch' => false])
@section('title', 'Admin panel')
@section('content')
    <div class="container center p-40 justify-content-around">
        <div class="row">
            <div class="col-12 col-md-4 p-b-20">
                <div class="card">
                    <div class="card-header">Orders</div>
                    <div class="card-body text-center">
                        <p class="card-text">Container for work with orders</p>
                        <p class="card-text" style="padding: 10px 0">{{ $ordersCount }}</p>
                        <a href="{{ route('admin.orders_list') }}" class="btn btn-primary">Go to orders list</a>
                    </div>
                </div>
            </div>
            @if (Auth::user()->role->name === 'admin')
                <div class="col-12 col-md-4 p-b-20">
                    <div class="card">
                        <div class="card-header">Users</div>
                        <div class="card-body text-center">
                            <p class="card-text">Container for work with users</p>
                            <p class="card-text" style="padding: 10px 0">{{ $usersCount }}</p>
                            <a href="{{ route('admin.users_list') }}" class="btn btn-primary">Go to users list</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 p-b-20">
                    <div class="card">
                        <div class="card-header">Products</div>
                        <div class="card-body text-center">
                            <p class="card-text">Container for work with products</p>
                            <p class="card-text" style="padding: 10px 0">{{ $productsCount }}</p>
                            <a href="{{ route('admin.products_list') }}" class="btn btn-primary">Go to products list</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
