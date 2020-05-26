@extends('Client.master')
@section('content')
<section class="tabs_pro py-md-5 pt-sm-3 pb-5">
    <h5 class="head_agileinfo text-center text-capitalize pb-5">
        <span>Đơn hàng của bạn</span></h5>
    <div class="tabs tabs-style-line pt-md-5">
        <nav class="container">
            <ul id="clothing-nav" class="nav nav-tabs tabs-style-line" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#women" id="women-tab" role="tab" data-toggle="tab" aria-controls="women" aria-expanded="true">Đã đặt</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#men" role="tab" id="men-tab" data-toggle="tab" aria-controls="men">Đang giao
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#girl" role="tab" id="girl-tab" data-toggle="tab" aria-controls="girl">Đã thanh toán</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#boy" role="tab" id="boy-tab" data-toggle="tab" aria-controls="boy">Đã huỷ</a>
                </li>
            </ul>
        </nav>
        <!-- Content Panel -->
        <div id="clothing-nav-content" class="tab-content py-sm-5">
            <div role="tabpanel" class="tab-pane fade show active" id="women" aria-labelledby="women-tab">
                <div id="owl-demo" class="owl-carousel text-center">
                    <table style="width: 1000px;" class="table">
                        <thead>
                            <tr>
                                <th>Mã đơn hàng</th>
                                <th>Ngày đặt</th>
                                <th>Tổng tiền</th>
                                <th>Ghi chú</th>
                                <th>Chi tiết</th>
                                <th>Huỷ đơn</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ord_cus as $i)
                            <tr>
                            <td>{{$i->id_order}}</td>
                            <td>{{$i->date_order}}</td>
                            <td>{{number_format($i->total_money)}}</td>
                            <td>{{$i->notes}}</td>
                            <td>   
                          
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Mã SP</th>
                                        <th>Ảnh</th>
                                        <th>Số lượng</th>
                                        <th>Giá</th>
                                        <th>Size</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($i->order as $or)
                                    <tr>
                                    <td>{{$or->id_shirt}}</td>
                                    <td><img style="width: 50px" src="/source/images-shirt/{{$or->image}}" alt=""></td>
                                    <td>{{$or->quantity}}</td>
                                    <td>{{$or->price}}</td>
                                    <td>{{$or->size}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                                      
                                </td>
                            <td><a href="/distroy_order_cus/{{$i->id_order}}" class="fa fa-times"></a></td>
                            </tr>
                                  @endforeach    
                        </tbody>
                    </table>
                </div>
            </div>

            <div role="tabpanel" class="tab-pane fade" id="men" aria-labelledby="men-tab">
                <div id="owl-demo1" class="owl-carousel text-center">
                    <div>đơn hàng đang giao</div>
                </div>
            </div>

            <div role="tabpanel" class="tab-pane fade" id="girl" aria-labelledby="girl-tab">
                <div id="owl-demo2" class="owl-carousel text-center">
                    <div>đơn hàng đã thanh toán</div>
                </div>
            </div>

            <div role="tabpanel" class="tab-pane fade" id="boy" aria-labelledby="boy-tab">
                <div id="owl-demo3" class="owl-carousel text-center">
                    <table style="width: 1100px;" >
                        <thead>
                            <tr>
                                <th>Mã đơn hàng</th>
                                <th>Ngày đặt</th>
                                <th>Tổng tiền</th>
                                <th>Ghi chú</th>
                                <th>Chi tiết</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ordis as $i)
                            <tr>
                            <td>{{$i->id_order}}</td>
                            <td>{{$i->date_order}}</td>
                            <td>{{number_format($i->total_money)}}</td>
                            <td>{{$i->notes}}</td>
                            <td>   
                          
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Mã SP</th>
                                        <th>Ảnh</th>
                                        <th>Số lượng</th>
                                        <th>Giá</th>
                                        <th>Size</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($i->order as $or)
                                    <tr>
                                    <td>{{$or->id_shirt}}</td>
                                    <td><img style="width: 50px" src="/source/images-shirt/{{$or->image}}" alt=""></td>
                                    <td>{{$or->quantity}}</td>
                                    <td>{{$or->price}}</td>
                                    <td>{{$or->size}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                                      
                                </td>
                            <td>Đã huỷ</td>
                            </tr>
                                  @endforeach    
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</section>
<script>
$('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
  })
</script>
@endsection