@extends('LayoutsAdmin.app')
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
<h3>Thêm tài khoản</h3>
    <div class="form-group">
        <label class="control-label col-sm-2" for="">Tên đăng nhập:</label>
        
         <input name="tendangnhap" type="" class="form-control" id="" placeholder="Điền tên đăng nhập">
        
  </div>

  <div class="form-group">
        <label class="control-label col-sm-2" for="">Mật khẩu:</label>
        
         <input name="matkhau" type="password" class="form-control" id="" placeholder="Điền mật khẩu">
        
  </div>

  <div class="form-group">
        <label class="control-label col-sm-2" for="">Họ tên:</label>
      
         <input name="hoten" type="" class="form-control" id="" placeholder="Điền tên người sử dụng">
     
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    
      <input name="email" type="email" class="form-control" id="email" placeholder="Điền email">
    
  </div>

  
  <div class="form-group">
    <label class="control-label col-sm-2" for="">Quyền :</label>
   
    <select name="quyen" style="width: 127px;" class="form-control" id="">
        <option>0</option>
      <option>1</option>
      
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
@endsection