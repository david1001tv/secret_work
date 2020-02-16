@extends('layouts.app', ['isSearch' => false])
@section('title', $user->name)
@section('content')

<div class="container-no-flex p-40">

    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="pills-account-tab" data-toggle="pill" href="#pills-account" role="tab" aria-controls="pills-account" aria-selected="true">Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-my-orders-tab" data-toggle="pill" href="#pills-my-orders" role="tab" aria-controls="pills-my-orders" aria-selected="false">My-orders</a>
        </li>
      </ul>
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-account" role="tabpanel" aria-labelledby="pills-account-tab">
            <form class="form-user" method="POST" action="{{ route('dashboard-update-me') }}">
                @csrf
                <div class="form-group">
                    <label for="Name">Name</label>
                    <input value="{{ $user->name }}" name="name" type="text" class="form-control" id="Name" aria-describedby="emailHelp" placeholder="Name">
                  </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input value="{{ $user->email }}" name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input value="{{ $user->phone }}" name="phone" type="phone" class="form-control" id="phone" placeholder="phone">
                  </div>
                  <div class="form-group">
                    <label for="address">Address</label>
                    <input readonly value="{{ $user->address }}" type="email" class="form-control" id="address" aria-describedby="emailHelp" placeholder="Enter email">
                  </div>
                <button type="submit" class="btn btn-primary">Update</button>
              </form>
        </div>
        <div class="tab-pane fade" id="pills-my-orders" role="tabpanel" aria-labelledby="pills-my-orders-tab">
            my-orders
        </div>
      </div>
</div>

@endsection
