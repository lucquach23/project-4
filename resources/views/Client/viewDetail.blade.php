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
    <div style="margin-top: -86px;margin-bottom: -180px;"class="innerf-pages section py-5">
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
                                
                                <li style="margin-top: 30px">Chi tiết chọn Size
                                   
                                </li>
                                <li> <img style="width: 320px" src="/source/images-shirt/size.jpg" alt=""></li>
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
                            @for ($i = 0; $i <= $tbrate; $i++)
                            <li>
                                <a href="#">
                                    <span class="fa fa-star yellow-star" aria-hidden="true"></span>
                                </a>
                            </li>
                            @endfor
                           ( {{$count_rate}} đánh giá)
                            
                        </ul>
                        <div class="clearfix"> </div>
                        <h6>{{number_format($vd->price_sell)}} VNĐ</h6>
                    </div>
                    {{-- <div class="desc_single">
                        <h5>Trạng thái: {{$vd->quantity_has>0?'Còn hàng':'Hết hàng'}}</h5>
                        
                    </div> --}}
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
                                <li>
                                    <div  style=" margin-top: 31px;"   class="occasion-cart">
                                        <div class="chr single-item single_page_b">
                                        <a style="font-size: 30px" class="fa fa-cart-plus" href="javaScript:" onclick="AddCart({{$vd->id_shirt}})"> <span style="font-size: 22px;color:#5BBD2B">Add to Cart</span></a>
                                        </div>
                                    </div>
                                </li>
                              
                            </ul>

                        </div>
                        <div class="color-quality mt-sm-0 mt-4">
                            <h5 class="">Sẵn có</h5>
                            <ul class="single_serv">
                                
                                
                                <li >
                                    <table  style="border: 1px solid #ccc; width: 315px" >
                  
                                        <tr>
                                          <th>S</th>
                                          <th>XS</th>
                                          <th>L</th>
                                          <th>M</th>
                                          <th>XL</th>
                                          <th>XXL</th>
                                        </tr>
                                      
                                      
                                        @foreach($quanti_size as $q) 
                                        
                                        <td>{{$q->quantity}}</td>
                                          
                                        
                                       @endforeach
                                      
                                    </table>
                                   
                                </li>
                                <li class="mt-2">
                                    <a href="#">Nếu có yêu cầu khác về size vui lòng liên hệ</a>
                                </li>
                                <li ><a style="color: blue" href="#">1900.2309.99</a> or <a style="color: blue" href="https://www.facebook.com/luc.quach.18">Quách Lực</a></li>
                                <li>
                                    <a href="#">30 Day Return Policy</a>
                                </li>
                                
                                <li>
                                    <a href="#">Hoàn trả sản phẩm trong 30 ngày nếu không đúng mô tả</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>
    @break
    @endforeach
    @if(Session('customer_id')!=null)
    <section class="tabs_pro py-md-5 pt-sm-3 pb-5">
      
        <div class="tabs tabs-style-line pt-md-5">
            <nav class="container">
                <ul id="clothing-nav" class="nav nav-tabs tabs-style-line" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#women" id="women-tab" role="tab" data-toggle="tab" aria-controls="women" aria-expanded="true">Bình luận</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#men" role="tab" id="men-tab" data-toggle="tab" aria-controls="men">Đánh giá
                        </a>
                    </li>
                   
                </ul>
            </nav>
           
            <div id="clothing-nav-content" class="tab-content py-sm-5">
                <div role="tabpanel" class="tab-pane fade show active" id="women" aria-labelledby="women-tab">
                    <div style="display: inline-block" id="owl-demo" class="owl-carousel text-center">
                        <div  style="width: 800px;margin-left: 142px;">
                            @foreach($cmt as $c)
                            <div style="position: relative">
                            <div style="float: left;"><b>{{$c->name}}</b></div><br>
                            <div style="float: left;"> {{$c->cmt}}</div>
                            </div><br>
                            @endforeach
                           
                            <div style="display: flex;display: flex;margin-top: 91px">
                                <form action="cmt/{{$id_shirt}}" method="post">
                                    @csrf
                                    <input style="height: 45px;
                                    border-radius: 5%;" type="text" name="cmt" placeholder="Nhập bình luận của bạn...">
                                    <button type="submit" class="btn btn-success">Bình luận</button>
                                </form>
                                
                            </div>
                        </div>
                        
                    </div>
                </div>
<style>
    input~i{
       color: yellow;
    }
</style>
                <div role="tabpanel" class="tab-pane fade" id="men" aria-labelledby="men-tab">
                    <div id="owl-demo1" class="owl-carousel text-center">
                        <div>
                            <div style="width: 1020px;">
                            <form action="rate/{{$id_shirt}}" method="post">
                                @csrf
                                    <div id="rate" style="float: right">
                                        <div style="float: left">
                                            <input type="radio" name="gender" value="5"> 
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </div><br>
                                        <div style="float: left">
                                        <input type="radio" name="gender" value="4"> 
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i><br>
                                        </div><br>
                                        <div style="float: left">
                                            <input type="radio" name="gender" value="3"> 
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i><br>
                                        </div><br>
                                        <div style="float: left">
                                            <input type="radio" name="gender" value="2"> 
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i><br>
                                        </div><br>
                                        <div style="float: left">
                                            <input type="radio" name="gender" value="1"> 
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </div><br>
                                        <button style="float: left;margin-top:10px" type="submit" class="btn btn-success">Đánh giá</button>
                                    </div>
                                   
                                  </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
               
                </div>

            </div>
        </div>
    </section>
    @else 
<div style="margin-left: 132px;margin-top: 150px;margin-bottom: 63px;"> <a class="btn btn-primary" href="{{route('login_checkout')}}">Bình luận</a></div>
    @endif
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
                                <img style="height: 260px" src="/source/images-shirt/{{$pc->image}}" alt="img" class="card-img-top">
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