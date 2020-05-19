@extends('Client.master')
@section('content')
<div class="ibanner_w3 pt-sm-5 pt-3">
		<h4 class="head_agileinfo text-center text-capitalize text-center pt-5">
			<span>f</span>ashion
			<span>Lu-Shirt</span></h4>
	</div>
	<!-- //inner banner -->
	<!-- breadcrumbs -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="/">Home</a>
            </li>
            
			<li class="breadcrumb-item active" aria-current="page">
                <a href="{{route('listShirt')}}">Men's Closthing</a>   
            </li>
		</ol>
    </nav>
    
	<!-- //breadcrumbs -->
	<!-- Shop -->
	<div class="innerf-pages section">
		<div class="fh-container mx-auto">
			<div class="row my-lg-5 mb-5">
				<!-- grid left -->
				@include('Client.navListShirt')
				<!-- //grid left -->
				<!-- grid right -->
				<div class="col-lg-9 mt-lg-0 mt-5 right-product-grid">
					<!-- card group  -->
					<div class="card-group">
						<!-- card -->@foreach($listShirt as $ls)
						<div class="col-lg-3 col-sm-6 p-0">
                            
							<div class="card product-men p-3">
								<div class="men-thumb-item">
									<img style="height: 250px" src="/source/images-shirt/{{$ls->image}}" alt="img" class="card-img-top">
									<div class="men-cart-pro">
										<div class="inner-men-cart-pro">
											<a href="/detail/{{$ls->id_shirt}}" class="link-product-add-cart">Quick View</a>
										</div>
									</div>
								</div>
								<!-- card body -->
								<div class="card-body  py-3 px-2">
									<h5 class="card-title text-capitalize">{{$ls->name}}</h5>
									<div class="card-text d-flex justify-content-between">
										<p class="text-dark font-weight-bold">{{number_format($ls->price_sell)}}</p>
										<!-- <p class="line-through">$50.99</p> -->
									</div>
								</div>
								<!-- card footer -->
								<div class="card-footer d-flex justify-content-end">
									
										<!-- <button type="submit" class="hub-cart phub-cart btn">
											<i class="fa fa-cart-plus" aria-hidden="true"></i>
										</button> -->
										<a class="fa fa-cart-plus" onclick="AddCart({{$ls->id_shirt}})" href="javaScript:" >  Add Cart</a>
									
								</div>
                            </div>
                           
						</div>
						<!-- //card -->
                        @endforeach
                       
                    </div>
                    {{ $listShirt->links() }}
                </div>
                <style>
                   .pagination {
                        float: right;
                        margin-top: 50px;
                    }
               </style>
			</div>
		</div>
		<!--// Shop -->
       
@endsection

<!-- <script>
	function AddCart(id_shirt){
		$.ajax({
			url: '/Add-Cart/'+id_shirt,
			type: 'GET'
		}).done(function(response){
			console.log(response);
			$("#change-item-cart").empty();
			$("#change-item-cart").html(response);
			  
				alertify.success('Đã thêm sản phẩm vào giỏ hàng!');
		});
	}
	$("#change-item-cart").on('click',".parDelete i",function(){
		console.log(this).data("id");
	});
</script> -->