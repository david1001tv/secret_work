@extends('layouts.app', ['isSearch' => false])
@section('title', 'Update order #' . $order->id)
@section('content')
    <div class="container left p-40">

        @if (count($errors) > 0)
            <div class="col-md-8">
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        <div class="col-md-8">
            <form method="POST" action="{{ route('admin.orders_update', ['id' => $order->id]) }}">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputName">Cost</label>
                        <p class="h3">${{ $order->cost }}</p>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPhone">User</label>
                        <p class="h2">{{ $order->user->name }}</p>
                        <p class="h2">{{ $order->user->phone }}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputStatus">Status</label>
                    <select id="inputStatus" class="form-control" name="status">
                        @foreach($statuses as $status)
                            @if ($status->id === $order->status_id)
                                <option id="{{$status->id}}" value="{{ $status->id }}"
                                        selected>{{ $status->name }}</option>
                            @else
                                <option id="{{$status->id}}" value="{{ $status->id }}">{{ $status->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <input type="submit" class="btn btn-primary" value="Submit">
                <a href="{{ route('admin.orders_list') }}" class="btn btn-secondary active" role="button"
                   aria-pressed="true">Cancel</a>
            </form>
        </div>
    </div>
@endsection
