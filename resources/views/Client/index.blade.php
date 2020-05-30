@extends('Client.master')
@section('content')

    <!-- banner -->
   @include('Client.banner')
    <!-- //banner -->
    <!--services-->
    <div class="agileits-services" id="services">
        <div class="no-gutters agileits-services-row row">
            <div class="col-lg-3 col-sm-6 agileits-services-grids p-sm-5 p-3">
                <span class="fas fa-sync-alt p-4"></span>
                <h4 class="mt-2 mb-3">30 days replacement</h4>
            </div>
            <div class="col-lg-3 col-sm-6 agileits-services-grids p-sm-5 p-3">
                <span class="fas fa-gift p-4"></span>
                <h4 class="mt-2 mb-3">Gift Card</h4>
            </div>

            <div class="col-lg-3 col-sm-6 agileits-services-grids p-sm-5 p-3">
                <span class="fas fa-lock p-4"></span>
                <h4 class="mt-2 mb-3">secure payments</h4>
            </div>
            <div class="col-lg-3 col-sm-6 agileits-services-grids p-sm-5 p-3">
                <span class="fas fa-shipping-fast p-4"></span>
                <h4 class="mt-2 mb-3">free shipping</h4>
            </div>
        </div>
    </div>
   
     <div class="row no-gutters pb-5">        
    @foreach($viewsp as $v)    
        <div class="col-sm-4">
            <div class="hovereffect">
                <img class="img-fluid" src="source/images/{{$v->link}}" alt="">
                <div class="overlay">
                    <h5>{{$v->decription}}</h5>
                    <a class="info" href="listShirt/{{$v->url}}">Shop Now</a>
                </div>
            </div>
        </div>
    @endforeach 
    </div>
    
    <!-- product tabs -->
    <section class="tabs_pro py-md-5 pt-sm-3 pb-5">
        <h5 class="head_agileinfo text-center text-capitalize pb-5">
            <span>smart clothing</span></h5>
        <div class="tabs tabs-style-line pt-md-5">
            <nav class="container">
                <ul id="clothing-nav" class="nav nav-tabs tabs-style-line" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#women" id="women-tab" role="tab" data-toggle="tab" aria-controls="women" aria-expanded="true">Best Sale</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#men" role="tab" id="men-tab" data-toggle="tab" aria-controls="men">Sơ mi đẹp
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#girl" role="tab" id="girl-tab" data-toggle="tab" aria-controls="girl">Được quan tâm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#boy" role="tab" id="boy-tab" data-toggle="tab" aria-controls="boy">Mới nhập</a>
                    </li>
                </ul>
            </nav>
            <!-- Content Panel -->
            <div id="clothing-nav-content" class="tab-content py-sm-5">
                <div role="tabpanel" class="tab-pane fade show active" id="women" aria-labelledby="women-tab">
                    <div id="owl-demo" class="owl-carousel text-center">
                        @foreach($bestSale as $bs)
                        <div class="item">
                            <!-- card -->
                            <div class="card product-men p-3">
                                <div class="men-thumb-item">
                                    <img style="height: 335px" src="/source/images-shirt/{{$bs->image}}" alt="img" class="card-img-top">
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="detail/{{$bs->id_shirt}}" class="link-product-add-cart">View Detail</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- card body -->
                                <div class="card-body  py-3 px-2">
                                    <h5 class="card-title text-capitalize">{{$bs->name}}</h5>
                                    <div class="card-text d-flex justify-content-between">
                                        <p class=" font-weight-bold">{{number_format($bs->price_input)}}</p>
                                        <p style="text-decoration: line-through;" class="line-through">{{$bs->price_sell}}</p>
                                    </div>
                                </div>
                                <!-- card footer -->
                                <div class="card-footer d-flex justify-content-end">
                                <a class="fa fa-cart-plus" href="javaScript:" onclick="AddCart({{$bs->id_shirt}})"></a>
                                </div>
                            </div>
                            <!-- //card -->
                        </div>
                        @endforeach
                    </div>
                </div>

                <div role="tabpanel" class="tab-pane fade" id="men" aria-labelledby="men-tab">
                    <div id="owl-demo1" class="owl-carousel text-center">
                    @foreach($beatyShirt as $bs)
                        <div class="item">
                            <!-- card -->
                            <div class="card product-men p-3">
                                <div class="men-thumb-item">
                                    <img style="height: 350px" src="/source/images-shirt/{{$bs->image}}" alt="img" class="card-img-top">
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="detail/{{$bs->id_shirt}}" class="link-product-add-cart">Quick View</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- card body -->
                                <div class="card-body  py-3 px-2">
                                    <h5 class="card-title text-capitalize">{{$bs->name}}</h5>
                                    <div class="card-text d-flex justify-content-between">
                                        <p class="text-dark font-weight-bold">{{number_format($bs->price_sell)}}</p>
                                        <!-- <p style="text-decoration: line-through;" class="line-through">{{number_format($bs->price_sell)}}</p> -->
                                    </div>
                                </div>
                                <!-- card footer -->
                                <div class="card-footer d-flex justify-content-end">
                                <a class="fa fa-cart-plus" href="javaScript:" onclick="AddCart({{$bs->id_shirt}})"></a>
                                </div>
                            </div>
                            <!-- //card -->
                        </div>
                        @endforeach
                    </div>
                </div>

                <div role="tabpanel" class="tab-pane fade" id="girl" aria-labelledby="girl-tab">
                    <div id="owl-demo2" class="owl-carousel text-center">
                    @foreach($bestCmt as $bc)
                        <div class="item">
                            <!-- card -->
                            <div class="card product-men p-3">
                                <div class="men-thumb-item">
                                    <img style="height: 350px" src="/source/images-shirt/{{$bc->image}}" alt="img" class="card-img-top">
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="detail/{{$bc->id_shirt}}" class="link-product-add-cart">Quick View</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- card body -->
                                <div class="card-body  py-3 px-2">
                                    <h5 class="card-title text-capitalize">{{$bc->name}}</h5>
                                    <div class="card-text d-flex justify-content-between">
                                        <p class="text-dark font-weight-bold">{{number_format($bc->price_sell)}}</p>
                                        <!-- <p class="line-through">$39.99</p> -->
                                    </div>
                                </div>
                                <!-- card footer -->
                                <div class="card-footer d-flex justify-content-end">
                                <a class="fa fa-cart-plus" href="javaScript:" onclick="AddCart({{$bc->id_shirt}})"></a>
                                </div>
                            </div>
                            <!-- //card -->
                        </div>
                    @endforeach   
                    </div>
                </div>

                <div role="tabpanel" class="tab-pane fade" id="boy" aria-labelledby="boy-tab">
                    <div id="owl-demo3" class="owl-carousel text-center">
                        @foreach($moinhap as $mn)
                        <div class="item">
                            <!-- card -->
                            <div class="card product-men p-3">
                                <div class="men-thumb-item">
                                    <img style="height: 350px" src="/source/images-shirt/{{$mn->image}}" alt="img" class="card-img-top">
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="detail/{{$mn->id_shirt}}" class="link-product-add-cart">Quick View</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- card body -->
                                <div class="card-body  py-3 px-2">
                                    <h5 class="card-title text-capitalize">{{$mn->name}}</h5>
                                    <div class="card-text d-flex justify-content-between">
                                        <p class="text-dark font-weight-bold">{{number_format($mn->price_sell)}}</p>
                                        <!-- <p class="line-through">$39.99</p> -->
                                    </div>
                                </div>
                                <!-- card footer -->
                                <div class="card-footer d-flex justify-content-end">
                                <a class="fa fa-cart-plus" href="javaScript:" onclick="AddCart({{$mn->id_shirt}})"></a>
                                </div>
                            </div>
                            <!-- //card -->
                        </div>
                       @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- //product tabs -->
    <!-- insta posts -->
    <section class="py-lg-5">
        <!-- insta posts -->
        <h5 class="head_agileinfo text-center text-capitalize pb-5">
            <span>shop on insta</span></h5>
        <div class="gallery row no-gutters pt-lg-5">
            @foreach($viewinsta as $vi)
            <div class="col-lg-2 col-sm-4 col-6 gallery-item">
                <img src="/source/images-shirt/{{$vi->image}}" class="img-fluid" alt="" />
                <div class="gallery-item-info">
                    <ul>
                        <li class="gallery-item-likes">
                            <i class="fas fa-heart"></i> {{$vi->heart_on_insta}}</li>
                        <li class="gallery-item-comments">
                            <i class="fas fa-comment"></i> {{$vi->cmt_on_insta}}</li>
                    </ul>
                </div>
            </div>
           @endforeach
        </div>
       
    </section>
    <!-- //insta posts -->
@endsection 