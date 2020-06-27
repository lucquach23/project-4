@extends('Admin.app')
@section('content')
<div class="col-md-12 col-sm-12 ">
  <div class="x_panel">
    <div class="x_title">
      <div class="container">
        <div class="row">
          <h2 class="col-sm-8">DANH SÁCH ĐƠN  HÀNG ĐÃ XÁC THỰC</h2>
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
              <th >Ngày đặt</th>
              <th>Tổng tiền</th>            
              <th >Ghi chú</th>
              <th>Chi tiết</th>
              <th>Trạng thái</th>
              <th>In PDF</th>
              <th>Chuyển đang gửi</th>
              <th>Huỷ</th>
              
            </tr>
          </thead>
          <tbody>
            @foreach($listOrder as $r)
            <tr>

              <td>{{$r->id_order}}</td>
              <td>{{$r->name}}</td>
            <td>{{$r->phone}}</td>
              <td>{{date('d/m/Y',strtotime($r->date_order ))}}</td>
              <td>{{number_format($r->total_money) }}</td>
              <td>{{$r->notes }}</td>
              <td>
                
                  <i style="color: green; font-size:26px;" type="button" class="fa fa-eye" onclick="viewBill({{$r->id_order}})">
                    
                  </i>
  
                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Chi tiết sản phẩm</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
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
                            <tbody id="orderList">
  
                            </tbody>
                          </table>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                
              </td>
              <td>Đã xác thực</td>
              <td><a href="print_order/{{$r->id_order}}" style="font-size: 28px; cursor: pointer;color:red;" class="fa fa-file-pdf-o" aria-hidden="true"></a></td>
              <td><a onclick="return confirm('Bạn có chắc đơn hàng này đang được gửi đi?')" href="confirmed_to_shiping/{{$r->id_order}}" style="color: green; font-size:26px;" class="fa fa-arrow-right"
                  aria-hidden="true"></a>
                </td>
                <td>
                  <a onclick="return confirm('Bạn có chắc chắn muốn huỷ đơn hàng này?')" href="distroy_order/{{$r->id_order}}" style="color:red; font-size:26px;" class="fa fa-times"
                    aria-hidden="true">
                  </a>
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
<script>
  function numberWithCommas(x) {
    var parts = x.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return parts.join(".");
}
  function viewBill(id){
    console.log(id)
    $.get("getOrderById/"+id,null,
function(data,status){
let listOd="";
data.data.forEach(element => {
  listOd+=`<tr>
            <td>${element.id_shirt}</td>
            <td><img style="width: 50px" src="/source/images-shirt/${element.image}" alt=""></td>
            <td>${element.quantity}</td>
            <td>`+numberWithCommas(element.price)+`</td>
            <td>${element.size}</td>
            </tr>`
});
$("#orderList").html(listOd)
});
$('#exampleModal').modal('show');
  }
</script>
@endpush