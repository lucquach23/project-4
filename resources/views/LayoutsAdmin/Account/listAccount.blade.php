@extends('LayoutsAdmin.app')
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
  <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Add Account</button>
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>This is a large modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div> -->
                 
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
                            <!-- <a href="delete/{{$r->id}}" style="color: red" class="fa fa-times" aria-hidden="true"></a> -->
                            <form action="delete/{{$r->id}}" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <button style="font-size: 14px;height: 30px;" type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                              Xoá
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Xoá bản ghi?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    Bạn muốn xoá bản ghi này?
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button  type="submit" class="btn btn-primary">Yes</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                            </form>
                          </th>
                          <th><a href="edit/{{$r->id}}" style="color: green; font-size:26px;" class="fa fa-wrench" aria-hidden="true"></a></th>
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