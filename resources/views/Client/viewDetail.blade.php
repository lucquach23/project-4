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
                <a href="{{route('listShirt')}}">Men's Closting</a>   
            </li>
           
            <li class="breadcrumb-item active" aria-current="page">Single Product</li>
		</ol>
    </nav>
    @foreach($viewDetail as $vd)
    <div style="margin-top: -86px;"class="innerf-pages section py-5">
        <div class="container">
            <div class="row my-sm-5">
            <div class="col-lg-4 single-right-left">
                <div class="grid images_3_of_2">
                        <div class="flexslider1">
                            <ul class="slides">
                                <li data-thumb="/source/images-shirt/{{$vd->image}}">
                                    <div class="thumb-image">
                                        <img src="/source/images-shirt/{{$vd->image}}" data-imagezoom="true" alt=" " class="img-fluid"> </div>
                                </li>
                                <li>
                                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                                        <div style="margin-top: 20px; border: 1px solid" class="carousel-inner">
                                          <div class="carousel-item active">
                                            <img class="d-block " style="width: 268px; height: 200px;" src="/source/images-shirt/{{$vd->image}}">
                                          </div>
                                          <div class="carousel-item">
                                            <img class="d-block "style="width: 268px; height: 200px;" src="/source/images-shirt/{{$vd->image}}">
                                          </div>
                                          <div class="carousel-item">
                                            <img class="d-block "style="width: 268px; height: 200px;" src="/source/images-shirt/{{$vd->image}}">
                                          </div>
                                        </div>
                                      </div>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 mt-lg-0 mt-5 single-right-left simpleCart_shelfItem">
                    <h3>{{$vd->name}}</h3>
                    </h3>
                    <div class="caption">

                        <ul class="rating-single">
                            <li>
                                <a href="#">
                                    <span class="fa fa-star yellow-star" aria-hidden="true"></span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="fa fa-star yellow-star" aria-hidden="true"></span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="fa fa-star yellow-star" aria-hidden="true"></span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="fa fa-star yellow-star" aria-hidden="true"></span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="fa fa-star yellow-star" aria-hidden="true"></span>
                                </a>
                            </li>
                        </ul>
                        <div class="clearfix"> </div>
                        <h6>{{number_format($vd->price_sell)}} VNĐ</h6>
                    </div>
                    <div class="desc_single">
                        <h5>Trạng thái: {{$vd->quantity_has>0?'Còn hàng':'Hết hàng'}}</h5>
                        
                    </div>
                    <div class="desc_single">
                        <h5>Màu: Như trong ảnh</h5>
                        
                    </div>
                    <div class="desc_single">
                        <h5>Điểm nổi bật:</h5>
                        <p>{{$vd->description}}</p>
                    </div>
                    <div class="d-sm-flex justify-content-between">
                        <div class="occasional">
                            <h5 class="sp_title mb-3">Highlights</h5>
                            <ul class="single_specific">
                                <li>
                                    <span>Chất liệu: </span> {{$vd->fabric_material}}
                                </li>
                                
                                <li>
                                    <span>Form: </span>Regular.
                                </li>
                                
                                <li>
                                   <span>Trọng lượng S/P:</span>  400 Gram
                                </li>
                                <li>
                                    <span>Fit :</span> Slim, Muscle
                                </li>
                              
                            </ul>

                        </div>
                        <div class="color-quality mt-sm-0 mt-4">
                            <h5 class="sp_title mb-3">Dịch vụ</h5>
                            <ul class="single_serv">
                                
                                <li>
                                    <a href="#">Hoàn trả sản phẩm trong 30 ngày nếu không đúng mô tả</a>
                                </li>
                                <li class="mt-2">
                                    <a href="#">Services 30 Day Return Policy</a>
                                </li>
                                <li>Chi tiết chọn Size
                                   
                                </li>
                                <li> <img style="width: 400px" src="/source/images-shirt/hoa-tiet/size.jpg" alt=""></li>
                            </ul>
                        </div>
                    </div>
                    <!-- <div class="description">
                        <h5>Kiểm tra giao hàng, tùy chọn thanh toán và chi phí tại địa điểm của bạn</h5>
                        <form action="#" method="post">
                            <input type="text" placeholder="Enter pincode" required />
                            <input type="submit" value="Check">
                        </form>
                    </div> -->
                    <div class="occasion-cart">
                        <div class="chr single-item single_page_b">
                        <a style="font-size: 30px" class="fa fa-cart-plus" href="javaScript:" onclick="AddCart({{$vd->id_shirt}})"> <span style="font-size: 22px;">Thêm vào giỏ hàng</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @break
    @endforeach
    <!-- /new_arrivals -->
    <div class="section singlep_btm pb-5">
        <div class="container">
            <div class="new_arrivals">
                <h4 class="rad-txt text-capitalize">Có thể bạn quan tâm
                </h4>
                <!-- card group 2 -->
                <div class="card-group my-5">
                    <!-- card -->
                    @foreach($productCare as $pc)
                    <div class="col-lg-3 col-sm-6 p-0">
                        <div class="card product-men p-3">
                            <div class="men-thumb-item">
                                <img style="height: 244px" src="/source/images-shirt/{{$pc->image}}" alt="img" class="card-img-top">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="/detail/{{$pc->id_shirt}}" class="link-product-add-cart">View Detail</a>
                                    </div>
                                </div>
                            </div>
                            <!-- card body -->
                            <div class="card-body  py-3 px-2">
                                <h5 class="card-title text-capitalize">{{$pc->name}}</h5>
                                <div class="card-text d-flex justify-content-between">
                                    <p class="text-dark font-weight-bold">{{number_format($pc->price_sell)}}</p>
                                    <!-- <p class="line-through">$25.00</p> -->
                                </div>
                            </div>
                            <!-- card footer -->
                            <div class="card-footer d-flex justify-content-end">
                            <a style="font-size: 30px" class="fa fa-cart-plus" href="javaScript:" onclick="AddCart({{$vd->id_shirt}})"> </a>

                            </div>
                        </div>
                    </div>
                    @endforeach
                   
                </div>
                <!-- //card group -->
                <!--//new_arrivals-->
            </div>
        </div>
    </div>
@endsection