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
<form action="addNcc" method="post" class="form-horizontal">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<h3>Thêm mới nhà cung cấp</h3>
    <div class="form-group">
        <label class="control-label col-sm-2" for="">Tên: </label>
        
         <input name="ten" type="" class="form-control" id="" placeholder="Điền tên nhà cung cấp">
        
  </div>

  <div class="form-group">
        <label class="control-label col-sm-2" for="">Địa chỉ:</label>
        
         <input name="diachi" type="text" class="form-control" id="" placeholder="Điền địa chỉ">
        
  </div>

  
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    
      <input name="email" type="email" class="form-control" id="email" placeholder="Điền email">
    
  </div>

  
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Phone:</label>
    
      <input name="sdt" type="text" class="form-control" id="email" placeholder="Điền số điện thoại">
    
  </div>
 
<div style="display: flex;">
<div class="form-group"> 
    
    <button type="submit" class="btn btn-success">Tạo mới</button>
  
</div>
<div class="form-group"> 

    <a href="{{route('listNcc')}}" class="btn btn-info">Quay lại</a>

</div>
</div>
 
</form>
</div>
@endsection