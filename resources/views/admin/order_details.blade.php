@extends('layouts.app', ['isSearch' => false])
@section('title', 'Order #' . $order->id)
@section('content')
    <div class="container left p-40">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">Product Name</th>
                <th scope="col">Cost, $</th>
                <th scope="col">Count</th>
            </tr>
            </thead>
            <tbody>
            @foreach($order->carts as $cart)
                <tr>
                    <td>
                        @if(isset($cart->product))
                            <a href="{{ route('admin.update_products_form', ['id' => $cart->product->id]) }}">{{ $cart->product->name ?? 'Deleted' }}</a>
                        @else
                            <span>Deleted</span>
                        @endif
                    </td>
                    <td>{{ $cart->product->cost ?? 'Deleted' }}</td>
                    <td>{{ $cart->count }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <p class="h3">Total price: {{ $order->cost }}</p>
        <span class="h5">Delivery</span>: <span>{{ $order->deliveryType->name }}, {{ $order->delivery_address }}</span><br/>
        <a href="{{ route('admin.orders_list') }}" class="btn btn-secondary active" role="button"
           aria-pressed="true">Back</a>
    </div>
@endsection
