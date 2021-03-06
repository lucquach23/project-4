@extends('Admin.app')
@section('content')
<div style="width:500px;" class="container">
<div class="row">
@if(count($errors)>0)

  <div class="alert alert-danger">
      @foreach($errors->all() as $err)
      
        {{$err}}<br>
      
      @endforeach
  </div>

@endif
@if(session('mess'))

  <div class="alert alert-success">{{session('mess')}}</div>

@endif
</div>
<form action="addAccount" method="post" class="form-horizontal">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<h3>Thêm đơn nhập</h3>
   
  <div class="form-group">
    <label class="control-label col-sm-2" for="">Chọn nhà cung cấp :</label>
   
    <select name="quyen" style="width: 160px;" class="form-control">
        <option value="0">0 - Nhân viên</option>
      <option value="1">1 - Admin</option>
      
    </select>
   
  </div>
 
<div style="display: flex;">
<div class="form-group"> 
    
    <button type="submit" class="btn btn-success">Tạo mới</button>
  
</div>
<div class="form-group"> 

    <a href="list" class="btn btn-info">Quay lại</a>

</div>
</div>
 
</form>
</div>
<style>
  input,select{
    font-family: serif;
  }
</style>
@endsection