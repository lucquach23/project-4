
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

    {{-- show detail cus --}}
   
</head>

<body>
    <!-- header -->
    @include('Client.header')   
    <!-- //header -->





@yield('content')





    <!-- footer -->
@include('Client.footer')
    <!-- //footer -->




   


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
			RenderCart(response);			 
			alertify.success('Đã thêm sản phẩm vào giỏ hàng!');
		});
	}
	$("#change-item-cart").on('click',".parDelete i",function(){		
        $.ajax({
			url: '/Delete-Item-Cart/'+ $(this).data("id"),
			type: 'GET'
		}).done(function(response){			
			RenderCart(response);		 
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
       
    }
</script>
<script>
    function DeleteListItemCart(id){
        $.ajax({
			url: '/Delete-Item-List-Cart/'+ id,
			type: 'GET'
		}).done(function(response){
			
			RenderListCart(response);
			
				alertify.success('Đã xoá!');
		});
	
    }
    function SaveListItemCart(id){    
       $size = $("#size-item-"+id).val();
        $.ajax({
			url: '/Save-Item-List-Cart/'+ id+'/'+$("#quanty-item-"+id).val()+'/'+$("#size-item-"+id).val(),          
			type: 'GET'
		}).done(function(response){			
			RenderListCart(response);
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