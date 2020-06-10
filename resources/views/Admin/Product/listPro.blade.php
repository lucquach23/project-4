@extends('Admin.app')
@section('content')

<div class="col-md-12 col-sm-12 ">
  <div class="x_panel">
    <div class="x_title">
      <div class="container">
        <div class="row">
          <h2 class="col-sm-4">DANH SÁCH SẢN PHẨM</h2>
          @if(Session('allshirt'))
          {{-- <div class="col-sm-4"><a href="{{route('getaddpro')}}" type="button" class="btn btn-info">THÊM MỚI</a></div> --}}
          @else <div></div>
          @endif
        </div>
        @if(session('mess'))

        <div class="alert alert-success">{{session('mess')}}</div>

        @endif
        <table id="datatable-checkbox" class="table table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
              <th>Mã IO</th>
              <th>Tên</th>
              <th>Seri</th>            
              {{-- <th>Mô tả</th> --}}
              <th>Ảnh</th>
              <th>Size</th>
              <th>Chất liệu</th>
              <th>Giá nhập</th>
              <th>Giá bán</th>
              <th>Delete</th>
              <th>Edit</th>
            </tr>
          </thead>
          <tbody>
            @foreach($view as $r)
            <tr>

              <td>{{$r->id_io}}</td>
              <td>{{$r->name }}</td>
              <td>{{$r->seri }}</td>
              {{-- <td>{{$r->description }}</td> --}}
              <td><img style="width: 50px" src="/source/images-shirt/{{$r->image}}"></td>
              <td>{{$r->size}}</td>
              <td>{{$r->fabric_material }}</td>
              <td>{{number_format($r->price_input) }}</td>
              <td>{{number_format($r->price_sell) }}</td>
              <th>
                <i type="button" style="color: red; font-size:26px;" class="fa fa-remove" data-toggle="modal" data-target="#exampleModal">
                 
                </i>
                
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">XOÁ SẢN PHẨM</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        Bạn có chắc muốn xoá sản phẩm này
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-primary"> 
                          <a href="deletePro/{{$r->id_shirt}}" aria-hidden="true">Xoá</a>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                
               
              </th>
              <th><a href="editPro/{{$r->id_shirt}}" style="color: green; font-size:26px;" class="fa fa-wrench"
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
<script>
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
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