@extends('website.master')
@section('title')
{{$brand->name}}
@endsection

@section('body')
<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <p class="breadcrumb-nav">{{$brand->name}} has ( <b>{{count($brand->allProducts)}}</b> ) items.</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="{{route('home')}}"><i class="lni lni-home"></i> Home</a></li>
                    <li><a href="javascript: void(0); ">{{$brand->name}}</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>


<section class="product-grids section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-12">

                <div class="product-sidebar">

                    <div class="single-widget search">
                        <h3>Search Product</h3>
                        <form action="#">
                            <input type="text" placeholder="Search Here...">
                            <button type="submit"><i class="lni lni-search-alt"></i></button>
                        </form>
                    </div>


                    {{-- products --}}
                    <div class="single-widget">
                        <h3>All Categories</h3>
                        <ul class="list">
                            @foreach ($categories as $category)
                            <li>
                                <a href="{{route('category', ['id' => $category->id ])}}">{{$category->name}} </a>
                                <span>( {{count($category->allProducts)}} )</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>


                    <div class="single-widget range">
                        <h3>Price Range</h3>
                        <input type="range" class="form-range" name="range" step="1" min="100" max="10000" value="10"
                            onchange="rangePrimary.value=value">
                        <div class="range-inner">
                            <label>$</label>
                            <input type="text" id="rangePrimary" placeholder="100" />
                        </div>
                    </div>


                    <div class="single-widget condition">
                        <h3>Filter by Price</h3>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1">
                            <label class="form-check-label" for="flexCheckDefault1">
                                $50 - $100L (208)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2">
                            <label class="form-check-label" for="flexCheckDefault2">
                                $100L - $500 (311)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3">
                            <label class="form-check-label" for="flexCheckDefault3">
                                $500 - $1,000 (485)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault4">
                            <label class="form-check-label" for="flexCheckDefault4">
                                $1,000 - $5,000 (213)
                            </label>
                        </div>
                    </div>


                    <div class="single-widget condition">
                        <h3>Filter by Brand</h3>
                        @foreach ($brands as $brand)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault11">
                            <label class="form-check-label" for="flexCheckDefault11">
                                {{$brand->name}} ( {{ count($brand->allProducts)}} )
                            </label>
                        </div>    
                        @endforeach
                    </div>
                </div>
            </div>



            <div class="col-lg-9 col-12">
                <div class="product-grids-head">
                    <div class="product-grid-topbar">
                        <div class="row align-items-center">
                            <div class="col-lg-7 col-md-8 col-12">
                                <div class="product-sorting">
                                    <label for="sorting">Sort by:</label>
                                    <select class="form-control" id="sorting">
                                        <option>Popularity</option>
                                        <option>Low - High Price</option>
                                        <option>High - Low Price</option>
                                        <option>Average Rating</option>
                                        <option>A - Z Order</option>
                                        <option>Z - A Order</option>
                                    </select>
                                    <h3 class="total-show-product">Showing: <span>1 - 12 items</span></h3>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-4 col-12">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <button class="nav-link active" id="nav-grid-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-grid" type="button" role="tab" aria-controls="nav-grid"
                                            aria-selected="true"><i class="lni lni-grid-alt"></i></button>
                                        <button class="nav-link" id="nav-list-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-list" type="button" role="tab" aria-controls="nav-list"
                                            aria-selected="false"><i class="lni lni-list"></i></button>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-grid" role="tabpanel"
                            aria-labelledby="nav-grid-tab">
                            <div class="row">
                                @if (count($brandProducts) > 0)
                                    @foreach ($brandProducts as $brandProduct)
                                        <div class="col-lg-4 col-md-6 col-12">

                                        <div class="single-product">
                                            <div class="product-image">
                                                <img src="{{asset($brandProduct->image)}}" alt="#"  height="250">
                                                <div class="button">
                                                    <a href="" class="btn"><i class="lni lni-cart"></i>
                                                        Add to Cart</a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <span class="category">{{$brandProduct->category->name}} >> {{$brandProduct->subcategory->name}}</span>
                                                <h4 class="title">
                                                    <a href="#">{{$brandProduct->name}}</a>
                                                </h4>
                                                <ul class="review">
                                                    <li><i class="lni lni-star-filled"></i></li>
                                                    <li><i class="lni lni-star-filled"></i></li>
                                                    <li><i class="lni lni-star-filled"></i></li>
                                                    <li><i class="lni lni-star-filled"></i></li>
                                                    <li><i class="lni lni-star"></i></li>
                                                    <li><span>4.0 Review(s)</span></li>
                                                </ul>
                                                <div class="price">
                                                    <span><span>&#2547;.</span> {{$brandProduct->selling_price}} Only</span>
                                                </div>
                                            </div>
                                        </div>

                                        </div>
                                    @endforeach
                                @else 
                                <p class="text-center py-5">No Items currently available</p>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-12">

                                    <div class="pagination left">
                                        <ul class="pagination-list">
                                            <li><a href="javascript:void(0)">1</a></li>
                                            <li class="active"><a href="javascript:void(0)">2</a></li>
                                            <li><a href="javascript:void(0)">3</a></li>
                                            <li><a href="javascript:void(0)">4</a></li>
                                            <li><a href="javascript:void(0)"><i class="lni lni-chevron-right"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">
                            <div class="row">
                                @foreach ($brandProducts as $brandProduct)
                                <div class="col-lg-12 col-md-12 col-12">

                                    <div class="single-product">
                                        <div class="row align-items-center">
                                            <div class="col-md-4 col-12">
                                                <div class="product-image">
                                                    <img src="{{asset($brandProduct->image)}}" alt="#" height="220">
                                                    <div class="button">
                                                        <a href="product-details.html" class="btn"><i
                                                                class="lni lni-cart"></i> Add to
                                                            Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-12">
                                                <div class="product-info">
                                                    <span class="category">{{$brandProduct->category->name}}</span>
                                                    <h4 class="title">
                                                        <a href="{{route('product-details-info', ['id' => $brandProduct->id])}}">{{$brandProduct->name}}</a>
                                                    </h4>
                                                    <ul class="review">
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star"></i></li>
                                                        <li><span>4.0 Review(s)</span></li>
                                                    </ul>
                                                    <div class="price">
                                                        <span>$ {{$brandProduct->selling_price}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                @endforeach
                                
                            </div>
                            <div class="row">
                                <div class="col-12">

                                    <div class="pagination left">
                                        <ul class="pagination-list">
                                            <li><a href="javascript:void(0)">1</a></li>
                                            <li class="active"><a href="javascript:void(0)">2</a></li>
                                            <li><a href="javascript:void(0)">3</a></li>
                                            <li><a href="javascript:void(0)">4</a></li>
                                            <li><a href="javascript:void(0)"><i class="lni lni-chevron-right"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection