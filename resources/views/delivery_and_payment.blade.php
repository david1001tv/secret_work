@extends('layouts.app', ['isSearch' => false])

@section('title', 'PCShop - About Us')

@section('content')

    <div class="container p-40">
        <p class="h1 p-40">Delivery</p>

        @foreach($deliveryTypes as $deliveryType)
            <p class="h3 p-40">{{ $deliveryType->name }}</p>
            <p class="text-justify">{{ $deliveryType->description }}</p>
        @endforeach

        <p class="h3 p-40">Payments</p>
        <p class="text-justify">
            Our store accepts payments by card or cash. You can pay immediately upon purchase the full cost of the card (accepted Visa, Mastercard, Amex).
        </p>
        <p class="text-justify">
            You can also come to our department upon receipt and pay in cash or by card already there.
            Similarly, everything relates to receipt through the delivery service.
        </p>
    </div>

@endsection
