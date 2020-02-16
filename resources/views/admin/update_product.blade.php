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
                <form method="POST" action="{{ route('admin.products_update', ['id' => $product->id]) }}" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputName">Name</label>
                            <input type="text" class="form-control" id="inputName" name="name"
                                   value="{{ $product->name }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputCost">Cost</label>
                            <input type="number" class="form-control" id="inputCost" name="cost"
                                   value="{{ $product->cost }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="currentImage">Current image</label><br>
                        <img id="currentImage" src="{{ asset('/images/' . $product->image) }}"
                             style="height: 200px;">
                    </div>
                    <div class="form-group">
                        <label for="inputImage">New Image</label>
                        <input type="file" class="form-control-file" id="inputImage" name="image">
                    </div>

                    <div class="form-group">
                        <label for="inputDescription">Description</label>
                        <textarea class="form-control" id="inputDescription" name="description"
                                  rows="5">{{ $product->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputCategory">Category</label>
                        <p class="h3">{{ $product->category->name }}</p>
                    </div>
                    <div class="form-row">
                        @foreach($product->characteristics as $characteristic)
                            <div class="form-group col-md-6">
                                <label for="{{ $characteristic->type->name }}">{{ $characteristic->type->name }}:</label>
                                <input id="{{ $characteristic->type->name }}" class="form-control"
                                       type="text" name="characteristics[]" value="{{ $characteristic->value }}" required
                                >
                            </div>
                        @endforeach
                    </div>
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="{{ route('admin.products_list') }}" class="btn btn-secondary active" role="button"
                       aria-pressed="true">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
