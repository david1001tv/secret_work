@extends('layouts.app', ['isSearch' => false])
@section('title', 'Orders')
@section('content')
    <div class="container center p-40">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Cost, $</th>
                    <th scope="col">User</th>
                    <th scope="col">User Email</th>
                    <th scope="col">User Phone</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <th scope="row">{{ $order->id }}</th>
                        <td>{{ $order->cost }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->user->email }}</td>
                        <td>{{ $order->user->phone }}</td>
                        <td><a href="{{ route('admin.update_orders_form', ['id' => $order->id]) }}">Edit</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    </div>
@endsection
