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
<form action="{{$blog->id_blog}}" method="post" class="form-horizontal">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<h3>Sửa thông Blog</h3>
    <div class="form-group">
        <label class="control-label col-sm-2" for="">Tiêu đề :</label>
       
         <input value="{{$blog->title}}" name="title" type="text" class="form-control" id="" placeholder="Điền tên tên nhà cung cấp">
        
  </div>

  <div style="width: 759px;" class="form-group">
    Nội dung
  <textarea id="ckeditor1"  style="resize: none;position: relative;" rows="3" name="content"  class="form-control col-lg-12"  >{{$blog->content}}</textarea> 
</div>
{{--  --}}
 

<div class="form-group">
    <label class="control-label col-sm-4" for="">Ảnh </label>
  
     <input name="image" type="file">
 
</div>
<div style="display: flex;">
<div class="form-group"> 
    
    <button type="submit" class="btn btn-success">Sửa</button>
  
</div>
<div class="form-group"> 

    <a href="{{route('listBlog')}}" class="btn btn-info">Quay lại</a>

</div>
</div>
 
</form>
</div>
@endsection