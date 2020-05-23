<script src="{{asset('source/js/jquery-2.2.3.min.js')}}"></script>
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
                        {{-- <li id="li1">
                            <form action="#">
                                <input  style="cursor:text; border: 1px solid #64b3f4;" placeholder="Search..."  class="btn btn-outline-suesscess" type="text" >
                                <button style="background-color: white;
                                border: none;
                                color: #64b3f4;
                                font-size: 22px; cursor: pointer;" class="fa fa-search" href="#" id="btnsearch"></button>
                            </form>
                        </li> --}}
                        </li id="li2">
                           @if(Session::has('customer_name')!=null)
                           <li><a href="{{route('logout')}}">Đăng xuất</a></li>
                    <li><a href="{{route('order_customer')}}" class="far fa-user"></a></li>
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
                                         <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                                         <a href="/ListCart" class="btn btn-primary">Checkout</a>
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
                            <div class="dropdown-menu" style="width:0%">
                                <div class="px-0 container">
                                    <div class="row">
                                        <div class="col-md-6">
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
<!-- <script>
	function AddCart(id_shirt){
		$.ajax({
			url: 'Add-Cart/'+id_shirt,
			type: 'GET'
		}).done(function(response){
			console.log(response);
			$("#change-item-cart").empty();
			$("#change-item-cart").html(response);
			  // success notification
				// Shorthand for:
				// alertify.notify( message, 'success', [wait, callback]);
				alertify.success('Đã thêm sản phẩm vào giỏ hàng!');
		});
	}
</script> -->
<script>
    $(window).scroll(function(){
  if ($(window).scrollTop() >= 330) {
    $('.sticky').addClass('fixed');
   //document.getElementById("li1").style.visibility = "hidden";
   // document.getElementById("li2").style.visibility = "hidden";
    //$('$li1').style.visibility = "hidden";
//$('$li2').style.visibility = "hidden";
   }
   else {
    $('.sticky').removeClass('fixed');
   // ocument.getElementById("li1").style.display="block";
   // document.getElementById("li2").style.display="block";
   }
});
</script>
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