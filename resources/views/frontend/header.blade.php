@php
						
						$customer_id=Session::get('id');
					
						
						
						@endphp
<!--HEADER-->
<header>
<!-- TOP HEADER -->
<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i>01734956810</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> admin@gmail.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> online market</a></li>
					</ul>
					<ul class="header-links pull-right">
						@if($customer_id != NULL)
						<li><a href="{{url('/cus-logout')}}"><i class="fa fa-user-o"></i> Logout</a></li>
						@else
						<li><a href="{{url('/login-check')}}"><i class="fa fa-user-o"></i> Login</a></li>
						@endif
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="#" class="logo">
									<img src="./img/amazon.jpg" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form action="{{url('/search')}}" method="GET">
									<select class="input-select" name="category">
										<option value="all">All Categories</option>
										@foreach($categories as $category)
										<option value="{{$category->id}}">{{ $category->name }}</option>
										@endforeach
									</select>
									<input class="input" name="product" placeholder="Search here" value="{{request('product')}}">
									<button class="search-btn" type="submit">Search</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Cart -->
								@php
									$cart_array=cardArray();
								@endphp
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Your Cart</span>
										<div class="qty"><?= count($cart_array)?></div>
									</a>
									<div class="cart-dropdown">
										<div class="cart-list">
											@foreach($cart_array as $v_add_cart)
											@php
											$images=$v_add_cart['attributes'][0];
											$images=explode('|',$images);
											$images=$images[0];
											@endphp
											<div class="product-widget">
												<div class="product-img">
													<img src="{{asset('/image/'.$images)}}">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">{{$v_add_cart['name']}}</a></h3>
													<h4 class="product-price"><span class="qty">{{$v_add_cart['quantity']}}x</span>	&#2547;{{$v_add_cart['price']}}</h4>
												</div>
												<a class="delete" href="{{url('/delete-cart'.$v_add_cart['id'])}}"><i class="fa fa-close"></i></button>
											</div>
											@endforeach
										</div>
										<div class="cart-summary">
											<small><?= count($cart_array)?> Item(s) selected</small>
											<h5>SUBTOTAL: 	&#2547;{{Cart::getTotal()}}</h5>
										</div>
										<div class="cart-btns">
										@php
										$customer_id=Session::get('id');
										@endphp
										@if($customer_id!=Null)
											<a style="width: 100%; background-color: #D10024;" href="{{url('/checkout')}}">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
										@else
											<a style="width: 100%; background-color: #D10024;" href="{{url('/login-check')}}">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
										@endif
										</div>
									</div>
								</div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
        </header>
        <!--/HEADER-->