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
<form action="{{$acc->id}}" method="post" class="form-horizontal">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<h3>Sửa thông tin tài khoản</h3>
    <div class="form-group">
        <label class="control-label col-sm-2" for="">Tên đăng nhập:</label>
       
         <input value="{{$acc->user_name}}" name="tendangnhap" type="" class="form-control" id="" placeholder="Điền tên đăng nhập">
        
  </div>

  <div class="form-group">
        <label class="control-label col-sm-2" for="">Mật khẩu:</label>
        
         <input  value="{{$acc->password}}" name="matkhau" type="text" class="form-control" id="" placeholder="Điền mật khẩu">
        
  </div>

  <div class="form-group">
        <label class="control-label col-sm-2" for="">Họ tên:</label>
      
         <input value="{{$acc->name_of_user }}" name="hoten" type="" class="form-control" id="" placeholder="Điền tên người sử dụng">
     
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    
      <input value="{{$acc->email }}" name="email" type="email" class="form-control" id="email" placeholder="Điền email">
    
  </div>

  
  <div class="form-group">
    <label class="control-label col-sm-2" for="">Quyền :</label>
   
    <select name="quyen" style="width: 127px;" class="form-control" id="">
        <option selected="selected">0</option>
      <option>1</option>
      
    </select>
   
  </div>

<div style="display: flex;">
<div class="form-group"> 
    
    <button type="submit" class="btn btn-success">Sửa</button>
  
</div>
<div class="form-group"> 

    <a href="{{route('list')}}" class="btn btn-info">Quay lại</a>

</div>
</div>
 
</form>
</div>
@endsection