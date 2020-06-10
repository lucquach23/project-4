@extends('Admin.app')
@section('content')
<div class="col-md-12 col-sm-12 ">
  <div class="x_panel">
    <div class="x_title">
      <div class="container">
        <div class="row">
          <h2 class="col-sm-8">DANH SÁCH ĐƠN KHÁCH HÀNG ĐÃ ĐẶT</h2>
          {{-- <div class="col-sm-4"><a href="addNcc" type="button" class="btn btn-info">THÊM MỚI</a></div> --}}
        </div>
        @if(session('mess'))

        <div class="alert alert-success">{{session('mess')}}</div>

        @endif

        <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action" style="width:100%">
          <thead>
            <tr>
              <th>Mã đơn hàng</th>
              <th>Khách hàng</th>
              <th>SĐT</th>
              <th>Ngày đặt</th>
              <th>Tổng tiền</th>            
              <th >Ghi chú</th>
              <th>Chi tiết</th>
              <th>Xác thực đơn hàng</th>
              <th>Huỷ</th>
              
            </tr>
          </thead>
          <tbody>
            @foreach($listOrder as $r)
            <tr>

              <td>{{$r->id_order}}</td>
            <td>{{$r->name}}</td>
            <td>{{$r->phone}}</td>
              <td>{{$r->date_order }}</td>
              <td>{{number_format($r->total_money) }}</td>
              <td>{{$r->notes }}</td>
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
                        @foreach($r->viewd as $or)
                        <tr>
                        <td>{{$or->id_shirt}}</td>
                        <td><img style="width: 50px" src="/source/images-shirt/{{$or->image}}" alt=""></td>
                        <td>{{$or->quantity}}</td>
                        <td>{{number_format($or->price)}}</td>
                        <td>{{$or->size}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </td>
              
             
              <td><a href="confirm_order/{{$r->id_order}}" style="color: green; font-size:26px;" class="fa fa-arrow-right"
                  aria-hidden="true"></a>
                </td>
                <td><a href="distroy_order/{{$r->id_order}}" style="color:red; font-size:26px;" class="fa fa-times"
                  aria-hidden="true"></a>
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
</div>

@endsection

@push('scripts')
<script src="{{asset('lib/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('lib/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('lib/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('lib/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
<script src="{{asset('lib/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('lib/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('lib/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('lib/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{asset('lib/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
<script src="{{asset('lib/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('lib/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
<script src="{{asset('lib/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
<script src="{{asset('lib/vendors/jszip/dist/jszip.min.js')}}"></script>
<script src="{{asset('lib/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
<script src="{{asset('lib/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
@endpush