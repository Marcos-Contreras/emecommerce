@extends('layouts.front')

@section ('title', $products->name)

@section ('content')
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <form action="{{ url('/add-rating') }}" method="POST">
        @csrf 
        <input type="hidden" name="product_id" value="{{ $products->id }}">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rate {{ $products->name }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="rating-css">
                  <div class="star-icon">
                      @if($user_rating)
                      @for($i =1; $i<- $user_rating->stars_rated; $i++)  
                      <input type="radio" value="{{$i}}" name="product_rating" checked id="rating{{$i}}">
                      <label for="rating{{$i}}" class="fa fa-star"></label>                                 
                                
                         @endfor 
                         @for($j = $user_rating->stars_rated+1; $j <= 5;$j++) 
                         <input type="radio" value="{{$j}}" name="product_rating" id="rating{{$i}}">
                         <label for="rating{{$j}}" class="fa fa-star"></label>  
                         
                         @endfor
                      

                      @else
                      <input type="radio" value="1" name="product_rating" checked id="rating1">
                      <label for="rating1" class="fa fa-star"></label>
                      <input type="radio" value="2" name="product_rating" id="rating2">
                      <label for="rating2" class="fa fa-star"></label>
                      <input type="radio" value="3" name="product_rating" id="rating3">
                      <label for="rating3" class="fa fa-star"></label>
                      <input type="radio" value="4" name="product_rating" id="rating4">
                      <label for="rating4" class="fa fa-star"></label>
                      <input type="radio" value="5" name="product_rating" id="rating5">
                      <label for="rating5" class="fa fa-star"></label>
                      @endif
                  </div>
             </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 clas="mb-0">
            <a href="{{ url('category') }}" style="color: black">
                Collections
            </a> /
            <a href="{{ url('view-category/'.$products->category->slug) }}" style="color: black">
                {{ $products->category->name }}
            </a> /
            <a href="{{ url('category/'.$products->category->slug.'/'.$products->slug) }}" style="color: black">
                {{ $products->name }}
            </a>
        </h6>
    </div>
</div>

<div class="container pb 5">
    <div class="product_data">
        <div class="">
            <div class="row">
                <div class="col-md-4 border-right">
                    <img src="{{ asset('assets/uploads/products/'.$products->image) }}" class="w-100" alt="">
                </div>
                <div class="col-md-8">
                    <h2 class="mb-0">
                        {{ $products->name }}
                        @if($products->trending == '1')
                        <label style="font-size: 16px;" class="float-end badge bg-danger trending_tag">Trending</label>
                        @endif
                    </h2>

                    <hr>
                    <label class="me-3">Original Price : <s> {{ $products->original_price }} $</s></label>
                    <label class="fw-bold">Selling Price : {{ $products->selling_price }} $</label>
                    @php $ratenum = number_format($rating_value) @endphp 
                    <div class="rating">
                        @for($i =1; $i<- $ratenum; $i++)                                   
                               <i class="fa fa-star checked"></i>  
                         @endfor 
                         @for($j = $ratenum+1; $j <= 5;$j++) 
                         <i class="fa fa-star"></i> 
                         @endfor
                         <span>
                             @if($ratings->count() > 0) 
                                 {{ $ratings->count() }} Ratings
                             @else
                                 No Ratings
                             @endif
                         </span>
                    </div>
                    
                    <p class="mt-3">
                        {!! $products->small_description !!}
                    </p>
                    <hr>
                    @if($products->qty > 0)
                        <label class="badge bg-success">In stock</label>
                    @else
                        <label class="badge bg-danger">Out of stock</label>
                    @endif
                    <div class="row mt-2">
                        <div class="col-md-3">
                            <input type="hidden" value="{{ $products->id }}" class="prod_id">
                            <label for="Quantity">Quantity</label>
                            <div class="input-group text-center mb-3" style="width:130px;">
                                <button class="input-group-text decrement-btn">-</button>
                                <input type="text" name="quantity" class="form-control qty-input text-center" value="1">
                                <button class="input-group-text increment-btn">+</button>
                            </div>
                        </div>
                        <div class="col-md-9">
                            </br>
                            @if($products->qty > 0)
                                <button type="button" class="btn btn-primary me-3 addToCartBtn float-start">Add to Cart <i
                                    class="fa fa-shopping-cart"></i></button>
                            @endif
                            <button type="button" class="btn btn-success me-3 addToWishlist float-start">Add to Wishlist <i
                                    class="fa fa-heart"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <hr>
                    <h3>Description</h3>
                    <p class="mt-3">
                        {!! $products->description !!}
                    </p>  
                </div>
                <hr>
            </div>
            <div class="row mb-5">
                <div class="col-md-4">
                <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  Rate this products
            </button>
            <a href="{{ url('add-review/'.$products->slug.'/userreview') }}" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  Write a review
                  </a>
                </div>
                <div class="col-md-8">
                    <label for="">Saúl Rodríguez</label>
                    <a href="">Edit</a>
                    <br>
                    <i class="fa fa-star checked"></i>
                    <i class="fa fa-star checked"></i>
                    <i class="fa fa-star checked"></i>
                    <i class="fa fa-star checked"></i>
                    <i class="fa fa-star"></i>
                    <small>Reviewed on december 4, 2021</small>
                    <p>
                        The product is really great, and this page is very well made and secure. I recommend everyone to purchase here!!
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
