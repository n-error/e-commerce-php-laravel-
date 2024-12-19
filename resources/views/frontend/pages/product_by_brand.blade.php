<?php
use App\Models\Product;
?>
@extends('frontend.master')
@section('content')
		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Categories</h3>
							<div class="checkbox-filter">
                            @foreach($categories as $category)
                            @php
                                $catProductCount=\App\Models\Product::catProductCount($category->id);
                            @endphp
								<div class="input-checkbox">
									<input type="checkbox" id="category-1">
									<label for="category-1">
										<span></span>
										<li>
                                            <a href="{{url('/product_by_cat'.$category->id)}}">
                                                {{$category->name}}
                                            </a>
                                        </li>
										<small>({{$catProductCount}})</small>
									</label>
								</div>
                            @endforeach
							</div>
						</div>
						<!-- /aside Widget -->
                        
						<!-- aside Widget -->
                        <!--
						<div class="aside">
							<h3 class="aside-title">Price</h3>
							<div class="price-filter">
								<div id="price-slider"></div>
								<div class="input-number price-min">
									<input id="price-min" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
								<span>-</span>
								<div class="input-number price-max">
									<input id="price-max" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
							</div>
						</div>
                        -->
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Subcategories</h3>
							<div class="checkbox-filter">
                                @foreach($subcategories as $subcategory)
                                @php
                                    $subcatProductCount=\App\Models\Product::subcatProductCount($subcategory->id);
                                @endphp
								<div class="input-checkbox">
									<input type="checkbox" id="brand-1">
									<label for="brand-1">
										<span></span>
										<li>
                                            <a href="{{url('/product_by_subcat'.$subcategory->id)}}">
                                                {{$subcategory->name}}
                                            </a>
                                        </li>
										<small>({{$subcatProductCount}})</small>
									</label>
								</div>
                                @endforeach
							</div>
						</div>
						<!-- /aside Widget -->
					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9">
						<!-- store top filter -->
						<div class="store-filter clearfix">
							<div class="store-sort">
								<label>
									Sort By:
									<select class="input-select">
										<option value="0">Popular</option>
										<option value="1">Position</option>
									</select>
								</label>

								<label>
									Show:
									<select class="input-select">
										<option value="0">20</option>
										<option value="1">50</option>
									</select>
								</label>
							</div>
							<ul class="store-grid">
								<li class="active"><i class="fa fa-th"></i></li>
								<li><a href="#"><i class="fa fa-th-list"></i></a></li>
							</ul>
						</div>
						<!-- /store top filter -->

						<!-- store products -->
						<div class="row">
							<!-- product -->
                            @foreach($products as $product)
                                @php
						            $product['image']=explode('|',$product->image);
						            $images=$product->image[0];
					            @endphp
							<div class="col-md-4 col-xs-6">
								<div class="product">
									<div class="product-img">
										<img src="{{asset('/image/'.$images)}}" alt="">
										<!-- <div class="product-label">
											<span class="sale">-30%</span>
											<span class="new">NEW</span>
										</div> -->
									</div>
									<div class="product-body">
                                    <p class="product-category"><a href="{{url('/view-details'.$product->id)}}">{{$product->category->name}}</a></p>
								<h3 class="product-name"><a href="{{url('/view-details'.$product->id)}}">{{$product->name}}</a></h3>
								<h4 class="product-price"><a href="{{url('/view-details'.$product->id)}}">&#2547;{{$product->price}}<del class="product-old-price">&#2547;{{$product->price}}</del></a></h4>
										<div class="product-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
									</div>
									<form action="{{url('add-to-cart')}}" method="post">
										@csrf
											<div class="add-to-cart">
												<input type="hidden" name="quantity" value="1">
												<input type="hidden" name="id" value="{{$product->id}}">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
											</div>
									</form>
								</div>
							</div>
                            @endforeach
							<!-- /product -->
						</div>
						<!-- /store products -->

						<!-- store bottom filter -->
						<div class="store-filter clearfix">
							<span class="store-qty">Showing 20-100 products</span>
							<ul class="store-pagination">
								<li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
							</ul>
						</div>
						<!-- /store bottom filter -->
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
@endsection