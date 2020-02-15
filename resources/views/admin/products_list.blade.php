@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($products as $product)
                    <div>
                        <a href="{{ route('admin.update_products_form', ['id' => $product->id]) }}">{{ $product->name }}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
