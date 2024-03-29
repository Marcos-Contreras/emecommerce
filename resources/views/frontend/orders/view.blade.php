@extends('layouts.front')

@section ('title')
    My orders
@endsection

@section ('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white">Order View
                            <a href="{{ url('my-orders') }}" class="btn btn-warning float-end">Back</a>
                        </h4>
                        <hr>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 order-details">
                                <h4>Shipping Details</h4>
                                <label for="">First name</label>
                                <div class="border ">{{ $orders->fname }}</div>

                                <label for="">Last name</label>
                                <div class="border ">{{ $orders->lname }}</div>

                                <label for="">Email</label>
                                <div class="border ">{{ $orders->email }}</div>

                                <label for="">Contact No.</label>
                                <div class="border ">{{ $orders->phone}}</div>

                                <label for="">Shipping Address</label>
                                <div class="border ">
                                {{$orders->address1}},
                                {{$orders->address2}},
                                {{$orders->city}},
                                {{$orders->state}},
                                {{$orders->country}},
                                </div>
                                <label for="">Zip Code</label>
                                <div class="border ">{{ $orders->pincode}}</div>

                            </div>
                            <div class="col-md-6">
                                <h4>Order Details</h4>
                                <hr>
                                <table class="table table-bordered">
                                    
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders->orderitems as $item)
                                            <tr>
                                                <td>{{ $item->products->name}}</td>
                                                <td>{{ $item->prod_qty}}</td>
                                                <td>{{ $item->price}}</td>
                                                <td>
                                                    <img src="{{ asset('assets/uploads/products/'.$item->products->image)  }}" with="50px" alt="Product Image">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <h4 class="px2">Grand Total: <span class="float-end">{{ $orders->total_price }}</span> </h4>
                                <h6 class="px2">Payment Mode: {{ $orders->payment_mode }} </h4>
                            </div>
                        </div>
                   
                    </div>
                </div>
                
            </div>
        </div>
    </div>

@endsection