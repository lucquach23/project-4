<div class="side-bar col-lg-3">
	<div class="search-hotel">
		<h3 class="shopf-sear-headits-sear-head">
			<span>Enter</span> your keyword</h3>
		<form action="{{route('searchcus')}}" method="post">
			{{@csrf_field()}}
			<input type="search" placeholder="search here" name="searchcus">
			<input type="submit" value="Search">
		</form>
	</div>
	<div class="left-side">
		<form action="{{route('PriceRange')}}" method="post">
			{{@csrf_field()}}
			<h3 class="shopf-sear-headits-sear-head">Price Orange</h3>
			<ul>
				<li>
					<input type="radio" class="checked" value="0-300000" name="dis" id="dis1">
					<label for="dis1">Dưới 300</label>
				</li>
				<li>
					<input type="radio" class="checked" value="300000-600000" name="dis" id="dis2">
					<label for="dis2">Từ 300 - 600</label>
				</li>
				<li>
					<input type="radio" class="dis3" value="600000-1000000" name="dis" id="dis3">
					<label for="dis3">Trên 600</label>
				</li>

				<button style="float: right" type="submit" class="fa fa-arrow-right" aria-hidden="true"></button>
			</ul>
		</form>
	</div>

	<div class="left-side">
		<form action="{{route('material')}}" method="post">
			{{@csrf_field()}}
			<h3 class="shopf-sear-headits-sear-head">Chất liệu vải</h3>
			<ul>
				<li>
					<input type="radio" class="checked" value="Bamboo" name="dis" id="dis1">
					<label for="dis1">Bamboo</label>
				</li>
				<li>
					<input type="radio" class="checked" value="Kaki" name="dis" id="dis2">
					<label for="dis2">Kaki</label>
				</li>
				<li>
					<input type="radio" class="dis3" value="Cotton" name="dis" id="dis3">
					<label for="dis3">Cotton</label>
				</li>
				<li>
					<input type="radio" class="checked" value="Lanh" name="dis" id="dis4">
					<label for="dis4">Lanh</label>
				</li>
				<li>
					<input type="radio" class="checked" value="Voan" name="dis" id="dis4">
					<label for="dis4">Voan</label>
				</li>
				<button style="float: right" type="submit" class="fa fa-arrow-right" aria-hidden="true"></button>
			</ul>
		</form>
	</div>


	<div class="left-side">
		<form action="{{route('discount')}}" method="post">
			{{@csrf_field()}}
			<h3 class="shopf-sear-headits-sear-head">Discount</h3>
			<ul>
				<li>
					<input type="radio" class="checked" value="5" name="dis" id="dis1">
					<label for="dis1">5%</label>
				</li>
				<li>
					<input type="radio" class="checked" value="10" name="dis" id="dis2">
					<label for="dis2">10%</label>
				</li>
				<li>
					<input type="radio" class="dis3" value="15" name="dis" id="dis3">
					<label for="dis3">15%</label>
				</li>
				<li>
					<input type="radio" class="checked" value="20" name="dis" id="dis4">
					<label for="dis4">20%</label>
				</li>
				<button style="float: right" type="submit" class="fa fa-arrow-right" aria-hidden="true"></button>
			</ul>
		</form>
	</div>

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

</div>