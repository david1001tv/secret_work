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
                        <tr class="productRow">
                            <th scope="row">
                                {{ $product['product']->id }}
                                <input type="number" value="{{ $product['product']->id }}" hidden name="products[{{$key}}][id]">
                            </th>
                            <td>{{ $product['product']->name }}</td>
                            <td>${{ $product['product']->cost }}</td>
                            <td>
                                <input class="productCount" type="number" min="1" data-cost="{{ $product['product']->cost }}" value="{{ $product['count'] }}" name="products[{{$key}}][count]">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <label for="deliveryType">Delivery type</label><br/>
            <select style="margin-bottom: 20px; width: 360px" id="deliveryType" name="delivery_type" required>
                @foreach($deliveryTypes as $deliveryType)
                    <option value="{{ $deliveryType->id }}">{{ $deliveryType->name }}</option>
                @endforeach
            </select>
            <br/>
            <p class="h4">
                Total cost: <span id="totalCost"></span>
            </p>
            <br/>
            <label for="deliveryAddress">Delivery type</label><br/>
            <input id="deliveryAddress" style="margin-bottom: 20px; width: 360px" type="text" value="{{ $user->address }}" name="delivery_address" required><br/>

            <div class="form-group owner" style="width: 360px">
                <label for="owner">Owner</label>
                <input type="text" class="form-control" id="owner" required>
            </div>
            <div class="form-group CVV" style="width: 360px">
                <label for="cvv">CVV</label>
                <input type="password" class="form-control" id="cvv" required>
            </div>
            <div class="form-group" id="card-number-field" style="width: 360px">
                <label for="cardNumber">Card Number</label>
                <input type="text" class="form-control" id="cardNumber" required>
            </div>
            <div class="form-group" id="expiration-date">
                <label>Expiration Date</label>
                <select required>
                    <option value="01">January</option>
                    <option value="02">February </option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
                <select required>
                    <option value="16"> 2016</option>
                    <option value="17"> 2017</option>
                    <option value="18"> 2018</option>
                    <option value="19"> 2019</option>
                    <option value="20"> 2020</option>
                    <option value="21"> 2021</option>
                </select>
            </div>
            <div class="form-group" id="credit_cards">
                <img src="{{ asset('images/visa.jpg')  }}" id="visa">
                <img src="{{ asset('images/mastercard.jpg') }}" id="mastercard">
                <img src="{{ asset('images/amex.jpg') }}" id="amex">
            </div>

            <input type="submit" class="btn btn-primary" value="Make order">
            <a class="btn btn-secondary" href="{{ route('clear_cart') }}">Clear cart</a>
        </form>
    </div>

    <script>
        function updateTotalCost() {
            const products = $('.productCount');
            const totalCost = $('#totalCost');
            let cost = 0;

            for (let key in products) {
                if (typeof products[key] === 'object' && products[key].value) {
                    cost += products[key].value * products[key].dataset.cost;
                }
            }
            totalCost.html(`$ ${cost}`);
        }

        $(document).ready(() => {
            updateTotalCost();
            $('.productCount').change(() => {
                updateTotalCost();
            });
        });
    </script>
@endsection
