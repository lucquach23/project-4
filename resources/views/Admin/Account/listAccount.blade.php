@extends('Admin.app')
@section('content')
<div class="col-md-12 col-sm-12 ">
  <div class="x_panel">
    <div class="x_title">
      <div class="container">
        <div class="row">
          <h2 class="col-sm-4">DANH SÁCH TÀI KHOẢN</h2>
          <div class="col-sm-4"><a href="addAccount" type="button" class="btn btn-info">THÊM MỚI</a></div>
        </div>
        @if(session('mess'))

        <div class="alert alert-success">{{session('mess')}}</div>

        @endif

        <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action" style="width:100%">
          <thead>
            <tr>

              <th>ID Account</th>
              <th>Username</th>
              <th>Password</th>
              <th>Họ Tên</th>
              <th>Email</th>
              <th>Quyền</th>
              <th>Delete</th>
              <th>Edit</th>
            </tr>
          </thead>


          <tbody>
            @foreach($account as $r)
            <tr>

              <td>{{$r->id}}</td>
              <td>{{$r->user_name }}</td>
              <td>{{$r->password }}</td>
              <td>{{$r->name_of_user }}</td>
              <td>{{$r->email }}</td>
              <td>{{($r->role)==1?'admin':'user'}}</td>
              <th>
              
              <a href="delete/{{$r->id}}" style="color: red; font-size:26px;" class="fa fa-remove"
                aria-hidden="true">
              </a>
             
            </th>
              <th><a href="edit/{{$r->id}}" style="color: green; font-size:26px;" class="fa fa-wrench"
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