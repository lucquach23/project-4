@extends('Admin.app')
@section('content')
<div class="col-md-12 col-sm-12 ">
  <div class="x_panel">
    <div class="x_title">
      <div class="container">
        <div class="row">
          <h2 class="col-sm-4">DANH SÁCH NHÀ ĐƠN NHẬP HÀNG</h2>
        <div class="col-sm-4"><a href="{{route('addIO')}}" type="button" class="btn btn-info">THÊM MỚI</a></div>
        </div>
        @if(session('mess'))

        <div class="alert alert-success">{{session('mess')}}</div>

        @endif

        <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action" style="width:100%">
          <thead>
            <tr>
              <th>Mã IO</th>
              <th>Nhà cung cấp</th>
              <th>Ngày tạo</th>            
              <th>Tổng nhập</th>
              <th>Tổng tiền</th>
              <th>Xem chi tiết</th>
              <th>Thêm sản phẩm</th>
              <th>Delete</th>
              <th>Edit</th>
            </tr>
          </thead>
          <tbody>
            @foreach($io as $r)
            <tr>

              <td>{{$r->id_import_order}}</td>
              <td>{{$r->name }}</td>
              <td>{{$r->create_date }}</td>
              <td>{{$r->quantity }}</td>
              <td>{{number_format($r->total_money) }}</td>
              <th>
                <a href="viewDetailIO/{{$r->id_import_order}}" style="color:darkorange; font-size:26px;" class="fa fa-eye"
                    aria-hidden="true">
              </th>
              <th>
                <a href="addProduct_of_IO/{{$r->id_import_order}}" style="color:blue; font-size:26px;" class="fa fa-arrow-right"
                    aria-hidden="true">
              </th>
              </th>
              
              <th>
              
                <a href="delete/{{$r->id_import_order}}" style="color: red; font-size:26px;" class="fa fa-remove"
                  aria-hidden="true">
                </a>
               
              </th>
              <th><a href="edit/{{$r->id_import_order}}" style="color: green; font-size:26px;" class="fa fa-wrench"
                  aria-hidden="true"></a></th>
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