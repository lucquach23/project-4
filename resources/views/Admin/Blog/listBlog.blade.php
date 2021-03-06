@extends('Admin.app')
@section('content')
<div class="col-md-12 col-sm-12 ">
  <div class="x_panel">
    <div class="x_title">
      <div class="container">
        <div class="row">
          <h2 class="col-sm-4">DANH SÁCH BLOG</h2>
          <div class="col-sm-4"><a href="addBlog" type="button" class="btn btn-info">THÊM MỚI</a></div>
        </div>
        @if(session('mess'))

        <div class="alert alert-success">{{session('mess')}}</div>

        @endif

        <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action" style="width:100%">
          <thead>
            <tr>
              <th>ID Blog</th>
              <th>Title</th>
              <th>Nội dung</th>            
              <th>Ảnh</th>
              <th>Delete</th>
              <th>Edit</th>
            </tr>
          </thead>
          <tbody>
            @foreach($ncc as $r)
            <tr>

              <td>{{$r->id_blog}}</td>
              <td>{{$r->title }}</td>
              <td style="text-overflow:ellipsis">{{$r->content }}</td>
              <td><img style="width: 50px" src="/source/images-shirt/{{$r->image}}" alt=""></td>
              
              
              <th>
              
                <a onclick="return confirm('Bạn có chắc chắn xoá blog này?');" href="delete/{{$r->id_blog}}" style="color: red; font-size:26px;" class="fa fa-remove"
                  aria-hidden="true">
                </a>
               
              </th>
              <th><a  href="edit/{{$r->id_blog}}" style="color: green; font-size:26px;" class="fa fa-wrench"
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