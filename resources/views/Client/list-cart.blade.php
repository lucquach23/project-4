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
                <th>Save</th>
                <th>Remove</th>
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
                    <option value="S">S</option>
                    <option value="XS">XS</option>
                    <option value="L">L</option>
                    <option value="M">M</option>
                    <option value="XL">XL</option>
                    <option value="XXL">XXL</option>
                    <option value="XXXL">XXXL</option>
                </select>
                </td>
                
                <td class="invert">{{number_format($item['productInfo']->price_sell)}}</td>
                <td class="invert">{{number_format($item['price'])}}</td>
               
                <td><i id="saveitem" class="fa fa-save" onclick="SaveListItemCart({{$item['productInfo']->id_shirt}});" ></i></td>
                <td class="invert">
                   <i id="deleteitem" class="fa fa-times" onclick="DeleteListItemCart({{$item['productInfo']->id_shirt}});"></i>

                </td>
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
        </ul>
    </div>
  
    <div style="padding-left: 123px" class="col-md-8 address_form">
        {{-- <div>Vui lòng chọn size trước khi tiến hành đặt hàng</div> --}}
        @if(Session::has('Cart')!=null&&Session::has('customer_id'))
        <a  type="button" class="btn btn-primary" href="{{route('getpayment')}}">Tiến hành đặt hàng</a>
    @endif
    @if(Session::has('Cart')!=null&&Session::has('customer_id')==null)
        <a href="{{URL::to('/login-checkout')}}" type="button" class="btn btn-primary">Tiến hành đặt hàng</a>
        @else 
        <button disabled="true" type="button" class="btn btn-secondary">Tiến hành đặt hàng</button>
        @endif
    </div>
</div>
