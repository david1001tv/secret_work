@extends('layouts.app', ['isSearch' => false])
@section('title', 'Products')
@section('content')

    <div class="container end p-40">
        <a href="{{ route('admin.create_products_form') }}" class="btn btn-primary btn-lg active" role="button"
           aria-pressed="true">Create product</a>

    </div>
    <div class="container left p-40">

        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Cost, $</th>
                <th scope="col">Category</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->cost }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td><a href="{{ route('admin.update_products_form', ['id' => $product->id]) }}">Edit</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
