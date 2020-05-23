<!DOCTYPE html>
<html lang="en">

    <head>

		<meta charset="utf-8">
		<link rel="shortcut icon" type="image/png" href="{{asset('source/images/iconshirt.png')}}"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        {{-- <link rel="shortcut icon" href="assets/ico/favicon.png"> --}}
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                	
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>Đăng nhập tài khoản của bạn</strong> hoặc <strong>Đăng ký</strong></h1>
							@if(count($errors)>0)
							<div class="alert alert-danger">
								@foreach($errors->all() as $err)								
								  {{$err}}<br>								
								@endforeach
							</div>						  
						  @endif
						  @if(session('mess'))

 							 <div class="alert alert-success">{{session('mess')}}</div>
						
							@endif
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-5">
                        	
                        	<div class="form-box">
								
	                        	<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Đăng nhập vào hệ thống</h3>
	                            		<p>Nhập tên đăng nhập và mật khẩu:</p>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-lock"></i>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
				                    <form role="form" action="{{URL::to('/login_customer')}}" method="post" class="login-form">
										{{@csrf_field()}}
										<div class="form-group">
				                    		<label class="sr-only" for="form-username">Tên đăng nhập</label>
				                        	<input type="text" name="username_login" placeholder="Tên đăng nhập..." class="form-username form-control" id="form-username">
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-password">Mật khẩu</label>
				                        	<input type="password" name="password_login" placeholder="Mật khẩu..." class="form-password form-control" id="form-password">
				                        </div>
				                        <button type="submit" class="btn">Đăng nhập</button>
				                    </form>
			                    </div>
		                    </div>
		                
		                	<div class="social-login">
	                        	<h3>...đăng nhập bằng:</h3>
	                        	<div class="social-login-buttons">
		                        	<a class="btn btn-link-2" href="#">
		                        		<i class="fa fa-facebook"></i> Facebook
		                        	</a>
		                        	<a class="btn btn-link-2" href="#">
		                        		<i class="fa fa-twitter"></i> Twitter
		                        	</a>
		                        	<a class="btn btn-link-2" href="#">
		                        		<i class="fa fa-google-plus"></i> Google Plus
		                        	</a>
	                        	</div>
	                        </div>
	                        
                        </div>
                        
                        <div class="col-sm-1 middle-border"></div>
                        <div class="col-sm-1"></div>
                        	
                        <div class="col-sm-5">
                        	
                        	<div class="form-box">
                        		<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Đăng ký tài khoản</h3>
	                            		<p>Điền vào mẫu đăng ký thông tin tài khoản:</p>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-pencil"></i>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
								<form role="form" action="{{URL::to('/add_customer')}}" method="post" class="registration-form">
										{{@csrf_field()}}
									<div class="form-group">
				                    		<label class="sr-only" for="form-first-name">Họ tên</label>
				                        	<input type="text" name="fullname" placeholder="Họ tên người dùng..." class="form-first-name form-control" id="form-first-name">
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-last-name">Địa chỉ</label>
				                        	<input type="text" name="address" placeholder="Địa chỉ.." class="form-last-name form-control" id="form-last-name">
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-email">Email</label>
				                        	<input type="text" name="email" placeholder="example@gmail.com" class="form-email form-control" id="form-email">
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-about-yourself">Số điện thoại</label>
											<input type="text" name="phone" placeholder="Số điện thoại.." class="form-email form-control" id="form-email">
										</div>
										<div class="form-group">
				                        	<label class="sr-only" for="form-about-yourself">Tên đăng nhập</label>
											<input type="text" name="username" placeholder="Tên đăng nhập..." class="form-email form-control" id="form-email">
										</div>
										<div class="form-group">
				                        	<label class="sr-only" for="form-about-yourself">Mật khẩu</label>
											<input type="password" name="pass" placeholder="Password..." class="form-email form-control" id="form-email">
										</div>
										
				                        <button type="submit" class="btn">Đăng ký</button>
				                    </form>
			                    </div>
                        	</div>
                        	
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>

        <!-- Footer -->
        <footer>
        	<div class="container">
        		<div class="row">
        			
        			<div class="col-sm-8 col-sm-offset-2">
        				<div class="footer-border"></div>
					<p><a href="{{route('home')}}">Quay lại</a></p>
        			</div>
        			
        		</div>
        	</div>
        </footer>

        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>