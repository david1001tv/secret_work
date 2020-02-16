@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            </div>
            <div class="col-md-8">
                <form method="POST" action="{{ route('admin.products_create') }}" enctype="multipart/form-data">
                    <label for="name">Name:</label><br>
                    <input type="text" id="name" name="name" value="{{ $product->name }}" required><br>

                    <label for="cost">Cost:</label><br>
                    <input type="number" id="cost" name="cost" value="{{ $product->cost }}" required><br>

                    <label for="description">Description:</label><br>
                    <input type="text" id="description" name="description" value="{{ $product->description }}" required><br>

                    <label for="iamge">Image:</label><br>
                    <image src="images/{{ $product->image }}"/><br>

                    <label for="category">Category:</label><br>
                    <p>{{ $product->category->name }}</p>

                    @foreach($product->characteristics as $characteristic)
                        <label for="{{ $characteristic->type->name }}">{{ $characteristic->type->name }}:</label><br>
                        <input id="{{ $category->type->name }}"
                                class="category-{{ $category->type->id }}"
                                type="text"
                                name="characteristics[{{ $category->id }}][]"
                                required
                        >
                        <br>
                    @endforeach

                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
@endsection
