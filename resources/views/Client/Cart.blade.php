@if(Session::has('Cart')!=null)

<div class="modal-body">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Ảnh</th>
                <th>Product name</th>
                <th>Price</th>
                <th>Số Lượng</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody>
            @foreach(Session::get('Cart')->products as $item)
            <tr>
                <th><img style="width: 50px; height: 50px;" src="/source/images-shirt/{{$item['productInfo']->image}}" alt=""></th>
                <td>{{$item['productInfo']->name}}</td>
                <td>{{number_format($item['productInfo']->price_sell)}}</td>
                <td>{{$item['quanty']}}</td>
                <td class="parDelete">
                    <i id="xoaitemon" data-id="{{$item['productInfo']->id_shirt}}" class="fas fa-times"></i>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div style="display: flex;">
        <span>Total Money: </span>
        <span>{{number_format(Session::get('Cart')->totalPrice)}}</span>
        <input hidden id="total-quanty-cart"  type="number" value="{{Session::get('Cart')->totalQuanty}}">
    </div>
</div>

@endif
