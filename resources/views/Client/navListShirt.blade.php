<div class="side-bar col-lg-3">
					<!--preference -->
					{{-- <div class="left-side">
						<h3 class="shopf-sear-headits-sear-head">
							Categories</h3>
						<ul>
							<li>
								<input type="checkbox" class="checked" name="cat1" id="cat1">
								<label for="cat1">Sơ mi Hoạ tiết</label>
							</li>
							<li>
								<input type="checkbox" class="checked" name="cat2" id="cat2">
								<label for="cat2">Sơ mi Trắng</label>
							</li>
							<li>
								<input type="checkbox" class="checked" name="cat3" id="cat3">
								<label for="cat3">Caro - kẻ sọc</label>
							</li>
							<li>
								<input type="checkbox" class="checked" name="cat4" id="cat4">
								<label for="cat4">Sơ mi Oxford</label>
                            </li>
                            <li>
								<input type="checkbox" class="checked" name="cat5" id="cat4">
								<label for="cat4">Dress Shirt</label>
                            </li>
                            <li>
								<input type="checkbox" class="checked" name="cat6" id="cat4">
								<label for="cat4">Over Shirt</label>
							</li>
                            <li>
								<input type="checkbox" class="checked" name="cat7" id="cat4">
								<label for="cat4">Sơ mi Denim</label>
							</li>
						</ul>
					</div> --}}
					<!-- // preference -->
					<div class="search-hotel">
						<h3 class="shopf-sear-headits-sear-head">
							<span>Brand</span> in focus</h3>
						<form action="#" method="post">
							<input type="search" placeholder="search here" name="search" required="">
							<input type="submit" value="Search">
						</form>
					</div>
					
					<!--preference -->
					<!-- <div class="left-side">
						<h3 class="shopf-sear-headits-sear-head">
							<span>latest</span> arrivals</h3>
						<ul>
							<li>
								<input type="checkbox" class="checked" name="arr1" id="arr1">
								<label for="arr1">last 30 days</label>
							</li>
							<li>
								<input type="checkbox" class="checked" name="arr2" id="arr2">
								<label for="arr2">last 90 days</label>
							</li>
							<li>
								<input type="checkbox" class="checked" name="arr3" id="arr3">
								<label for="arr3">last 150 days</label>
							</li>

						</ul>
					</div> -->
					<!-- // preference -->
					<!-- discounts -->
					{{-- <div class="left-side">
						<h3 class="shopf-sear-headits-sear-head">Sizes</h3>
						<ul>
							<li>
								<input type="checkbox" class="checked" name="size1" id="size1">
								<label for="size1">XS</label>
							</li>
							<li>
								<input type="checkbox" class="checked" name="size2" id="size2">
								<label for="size2">S</label>
							</li>
							<li>
								<input type="checkbox" class="checked" name="size3" id="size3">
								<label for="size3">M</label>
							</li>
							<li>
								<input type="checkbox" class="checked" name="size4" id="size4">
								<label for="size4">L</label>
							</li>
							<li>
								<input type="checkbox" class="checked" name="size5" id="size5">
								<label for="size5">XL</label>
							</li>
							<li>
								<input type="checkbox" class="checked" name="size6" id="size6">
								<label for="size6">XXL</label>
							</li>
							<li>
								<input type="checkbox" class="checked" name="size7" id="size7">
								<label for="size7">XXXL</label>
							</li>
						</ul>
					</div> --}}
					<!-- //discounts -->
					<!-- Binding -->
					{{-- <div class="left-side">
						<h3 class="shopf-sear-headits-sear-head">Color</h3>
						<div class="d-flex">
							<ul>
								<li>
									<input type="checkbox" class="checked" name="color1" id="color1">
									<label for="color1">Black</label>
								</li>
								<li>
									<input type="checkbox" class="checked" name="color2" id="color2">
									<label for="color2">Blue</label>
								</li>
								<li>
									<input type="checkbox" class="checked" name="color3" id="color3">
									<label for="color3">Red</label>
								</li>
								<li>
									<input type="checkbox" class="checked" name="color4" id="color4">
									<label for="color4">Yellow</label>
								</li>
								<li>
									<input type="checkbox" class="checked" name="color5" id="color5">
									<label for="color5">White</label>
								</li>
							</ul>
							<ul>
								<li>
									<input type="checkbox" class="checked" name="color6" id="color6">
									<label for="color6">Green</label>
								</li>
								<li>
									<input type="checkbox" class="checked" name="color7" id="color7">
									<label for="color7">Multi</label>
								</li>
								<li>
									<input type="checkbox" class="checked" name="color8" id="color8">
									<label for="color8">Purple</label>
								</li>
								<li>
									<input type="checkbox" class="checked" name="color9" id="color9">
									<label for="color9">Gold</label>
								</li>
								<li>
									<input type="checkbox" class="checked" name="color10" id="color10">
									<label for="color10">Orange</label>
								</li>
							</ul>
						</div>
					</div> --}}
					<!-- //Binding -->
					<!-- discounts -->
					<div class="left-side">
					<form action="{{route('discount')}}" method="post">
						{{@csrf_field()}}
						<h3 class="shopf-sear-headits-sear-head">Discount</h3>
							<ul>
								<li>
									<input type="radio" class="checked" value="52"  name="dis" id="dis1">
									<label for="dis1">5% - 20%</label>
								</li>
								<li>
									<input type="radio" class="checked" value="24"  name="dis" id="dis2">
									<label for="dis2">20% - 40%</label>
								</li>
								<li>
									<input type="radio" class="dis3" value="46"  name="dis" id="dis3">
									<label for="dis3">40% - 60%</label>
								</li>
								<li>
									<input type="radio" class="checked" value="60"  name="dis" id="dis4">
									<label for="dis4">60% or more</label>
								</li>
									<button type="submit" class="fa fa-arrow-right" aria-hidden="true"></button>
							</ul>
						</form>
					</div>
					<!-- //discounts -->
					<!-- reviews -->
					<div class="customer-rev left-side">
						<h3 class="shopf-sear-headits-sear-head">Customer Review</h3>
						<ul>
							<li>
								<a href="#">
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<span>5.0</span>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star-o" aria-hidden="true"></i>
									<span>4.0</span>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star-half-o" aria-hidden="true"></i>
									<i class="fa fa-star-o" aria-hidden="true"></i>
									<span>3.5</span>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star-o" aria-hidden="true"></i>
									<i class="fa fa-star-o" aria-hidden="true"></i>
									<span>3.0</span>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star-half-o" aria-hidden="true"></i>
									<i class="fa fa-star-o" aria-hidden="true"></i>
									<i class="fa fa-star-o" aria-hidden="true"></i>
									<span>2.5</span>
								</a>
							</li>
						</ul>
					</div>
					<!-- //reviews -->
				</div>