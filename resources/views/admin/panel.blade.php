@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-sm-between">
            <div class="card" style="width: 18rem;">
                <div class="card-header">Orders</div>
                <div class="card-body">
                    <p class="card-text">Container for work with orders</p>
                    <p class="card-text">{{ $ordersCount }}</p>
                    <a href="{{ route('admin.orders_list') }}" class="btn btn-primary">Go to orders list</a>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <div class="card-header">Users</div>
                <div class="card-body">
                    <p class="card-text">Container for work with users</p>
                    <p class="card-text">{{ $usersCount }}</p>
                    <a href="{{ route('admin.users_list') }}" class="btn btn-primary">Go to users list</a>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <div class="card-header">Products</div>
                <div class="card-body">
                    <p class="card-text">Container for work with products</p>
                    <p class="card-text">{{ $productsCount }}</p>
                    <a href="{{ route('admin.products_list') }}" class="btn btn-primary">Go to products list</a>
                </div>
            </div>
        </div>
    </div>
@endsection
