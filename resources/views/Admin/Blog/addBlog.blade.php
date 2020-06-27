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
<form action="addBlog" method="post" class="form-horizontal">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<h3>Thêm mới Blog</h3>
    <div class="form-group">
        <label class="control-label col-sm-2" for="">Tiêu đề: </label>
        
         <input name="title" type="" class="form-control" id="" placeholder="Điền tiêu đề...">
        
  </div>

  <div style="width: 759px;" class="form-group">
    Nội dung
    <textarea id="ckeditor1"  style="resize: none;position: relative;" rows="3" name="content"  class="form-control col-lg-12"  ></textarea> 
</div>

 

<div class="form-group">
    <label class="control-label col-sm-4" for="">Ảnh </label>
  
     <input name="image" type="file">
 
</div>
<div style="display: flex;">
<div class="form-group"> 
    
    <button type="submit" class="btn btn-success">Tạo mới</button>
  
</div>
<div class="form-group"> 

    <a href="{{route('listBlog')}}" class="btn btn-info">Quay lại</a>

</div>
</div>
 
</form>
</div>
@endsection