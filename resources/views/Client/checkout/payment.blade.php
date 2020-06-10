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
           
            <li class="breadcrumb-item active" aria-current="page">Your Cart</li>
		</ol>
    </nav>
    <section class="checkout_wthree py-sm-5 py-3">
        <div class="container">
            <div class="check_w3ls">
                <div class="d-sm-flex justify-content-between mb-4">
                    <h4>review your order
                    </h4>
                    <a href=""></a>
                </div>
                <div id="list-cart">
                    <div class="checkout-right">
                        <table class="timetable_sub">
                            <thead>
                                <tr> 
                                    <th>Product Image</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Size</th>
                                    <th>Price</th>
                                    <th>Total Money</th>
                                    {{-- <th>Save</th>
                                    <th>Remove</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @if(Session::has('Cart')!=null)
                                @foreach(Session::get('Cart')->products as $item)
                                <tr class="rem1">
                                    <td class="invert-image">
                                        <a href="#">
                                            <img style="height: 73px; width: 61px;" src="source/images-shirt/{{$item['productInfo']->image}}" alt=" " class="img-responsive">
                                        </a>
                                    </td>
                                    <td class="invert">{{$item['productInfo']->name}}</td>
                                    <td class="invert">
                                        <div class="quantity">
                                            <input id="quanty-item-{{$item['productInfo']->id_shirt}}" style="width: 50px;" type="number" value="{{$item['quanty']}}"> 
                                        </div>
                                    </td>
                                    <td class="invert">
                                    <select  id="size-item-{{$item['productInfo']->id_shirt}}">
                                    <option selected value="{{$item['size']}}">{{  $item['size']  }}</option>
                                        {{-- <option value="S">S</option>
                                        <option value="XS">XS</option>
                                        <option value="L">L</option>
                                        <option value="M">M</option>
                                        <option value="XL">XL</option>
                                        <option value="XXL">XXL</option>
                                        <option value="XXXL">XXXL</option> --}}
                                    </select>
                                    </td>
                                    
                                    <td class="invert">{{number_format($item['productInfo']->price_sell)}}</td>
                                    <td class="invert">{{number_format($item['price'])}}</td>
                                   
                                    {{-- <td><i id="saveitem" class="fa fa-save" onclick="SaveListItemCart({{$item['productInfo']->id_shirt}});" ></i></td>
                                    <td class="invert">
                                       <i id="deleteitem" class="fa fa-times" onclick="DeleteListItemCart({{$item['productInfo']->id_shirt}});"></i>
                    
                                    </td> --}}
                                </tr>
                                @endforeach
                                @else <tr><td>Giỏ hàng rỗng</td></tr>
                                @endif
                               
                    
                            </tbody>
                        </table>
                    </div>
                    <div class="row checkout-left mt-5">
                        <div class="col-md-4 checkout-left-basket">
                            <h4>Tổng chi tiết đơn hàng</h4>
                            <ul>
                            @if(Session::has('Cart')!=null)
                                <li>Tổng số lượng sản phẩm : 
                                    <span >{{Session::get('Cart')->totalQuanty}}</span>
                                </li>
                                <li>Tổng tiền: 
                                    
                                    <span>{{number_format(Session::get('Cart')->totalPrice)}}</span>
                                </li>
                                @else
                                <li>Total Quantity : 
                                    <span >0</span>
                                </li>
                                <li>Total Money : 
                                    
                                    <span>0</span>
                                </li>
                               
                                @endif
                                <li> Chi tiết chọn size <img style="width: 400px" src="/source/images-shirt/hoa-tiet/size.jpg" alt=""></li>
                                <li>
                                    Phương thức thanh toán: <br>
                                    <input  checked  type="radio" >
                                    <label  >COD (Free Shiping)</label><br>
                                    <input disabled name="paymethod" type="radio"  value="female">
                                    <label >Remittance - Chuyển khoản</label><br>
                                    <input disabled type="radio" name="paymethod">
                                    <label for="other">Documentary Credit</label>
                        <ul class="">
                            <li class="list-inline-item">

                                 <img src="{{asset('source/images/pay2.png')}}" alt="">
                            </li>
                            <li class="list-inline-item">
                                <img src="{{asset('source/images/pay5.png')}}" alt="">
                            </li>
                            <li class="list-inline-item">
                                <img src="{{asset('source/images/pay3.png')}}" alt="">
                            </li>
                            <li class="list-inline-item">
                                <img src="{{asset('source/images/pay7.png')}}" alt="">
                            </li>
                            <li class="list-inline-item">
                                <img src="{{asset('source/images/pay8.png')}}" alt="">
                            </li>
                            <li class="list-inline-item ">
                                <img src="{{asset('source/images/pay9.png')}}" alt="">
                            </li>
                        </ul>
                                </li>
                            </ul>
                        </div>
                       
                        <div style="padding-left: 123px" class="col-md-8 address_form">
                            @if(count($errors)>0)
							<div class="alert alert-danger">
								@foreach($errors->all() as $err)								
								  {{$err}}<br>								
								@endforeach
							</div>						  
                          @endif
                          @if(session('mess'))

                            <div class="alert alert-success">{{session('mess')}}</div>
                            <h3><a href="{{route('listShirt')}}">Tiếp tục mua hàng</a></h3>
                            <h3><a href="{{route('order_customer')}}"></a></h3>
                        @else
                            <h4>Chi tiết đặt hàng</h4>
                        <form action="{{route('postpayment')}}" method="post" class="creditly-card-form shopf-sear-headinfo_form">
                            {{ @csrf_field() }}    
                            <div class="creditly-wrapper wrapper">
                                    <div class="information-wrapper">
                                        <div class="first-row form-group">
                                            <div class="controls">
                                                <label class="control-label">Họ tên người nhận: </label>
                                                <input required class="billing-address-name form-control" type="text" name="name_ship"
                                                    placeholder="Full name">
                                            </div>
                                            <div class="card_number_grids">
                                                <div class="card_number_grid_left">
                                                    <div class="controls">
                                                        <label class="control-label">Số điện thoại:</label>
                                                        <input required class="form-control" name="sdt_ship" type="text" placeholder="Mobile number">
                                                    </div>
                                                </div>
                                                <div class="card_number_grid_right">
                                                    <div class="controls">
                                                        <label class="control-label">Địa chỉ nhận hàng: </label>
                                                        <textarea required class="form-control" name="address_ship" type="text" placeholder="Địa chỉ nhận"></textarea>
                                                    </div>
                                                </div>
                                              
                                            </div>
                                           
                                            <div class="controls">
                                                <label class="control-label">Ghi chú: </label>
                                                <textarea name="note_ship"  class="form-control" type="text" placeholder="Những yêu cầu khác của bạn..."></textarea>
                                            </div>
                                        </div>
                                        @if(Session::has('Cart')!=null)
                                        <button type="submit" class="submit check_out btn btn-info">Đặt hàng</button>
                                        @else 
                                        <button disabled="true" type="button" class="btn btn-secondary">Đặt hàng</button>
                                        @endif
                                    </div>
                                </div>
                            </form>
                   
                        </div>
                       @endif
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
@endsection