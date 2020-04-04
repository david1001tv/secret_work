@extends('layouts.app', ['isSearch' => false])
@section('title', $user->name)
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
                <form method="POST" action="{{ route('admin.users_update', ['id' => $user->id]) }}">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputName">Name</label>
                            <input type="text" class="form-control" id="inputName" name="name"
                                   value="{{ $user->name }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPhone">Phone</label>
                            <input type="text" class="form-control" id="inputPhone" name="phone"
                                   value="{{ $user->phone }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <input type="text" class="form-control" id="inputAddress" name="address"
                               value="{{ $user->address }}">
                    </div>

                    <div class="form-group">
                        <label for="inputRole">Role</label>
                        <select id="inputRole" class="form-control" name="role">
                            @foreach($roles as $role)
                                @if ($role->id === $user->role_id)
                                    <option id="{{$role->id}}" value="{{ $role->id }}"
                                            selected>{{ $role->name }}</option>
                                @else
                                    <option id="{{$role->id}}" value="{{ $role->id }}">{{ $role->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="{{ route('admin.users_list') }}" class="btn btn-secondary active" role="button"
                       aria-pressed="true">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
