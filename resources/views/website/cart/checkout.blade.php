@extends('website.master')

@section('title')
Checkout Form
@endsection


@section('body')
<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">checkout</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="{{route('home')}}"><i class="lni lni-home"></i> Home</a></li>
                    <li>
                        <a href="{{route('show-cart')}}"> 
                        <i class="lni lni-cart"></i>My Cart</a></li>
                    <li>checkout</li>
                </ul>
            </div>
        </div>
    </div>
</div>


<section class="checkout-wrapper section">
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-lg-8 mb-4">
                <div class="checkout-steps-form-style-1">
                    <ul id="accordionExample">
                        <li>
                            <h6 class="title">Your Personal Details </h6>
                            <form action="{{ route('new-order-checkout') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="single-form form-default">
                                            <label>Your Name</label>
                                            <div class="row">
                                                <div class="col-md-12 form-input form">
                                                    <input type="text" name="name" placeholder="Enter Your Name here">
                                                    <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-form form-default">
                                            <label>Email Address</label>
                                            <div class="form-input form">
                                                <input type="email" name="email" placeholder="Email Address">
                                                <span class="text-danger">{{$errors->has('email') ? $errors->first('email') : ''}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-form form-default">
                                            <label>Contact Number</label>
                                            <div class="form-input form">
                                                <input type="number" name="contact_number" placeholder="Phone Number">
                                                <span class="text-danger">{{$errors->has('contact_number') ? $errors->first('contact_number') : ''}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="single-form form-default">
                                            <label>Delivery Address</label>
                                            <div class="form-input form">
                                                <input type="text" name="delivery_address" placeholder="Delivery Address">
                                                <span class="text-danger">{{$errors->has('delivery_address') ? $errors->first('delivery_address') : ''}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="single-form form-default">
                                            <label>Payment Type
                                            </label>
                                            <div class="d-flex align-items-center">
                                                <div class="me-5">
                                                    <input type="radio" name="payment_method" class="me-2" value="1">Cash
                                                </div>
                                                <div>
                                                    <input type="radio" name="payment_method" class="me-2" value="2">Digital Payment
                                                </div>
                                            </div>
                                            <span class="text-danger">{{$errors->has('payment_method') ? $errors->first('payment_method') : ''}}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="single-form button">
                                            <button type="submit" class="btn" onclick="confirn('Your Order will be placed ')">Place Order</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </li>                       
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="checkout-sidebar">
                    <div class="checkout-sidebar-price-table">
                        <?php 
                            $sub_total = 0;
                            $tax = 1;
                            $shippingCharge = 100;
                        ?>
                        <h5 class="title text-center"><strong>Cart Summery</strong></h5>
                        <div class="sub-total-price">
                            @foreach ($cartProducts as $cartProduct)
                            <div class="total-price">
                                <p class="value"><strong>{{$cartProduct->name}}</strong> ({{$cartProduct->quantity}} x {{$cartProduct->price}})
                                <p class="price"><span>&#2547;</span>{{$cartProduct->quantity * $cartProduct->price}}</p>
                            </div>

                            <?php $sub_total += ($cartProduct->price) * ($cartProduct->quantity) ?>
                            @endforeach
                        </div> 
                        <?php
                            $tax = (($sub_total * 1.5)/100);
                            $total = $sub_total + $shippingCharge + $tax
                        ?>
                        <div class="total-payable">
                            <div class="payable-price">
                                <p class="value">Subtotal Price:</p>
                                <p class="price"><span>&#2547;</span>{{number_format($sub_total)}}</span></p>
                            </div>
                            <div class="payable-price">
                                <p class="value">Tax:</p>
                                <p class="price"><span>&#2547;</span>{{number_format($tax)}}</span></p>
                            </div>
                            <div class="payable-price">
                                <p class="value">Shipping Cost:</p>
                                <p class="price"><span>&#2547;</span>{{number_format($shippingCharge)}}</span></p>
                            </div>
                        </div>
                        <div class="total-payable">
                            <div class="payable-price">
                                <p class="value">Total Amount:</p>
                                <p class="price"><span>&#2547;</span>{{number_format($total)}}</p>
                            </div>
                        </div>
                        <div class="price-table-btn button text-center">
                            <a href="javascript:void(0)" class="btn btn-alt">Continue Shopping</a>
                        </div>

                        {{-- using session for store data in order table --}}
                        <?php 
                            Session::put('total_amount',($total));
                            Session::put('tax', ($tax));
                            Session::put('shipping_cost',($shippingCharge));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection