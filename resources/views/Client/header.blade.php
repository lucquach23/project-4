{{-- <script src="{{asset('source/js/jquery-2.2.3.min.js')}}"></script> --}}
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<header class="sticky" id="myHeader">
        <div class="container">
            <!-- top nav -->
            <nav class="top_nav d-flex pt-3 pb-1">
                <!-- logo -->
                <h1>
                    <a class="navbar-brand" href="/">Lu-Shirt
                    </a>
                </h1>
                <!-- //logo -->
                <div class="w3ls_right_nav ml-auto d-flex" style="float: right">
                    <ul id="menutopheader" style="display: flex;">
                        
                        </li id="li2">
                           @if(Session::has('customer_name')!=null)
                                
                                    <li>
                                    
                                     <div class="dropdown">
                                        <button type="button" class="far fa-user btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                         
                                        </button>
                                        <div class="dropdown-menu">
                                          <a class="dropdown-item" href="{{route('order_customer')}}">Đơn hàng của bạn</a>
                                        <a class="dropdown-item" href="/changeInfo/{{Session::get('customer_id')}}">Thay đổi thông tin</a>
                                          <a class="dropdown-item" href="{{route('logoutcus')}}">Đăng xuất</a>
                                        </div>
                                      </div>
                                    </li>
                           @else
                           <li id="loginli"><a href="{{route('login_checkout')}}">Đăng nhập</a></li>
                           @endif
                        
                        


                        <li>
                            
                            <button   style="border: none;
                            background-color: white;
                            color: #64b3f4;
                            font-size: 24px; cursor: pointer;" type="button"  class="fas fa-shopping-bag"   data-toggle="modal" data-target="#modalCart">
                                :  @if(Session::has('Cart')!=null)
                                <b id="total-quanty-show" style="font-size: 18px">{{Session::get('Cart')->totalQuanty}}</b>
                                @else
                                <b id="total-quanty-show" style="font-size: 18px">0</b>
                                
                                @endif
                               
                                 </button>
                                
                                 <div class="modal fade" id="modalCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
         
         
         
         
         
         
                                 <div class="modal-dialog" role="document">
                                     <div class="modal-content">
                                     <!--Header-->
                                     <div class="modal-header">
                                         <h4 class="modal-title" id="myModalLabel">Your cart</h4>
                                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                         <span aria-hidden="true">×</span>
                                         </button>
                                     </div>
                                     <!--Body-->
                                     <div id="change-item-cart">
                                         <div class="modal-body">
                                        @include('Client.Cart')
                                         
                                         </div>
                                     </div>
                                     
                                     <!--Footer-->
                                     <div class="modal-footer">
                                         <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Đóng</button>
                                         <a href="/ListCart" class="btn btn-primary">Xem giỏ hàng</a>
                                     </div>
                                     </div>
                                 </div>
                            
                        </li>
                        <li>
                            @if(Session::has('customer_name')!=null)
                            <div>Hello, {{Session::get('customer_name')}}</div>
                                @else
                                <div></div>
                                @endif
                        </li>
                    </ul>
                </div>
                


                       




                        
                   
                </div>
            </nav>
            <!-- //top nav -->
            <!-- bottom nav -->
            <nav class="navbar navbar-expand-lg navbar-light justify-content-center">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto text-center">
                        <li class="nav-item">
                            <a class="nav-link  active" href="/">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown has-mega-menu">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="listShirt" role="button" aria-haspopup="true" aria-expanded="false">Men's clothing</a>
                            <div class="dropdown-menu" style="">
                                <div class="px-0 container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            @foreach($loai_sp as $loai)
                                            <a class="dropdown-item" href="/listShirt/{{$loai->id_category_shirt}}">{{$loai->description}}</a>
                                            @endforeach
                                           
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('listShirt')}}">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/blog">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/contact">Contact</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- //bottom nav -->
        </div>
       
        <!-- //header container -->
</header>
<style>
    #navbarSupportedContent>ul>li{
        margin-right: 50px;
    }
    .fixed {
        
    position: fixed;
    top:0; left:0;
    width: 100%; 
    z-index: 909999;
    background-color: #ccc;
    }
  
</style>
{{-- 
<script>
    $(window).scroll(function(){
  if ($(window).scrollTop() >= 330) {
    $('.sticky').addClass('fixed');
   }
   else {
    $('.sticky').removeClass('fixed');
   }
});
</script> --}}
<style>
    #menutopheader>li{
        padding-right: 20px;
        padding-left: 20px;
        
    }
    #btnsearch{
            position: absolute;
            padding-top: 7px;
        }
       
</style>