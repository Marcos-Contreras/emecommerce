@extends('layouts.front')

@section ('title')
    Checkout
@endsection

@section ('content')

    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">
                    Home
                </a> /
                <a href="{{ url('checkout') }}">
                    Checkout
                </a>
            </h6>
        </div>
    </div>

    <div class="container mt-5">
        <form action="{{url('place-order')}}" method="POST">
            {{csrf_field() }}
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h6>Basic Details</h6>
                        <hr>
                        <div class="row checkout form">
                            <div class="col-md-6">
                                <label for="">First Name</label>
                                <input type="text" required class="form-control firstname" value="{{Auth::user()->name}}" name="fname" placeholder="Enter First Name">
                                <span id="fname_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="">Last Name</label>
                                <input type="text" required class="form-control lastname" value="{{Auth::user()->lname}}" name="lname" placeholder="Enter Last Name">
                                <span id="lname_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Email</label>
                                <input type="text" required class="form-control email" value="{{Auth::user()->email}}" name="email" placeholder="Enter Email">
                                <span id="email_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Phone Number</label>
                                <input type="text" required class="form-control phone" value="{{Auth::user()->phone}}" name="phone" placeholder="Enter Phone Number">
                                <span id="phone_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Address 1</label>
                                <input type="text" required class="form-control address1" value="{{Auth::user()->address1}}" name="address1" placeholder="Enter Adress 1">
                                <span id="address1_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Address 2</label>
                                <input type="text" required class="form-control address2" value="{{Auth::user()->address2}}" name="address2" placeholder="Enter Adress 2">
                                <span id="address2_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">City</label>
                                <input type="text" required class="form-control city" value="{{Auth::user()->city}}" name="city" placeholder="Enter City">
                                <span id="city_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">State</label>
                                <input type="text" required class="form-control state" value="{{Auth::user()->state}}" name="state" placeholder="Enter State">
                                <span id="state_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Country</label>
                                <input type="text" required class="form-control country" value="{{Auth::user()->country}}" name="country" placeholder="Enter Country">
                                <span id="country_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Pin Code</label>
                                <input type="text" required class="form-control pincode" value="{{Auth::user()->pincode}}" name="pincode" placeholder="Enter Pin Code">
                                <span id="pincode_error" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md 5">
                <div class="card">
                    <div class="card-body">
                        <h6>Order Details</h6>
                        <hr>
                        @if($cartitems->count() > 0)
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $total = 0; @endphp
                                    @foreach ($cartitems as $item)
                                    <tr>
                                        @php $total += ($item->products->selling_price * $item->prod_qty) @endphp
                                        <td>{{ $item->products->name }}</td>
                                        <td>{{ $item->prod_qty }}</td>
                                        <td>{{ $item->products->selling_price }}</td>
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <h6 class="px-2">Grand Total <span class="float-end">$ {{ $total }} </span></h6>
                            <hr>
                            <input type="hidden" name="payment_mode" value="COD">
                            <!-- <button type="submit" class="btn btn-success w-100">Place Order | COD</button>
                            <button type="button" class="btn btn-primary w-100 mt-3 razorpay_btn">Pay with Razorpay</button> -->
                            <div id="paypal-button-container" class="mt-3"></div>

                        @else
                            <h4 class="text-center">No products in cart</h4>
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script
        src="https://www.paypal.com/sdk/js?client-id=AWJ3ZjWd_LvcAq774tQwN-eLFlA4PTs0J4BNGbX68-sdfYelJhbcVUjzLNih2aZ2Rm_j5JR-kdrrMvM7"></script>

    <script>
        paypal.Buttons({
            createOrder: function(data, actions) {
            // This function sets up the details of the transaction, including the amount and line item details.
            return actions.order.create({
                purchase_units: [{
                amount: {
                    value: '{{ $total }}'
                }
                }]
            });
            },
            onApprove: function(data, actions) {
            // This function captures the funds from the transaction.
            return actions.order.capture().then(function(details) {
                // This function shows a transaction success message to your buyer.
                //alert('Transaction completed by ' + details.payer.name.given_name);
                
                var fname = $('.fname').val();
                var lname = $('.lname').val();
                var email = $('.email').val();
                var phone = $('.phone').val();
                var address1 = $('.address1').val();
                var address2 = $('.address2').val();
                var city = $('.city').val();
                var state = $('.state').val();
                var country = $('.country').val();
                var pincode = $('.pincode').val();

                $.ajax({
                    method:"POST",
                    url:"place-order",
                    data: {
                        'fname':fname,
                        'lname':lname,
                        'email':email,
                        'phone':phone,
                        'address1':address1,
                        'address2':address2,
                        'city':city,
                        'state':state,
                        'country':country,
                        'pincode':pincode,
                        'payment_mode':"Paid by PayPal",
                        'payment_id':details.id,
                    },
                    success:function(response){
                        swal(response.status);
                        window.location.href ="my-orders";
                    }
                });
            });
            }
        }).render('#paypal-button-container');
        //This function displays Smart Payment Buttons on your web page.
    </script>
        @endsection