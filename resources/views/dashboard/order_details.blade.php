@extends('layouts.app', ['isSearch' => false])
@section('title', 'Order #' . $order->id)
@section('content')
    <div class="container left p-40">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">Product Name</th>
                <th scope="col">Cost, $</th>
            </tr>
            </thead>
            <tbody>
            @foreach($order->carts as $cart)
                <tr>
                    <td><a href="{{ route('product.show', ['id' => $cart->product->id]) }}">{{ $cart->product->name }}</a></td>
                    <td>{{ $cart->product->cost }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{ route('dashboard-me') }}" class="btn btn-secondary active" role="button"
           aria-pressed="true">Back</a>
    </div>
@endsection
