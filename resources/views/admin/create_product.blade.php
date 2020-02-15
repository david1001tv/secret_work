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
                    <input type="text" id="name" name="name" required><br>

                    <label for="cost">Cost:</label><br>
                    <input type="number" id="cost" name="cost" required><br>

                    <label for="description">Description:</label><br>
                    <input type="text" id="description" name="description" required><br>

                    <label for="iamge">Image:</label><br>
                    <input type="file" id="image" name="image"><br>

                    <label for="category">Category:</label><br>
                    <select id="category" name="category">
                        @foreach($categories as $category)
                            <option id="{{$category->id}}" value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <br>

                    @foreach($categories as $category)
                        @foreach($category['types'] as $categoryType)
                            <label for="{{ $categoryType->name }}" class="category-{{ $category->id }}">{{ $categoryType->name }}:</label><br class="category-{{ $category->id }}">
                            <input id="{{ $categoryType->name }}"
                                   class="category-{{ $category->id }}"
                                   type="text"
                                   name="characteristics[{{ $category->id }}][]"
                                   required
                            >
                            <br class="category-{{ $category->id }}">
                        @endforeach
                    @endforeach

                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(() => {
            const children = document.getElementById('category').children;
            const selected = document.getElementById('category').value;

            for (let i=0, child; child = children[i]; i++) {
                if (child.value !== selected) {
                    $(`.category-${child.value}`).hide();
                    $(`.category-${child.value}`).prop('required', false);
                }
            }

            document.getElementById('category').addEventListener("change", (e) => {
                const options = e.target.children;
                const selected = e.target.value;

                for (let i=0, child; child = options[i]; i++) {
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
