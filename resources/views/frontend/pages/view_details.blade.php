@extends('frontend.master')
@section('content')
    @php
	    $product['image']=explode('|',$product->image);
	@endphp

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Product main img -->
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">
                            @foreach($product->image as $image)
							<div class="product-preview">
								<img src="{{asset('/image/'.$image)}}" alt="">
							</div>
                            @endforeach
						</div>
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
						<div id="product-imgs">
                        @foreach($product->image as $image)
							<div class="product-preview">
                            <img src="{{asset('/image/'.$image)}}" alt="">
							</div>
                        @endforeach
						</div>
					</div>
					<!-- /Product thumb imgs -->

					<!-- Product details -->
					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name">{{$product->name}}</h2>
							<div>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o"></i>
								</div>
								<a class="review-link" href="#">Review(s) | Add your review</a>
							</div>
							<div>
								<h3 class="product-price">&#2547;{{$product->price}} <del class="product-old-price">&#2547;{{$product->price}}</del></h3>
								<span class="product-available">In Stock</span>
							</div>
							<p>{{!! $product->description !!}}</p>

							<div class="product-options">
								<label>
									Size
									<select class="input-select">
                                        @foreach(Json_decode($sizes->size) as $value)
										<option value="{{$value}}">{{$value}}</option>
                                        @endforeach
									</select>
								</label>
								<label>
									Color
									<select class="input-select">
                                    @foreach(Json_decode($colors->color) as $value)
										<option value="{{$value}}">{{$value}}</option>
                                    @endforeach
									</select>
								</label>
							</div>

							<!-- <div class="add-to-cart">
								<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
							</div> -->
							<form action="{{url('add-to-cart')}}" method="post">
									@csrf
											<div class="add-to-cart">
												<input type="hidden" name="quantity" value="1">
												<input type="hidden" name="id" value="{{$product->id}}">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
											</div>
								</form>
							<ul class="product-links">
								<li>Category:</li>
								<li><a href="#">{{$product->category->name}}</a></li>
								<li><a href="#">{{$product->subcategory->name}}</a></li>
							</ul>

							<ul class="product-links">
								<li>Share:</li>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-envelope"></i></a></li>
							</ul>

						</div>
					</div>
					<!-- /Product details -->

					<!-- Product tab -->
					<div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
								<li><a data-toggle="tab" href="#tab2">Details</a></li>
								<li><a data-toggle="tab" href="#tab3">Reviews</a></li>
							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<div class="col-md-12">
											<p>{{!! $product->description !!}}</p>
										</div>
									</div>
								</div>
								<!-- /tab1  -->

								<!-- tab2  -->
								<div id="tab2" class="tab-pane fade in">
									<div class="row">
										<div class="col-md-12">
											<p>{{!! $product->description !!}}</p>
										</div>
									</div>
								</div>
								<!-- /tab2  -->

								<!-- tab3  -->
								<div id="tab3" class="tab-pane fade in">
									<div class="row">
										<!-- Rating -->
										<div class="col-md-3">
											<div id="rating">
												<div class="rating-avg">
													<span>4.5</span>
													<div class="rating-stars">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o"></i>
													</div>
												</div>
												<ul class="rating">
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
														</div>
														<div class="rating-progress">
															<div style="width: 80%;"></div>
														</div>
														<span class="sum"></span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div style="width: 60%;"></div>
														</div>
														<span class="sum"></span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div></div>
														</div>
														<span class="sum"></span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div></div>
														</div>
														<span class="sum"></span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div></div>
														</div>
														<span class="sum"></span>
													</li>
												</ul>
											</div>
										</div>
										<!-- /Rating -->

										<!-- Reviews -->
										<div class="col-md-6">
											<div id="reviews">
												<ul class="reviews">
													@foreach($reviews as $review)
													<li>
														<div class="review-heading">
															<h5 class="name"> {{ $review->name }}</h5>
															<div class="review-rating">
																@for($i=1; $i<=$review->rating; $i++)
																<i class="fa fa-star"></i>
																@endfor
															</div>
														</div>
														<div class="review-body">
															<p>{{ $review->description }}</p>
														</div>
													</li>
													@endforeach
												</ul>
												<!-- <ul class="reviews-pagination">
													<li class="active">1</li>
													<li><a href="#">2</a></li>
													<li><a href="#">3</a></li>
													<li><a href="#">4</a></li>
													<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
												</ul> -->
											</div>
										</div>
										<!-- /Reviews -->

										<!-- Review Form -->
										<div class="col-md-3">
											<div id="review-form">
												<form class="review-form" method="post" action="{{ route('review.save', $product->id) }}">
													@csrf
													<input class="input" name="name" type="text" placeholder="Your Name">
													<input class="input" name="email" type="email" placeholder="Your Email">
													<textarea class="input" name="description" placeholder="Your Review"></textarea>
													<div class="input-rating">
														<span>Your Rating: </span>
														<div class="stars">
															<input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
															<input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
															<input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
															<input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
															<input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
														</div>
													</div>
													<button type="submit" class="primary-btn">Submit</button>
												</form>
											</div>
										</div>
										<!-- /Review Form -->
									</div>
								</div>
								<!-- /tab3  -->
							</div>
							<!-- /product tab content  -->
						</div>
					</div>
					<!-- /product tab -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- Section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-12">
						<div class="section-title text-center">
							<h3 class="title">Related Products</h3>
						</div>
					</div>

                    @foreach($related_products as $related_product)
                        @php
						    $related_product['image']=explode('|',$related_product->image);
						    $images=$related_product->image[0];
					    @endphp
					<!-- product -->
					<div class="col-md-3 col-xs-6">
						<div class="product">
							<div class="product-img">
								<img src="{{asset('/image/'.$images)}}" alt="">
								<div class="product-label">
								</div>
							</div>
							<div class="product-body">
								<p class="product-category"><a href="{{url('/view-details'.$related_product->id)}}">{{$related_product->category->name}}</a></p>
								<h3 class="product-name"><a href="{{url('/view-details'.$related_product->id)}}">{{$related_product->name}}</a></h3>
								<h4 class="product-price"><a href="{{url('/view-details'.$related_product->id)}}">&#2547;{{$related_product->price}}<del class="product-old-price">&#2547;{{$related_product->price}}</del></a></h4>
								<div class="product-rating">
								</div>
							</div>
							<form action="{{url('add-to-cart')}}" method="post">
										@csrf
											<div class="add-to-cart">
												<input type="hidden" name="quantity" value="1">
												<input type="hidden" name="id" value="{{$related_product->id}}">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
											</div>
									</form>
						</div>
					</div>
					<!-- /product -->
                    @endforeach
					
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /Section -->
@endsection