@extends('layouts.app', ['isSearch' => true])

@section('title', 'Checkout')

@section('content')


    <div class="container-no-flex">
        <form method="POST" action="{{ route('make_order') }}">
            <table class="table" style="max-width: 360px;">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Cost</th>
                    <th scope="col">Count</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($products as $key => $product)
                        <tr>
                            <th scope="row">
                                {{ $product['product']->id }}
                                <input type="number" value="{{ $product['product']->id }}" hidden name="products[{{$key}}][id]">
                            </th>
                            <td>{{ $product['product']->name }}</td>
                            <td>${{ $product['product']->cost }}</td>
                            <td>
                                <input type="number" min="1" value="{{ $product['count'] }}" name="products[{{$key}}][count]">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <input type="submit" class="btn btn-primary" value="Make order">
        </form>
    </div>

@endsection
