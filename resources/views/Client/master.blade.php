
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>LU - Shirt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
    <link rel="shortcut icon" type="image/png" href="{{asset('source/images/iconshirt.png')}}"/>
    <link href="{{asset('source/css/checkout.css')}}" type="text/css" rel="stylesheet" media="all">
    <link href="{{asset('source/css/bootstrap.css')}}" type="text/css" rel="stylesheet" media="all">
    <!-- shop css -->
    <link href="{{asset('source/css/shop.css')}}" type="text/css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="{{asset('source/css/owl.carousel.min.css')}}">
    <!-- Owl-Carousel-CSS -->
    <link href="{{ asset('source/css/style.css')  }}" type="text/css" rel="stylesheet" media="all">
    <!-- font-awesome icons -->
    <link href="{{asset('source/css/fontawesome-all.min.css')}}" rel="stylesheet">
    <!-- //Custom Theme files -->
    <!-- online-fonts -->
    <link href="//fonts.googleapis.com/css?family=Elsie+Swash+Caps:400,900" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
    <!-- //online-fonts -->
</head>

<body>
    <!-- header -->
    @include('Client.header')   
    <!-- //header -->





@yield('content')





    <!-- footer -->
@include('Client.footer')
    <!-- //footer -->




    <!-- sign up Modal -->
    <!-- <div class="modal fade" id="myModal_btn" tabindex="-1" role="dialog" aria-labelledby="myModal_btn" aria-hidden="true">
        <div class="agilemodal-dialog modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Register Now</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body pt-3 pb-5 px-sm-5">
                    <div class="row">
                        <div class="col-md-6 mx-auto align-self-center">
                            <img src="images/p3.png" class="img-fluid" alt="login_image" />
                        </div>
                        <div class="col-md-6">
                            <form action="#" method="post">
                                <div class="form-group">
                                    <label for="recipient-name1" class="col-form-label">Your Name</label>
                                    <input type="text" class="form-control" placeholder=" " name="Name" id="recipient-name1" required="">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-email" class="col-form-label">Email</label>
                                    <input type="email" class="form-control" placeholder=" " name="Email" id="recipient-email" required="">
                                </div>
                                <div class="form-group">
                                    <label for="password1" class="col-form-label">Password</label>
                                    <input type="password" class="form-control" placeholder=" " name="Password" id="password1" required="">
                                </div>
                                <div class="form-group">
                                    <label for="password2" class="col-form-label">Confirm Password</label>
                                    <input type="password" class="form-control" placeholder=" " name="Confirm Password" id="password2" required="">
                                </div>
                                <div class="sub-w3l">
                                    <div class="sub-agile">
                                        <input type="checkbox" id="brand2" value="">
                                        <label for="brand2" class="mb-3">
                                            <span></span>I Accept to the Terms & Conditions</label>
                                    </div>
                                </div>
                                <div class="right-w3l">
                                    <input type="submit" class="form-control" value="Register">
                                </div>
                            </form>
                            <p class="text-center mt-3">Already a member?
                                <a href="#" data-toggle="modal" data-target="#exampleModal1" class="text-dark login_btn">
                                    Login Now</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- //signup modal -->




    <!-- signin Modal -->
    <!-- <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModal1" aria-hidden="true">
        <div class="agilemodal-dialog modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body  pt-3 pb-5 px-sm-5">
                    <div class="row">
                        <div class="col-md-6 align-self-center">
                            <img src="images/p3.png" class="img-fluid" alt="login_image" />
                        </div>
                        <div class="col-md-6">
                            <form action="#" method="post">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Your Name</label>
                                    <input type="text" class="form-control" placeholder=" " name="Name" id="recipient-name" required="">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <input type="password" class="form-control" placeholder=" " name="Password" required="">
                                </div>
                                <div class="right-w3l">
                                    <input type="submit" class="form-control" value="Login">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->



    <script src="{{asset('source/js/responsiveslides.min.js')}}"></script>
    <script>
        // You can also use "$(window).load(function() {"
        $(function () {
            // Slideshow 4
            $("#slider3").responsiveSlides({
                auto: false,
                pager: true,
                nav: false,
                speed: 500,
                namespace: "callbacks",
                before: function () {
                    $('.events').append("<li>before event fired.</li>");
                },
                after: function () {
                    $('.events').append("<li>after event fired.</li>");
                }
            });

        });
    </script>

    <script src="{{asset('source/js/owl.carousel.js')}}"></script>
    <script>
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            items: 4,
            loop: false,
            margin: 10,
            autoplay: false,
            autoplayTimeout: 5000,
            autoplayHoverPause: false,
            responsive: {
                320: {
                    items: 1,
                },
                568: {
                    items: 2,
                },
                991: {
                    items: 3,
                },
                1050: {
                    items: 4
                }
            }
        });
    </script>

    <!-- <script src="{{asset('source/js/minicart.js')}}">
    </script>
    <script>
        hub.render();

        hub.cart.on('new_checkout', function (evt) {
            var items, len, i;

            if (this.subtotal() > 0) {
                items = this.items();

                for (i = 0, len = items.length; i < len; i++) {}
            }
        });
    </script> -->

    <script src="{{asset('source/js/move-top.js')}}"></script>
    <script src="{{asset('source/js/easing.js')}}"></script>
    <script>
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();

                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>
  
    {{-- <script src="{{asset('source/js/SmoothScroll.min.js')}}"></script> --}}
 
    <script src="{{asset('source/js/bootstrap.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
</body>

<script>
	function AddCart(id_shirt){
		$.ajax({
			url: '/Add-Cart/'+id_shirt,
			type: 'GET'
		}).done(function(response){
			//console.log(response);
			RenderCart(response);
			  // success notification
				// Shorthand for:
				// alertify.notify( message, 'success', [wait, callback]);
				alertify.success('Đã thêm sản phẩm vào giỏ hàng!');
		});
	}
	$("#change-item-cart").on('click',".parDelete i",function(){
		//console.log($(this).data("id"));
        $.ajax({
			url: '/Delete-Item-Cart/'+ $(this).data("id"),
			type: 'GET'
		}).done(function(response){
			//console.log(response);
			RenderCart(response);
			  // success notification
				// Shorthand for:
				// alertify.notify( message, 'success', [wait, callback]);
				alertify.success('Đã xoá!');
		});
	});
    function RenderCart(response){
        $("#change-item-cart").empty();
		$("#change-item-cart").html(response);
        if(!response){
        $("#total-quanty-show").text(0);
        }
        else{
        $("#total-quanty-show").text($("#total-quanty-cart").val());
        }
        //console.log($("#total-quanty-cart").val());
    }
</script>
<script>
    function DeleteListItemCart(id){
        $.ajax({
			url: '/Delete-Item-List-Cart/'+ id,
			type: 'GET'
		}).done(function(response){
			//console.log(response);
			RenderListCart(response);
			  // success notification
				// Shorthand for:
				// alertify.notify( message, 'success', [wait, callback]);
				alertify.success('Đã xoá!');
		});
	
    }
    function SaveListItemCart(id){
      // console.log( $("#quanty-item-"+id).val());
       $size = $("#size-item-"+id).val();
        $.ajax({
			url: '/Save-Item-List-Cart/'+ id+'/'+$("#quanty-item-"+id).val()+'/'+$("#size-item-"+id).val(),
            //url: '/Save-Item-List-Cart/'+ id+'/'+$("#quanty-item-"+id).val(),
			type: 'GET'
		}).done(function(response){
			//console.log(response);
			RenderListCart(response);
           // $(".valueSize").val()=$("#size-item-"+id).val();
           // $("#size-item-"+id).empty();
           // $(".valueSize").val()=$("#size-item-"+id).val();
			  // success notification
				// Shorthand for:
                // alertify.notify( message, 'success', [wait, callback]);
               // $("#size-item-"+id + " option:selected").prop("selected",false);
                //$("#size-item-"+id + " option[value=" + $size + "]").prop("selected",true);
                //$listSize.html('');
                alertify.success('Đã cập nhật !');
            
		});
	
    }
    function RenderListCart(response){
        $("#list-cart").empty();
		$("#list-cart").html(response);
       
         }
</script>
<style>
    #xoaitemon,#saveitem,#deleteitem:hover{
        cursor: pointer;
    }
</style>
</html>