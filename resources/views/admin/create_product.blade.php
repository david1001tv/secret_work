@extends('layouts.app', ['isSearch' => false])
@section('title', 'New product')
@section('content')
    <div class="container left p-40">
        <div class="row justify-content-left">
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
                <form method="POST" class="p-b-20" action="{{ route('admin.products_create') }}"
                      enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputName">Name</label>
                            <input type="text" class="form-control" id="inputName" name="name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputCost">Cost</label>
                            <input type="number" class="form-control" id="inputCost" name="cost">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputImage">Image</label>
                        <input type="file" class="form-control-file" id="inputImage" name="image">
                    </div>

                    <div class="form-group">
                        <label for="inputDescription">Description</label>
                        <textarea class="form-control" id="inputDescription" name="description" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputCategory">Category</label>
                        <select id="inputCategory" class="form-control" name="category">
                            @foreach($categories as $category)
                                <option id="{{$category->id}}"
                                        value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-row">
                        @foreach($categories as $category)
                            @foreach($category['types'] as $categoryType)
                                <div class="form-group col-md-6 category-{{ $category->id }}">
                                    <label for="{{ $categoryType->name }}">{{ $categoryType->name }}:</label>
                                    <input id="{{ $categoryType->name }}"
                                           class="form-control category-{{ $category->id }}"
                                           type="text"
                                           name="characteristics[{{ $category->id }}][{{$categoryType->id}}][value]"
                                           required
                                    >
                                    <input id="{{ $categoryType->name }}"
                                           class="form-control category-{{ $category->id }}"
                                           type="text"
                                           name="characteristics[{{ $category->id }}][{{$categoryType->id}}][type]"
                                           value="{{ $categoryType->id }}" hidden
                                    >
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="{{ route('admin.products_list') }}" class="btn btn-secondary active" role="button"
                       aria-pressed="true">Cancel</a>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(() => {
            const children = document.getElementById('inputCategory').children;
            const selected = document.getElementById('inputCategory').value;

            for (let i = 0, child; child = children[i]; i++) {
                if (child.value !== selected) {
                    $(`.category-${child.value}`).hide();
                    $(`.category-${child.value}`).prop('required', false);
                }
            }

            document.getElementById('inputCategory').addEventListener("change", (e) => {
                const options = e.target.children;
                const selected = e.target.value;

                for (let i = 0, child; child = options[i]; i++) {
                    if (child.value !== selected) {
                        $(`.category-${child.value}`).hide();
                        $(`.category-${child.value}`).prop('required', false);
                    }
                }

                $(`.category-${selected}`).show();
                $(`.category-${selected}`).prop('required', true);
            });
        });
    </script>
@endsection
