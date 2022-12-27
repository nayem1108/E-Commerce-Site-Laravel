@extends('website.master')
@section('title')
    My Cart 
@endsection

@section('body')
<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Cart</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="{{route('home')}}"><i class="lni lni-home"></i> Home</a></li>
                    <li><a href="javascript:void(0);"><i class="lni lni-cart"></i></a></li>
                    <li><i class="lni lni-cart"></i>My Cart</li>
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="shopping-cart section">
    <div class="container">
        <div class="cart-list-head">

            <div class="cart-list-title">
                <div class="row">
                    <div class="col-lg-1 col-md-1 col-12">
                    </div>
                    <div class="col-lg-4 col-md-3 col-12">
                        <p>Product Name</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>Quantity</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>Unit Price</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>Subtotal</p>
                    </div>
                    {{-- <div class="col-lg-2 col-md-2 col-12">
                        <p>Discount</p>
                    </div> --}}
                    <div class="col-lg-1 col-md-2 col-12">
                        <p>Remove</p>
                    </div>
                </div>
            </div>

            {{-- {{$cartProducts}} --}}
            <?php 
                $sub_total = 0;
                $tax = 0;
                $shippingCharge = 100;
            ?>
            @foreach ($cartProducts as $product)
                <div class="cart-single-list">
                    <p class="text-succuss text-center">{{Session::get('message')}}</p>
                    <div class="row align-items-center">
                        <div class="col-lg-1 col-md-1 col-12">
                            <a href="product-details.html"><img src="{{asset($product->attributes->image)}}" alt="#"></a>
                        </div>
                        <div class="col-lg-4 col-md-3 col-12">
                            <h5 class="product-name"><a href="{{route('product-details-info', ['id' => $product->id])}}"> {{$product->name}}</a></h5>
                            <p class="product-des">
                                <span><em>Category:</em> Mirrorless</span>
                                <span><em>Subcategory:</em> Black</span>
                            </p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <form action="{{route('update-cart-quantity', ['id' => $product->id])}}" method="POST">
                                @csrf 
                                <div class="input-group">
                                    <input type="number" class="form-control" name="qty" value="{{$product->quantity}}" min="1">
                                    <input type="submit" class="btn btn-outline-primary" value="Update">
                                </div>
                            </form>
                            {{-- <div class="input-group mb-3">
                                <input type="number" class="form-control" value="{{$product->quantity}}" min="1">
                                <button type="submit" class="btn btn-outline-primary">Update</button>
                            </div> --}}
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>{{number_format($product->price)}}</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>{{number_format(($product->price) * ($product->quantity))}}</p>
                        </div>
                        <div class="col-lg-1 col-md-2 col-12">
                            <a class="remove-item" href="{{route('remove-cart-item', ['id' => $product->id])}}" onclick="return(confirm('Confirm to delete ?'))"><i class="lni lni-close"></i></a>
                        </div>
                    </div>
                </div>
                <?php $sub_total += ($product->price) * ($product->quantity);?>
            @endforeach
            <?php
            $tax += (($sub_total * 1.5)/100);
            $total = $sub_total + $shippingCharge + $tax;
            ?>

        </div>
        <div class="row">
            <div class="col-12">

                <div class="total-amount">
                    <div class="row">
                        <div class="col-lg-8 col-md-6 col-12">
                            <div class="left">
                                <div class="coupon">
                                    <form action="#" target="_blank">
                                        <input name="Coupon" placeholder="Enter Your Coupon">
                                        <div class="button">
                                            <button class="btn">Apply Coupon</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="right">
                                <ul>
                                    <li>Sub Total<span><span>&#2547;</span>{{number_format($sub_total)}}</span></li>
                                    <li>Shipping Cost<span><span>&#2547;</span>{{number_format($shippingCharge)}}</span></li>
                                    <li>Tax<span><span>&#2547;</span>{{number_format($tax)}}</span></li>
                                    <li class="last">You Pay<span><span>&#2547;</span>{{number_format($total)}}</span></li>
                                </ul>
                                <div class="button">
                                    @if (count($cartProducts) > 0)
                                        <a href="{{route('checkout')}}" class="btn">Checkout</a>
                                    @endif
                                    <a href="{{route('home')}}" class="btn btn-alt">Continue shopping</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection