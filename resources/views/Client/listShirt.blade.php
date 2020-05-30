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
  
	@if(Session::has('dis')!=null)
	
	<div class="innerf-pages section">
		
		<div class="fh-container mx-auto">
			@if(Session::has('mate')!=null)
			<div class="alert alert-success">Chất liệu {{Session::get('mate')}}</div>
			@else
			<div class="alert alert-success">Giảm giá {{Session::get('dis')}}%</div>
			@endif
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
										@if(Session::has('mate')!=null)
										<p class="text-dark font-weight-bold">{{number_format($ls->price_sell)}}</p>
										@else
										<p class="text-dark font-weight-bold"> {{number_format(($ls->price_sell)-($ls->price_sell*Session::get('dis')/100))}}</p>
										 <p class="line-through"><del>{{number_format($ls->price_sell)}}</del></p>
										 @endif
									</div>
								</div>
							
								<div class="card-footer d-flex justify-content-end">
									
										<a class="fa fa-cart-plus" onclick="AddCart({{$ls->id_shirt}})" href="javaScript:" >  Add Cart</a>
									
								</div>
                            </div>
                           
						</div>
						<!-- //card -->
                        @endforeach
                       
					</div>
					
					
					
				
					
                </div>
                {{-- <style>
                   .pagination {
                        float: right;
                        margin-top: 50px;
                    }
               </style> --}}
			</div>
		</div>
	@else
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
								
									<div class="card-footer d-flex justify-content-end">
										
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
		
	@endif
       
@endsection

