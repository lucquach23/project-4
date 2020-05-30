@extends('Client.master')
@section('content')
<div class="ibanner_w3 pt-sm-5 pt-3">
    <h4 class="head_agileinfo text-center text-capitalize text-center pt-5">
        <span>f</span>ashion
        <span>Lu-Shirt</span></h4>
</div>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="/">Home</a>
        </li>

        <li class="breadcrumb-item active" aria-current="page">
            <a href="#">Your Cart</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
            <a href="#">Change Info</a>
        </li>
    </ol>
</nav>
<div style="width: 600px;" class="container">
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
    <form class="form-horizontal" method="post" action="/changeInfo/{{$info->id_customer}}">
        {{@csrf_field()}}
        <div class="form-group">
            <label class="control-label col-sm-6" for="email">Tài khoản :</label>
            <div class="col-sm-10">
                <input disabled type="text" class="form-control"  value="{{$info->username}}">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Họ tên :</label>
            <div class="col-sm-10">
                <input  type="text" class="form-control" name="hoten" value="{{$info->name}}">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Địa chỉ:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="diachi" value="{{$info->address}}">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Email:</label>
            <div class="col-sm-10">
                <input  type="email" class="form-control" name="email" value="{{$info->email}}">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-6" >Số điện thoại:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="sdt" value="{{$info->phone}}">
            </div>
        </div>
       
        <div class="form-group">
            <label class="control-label col-sm-6" for="pwd">Mật khẩu mới:</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="mk1" placeholder="Enter password">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-6" for="pwd">Nhập lại mật khẩu mới:</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="mk2" placeholder="Enter password">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-outline-success">Submit</button>
            </div>
        </div>
    </form>
</div>

@endsection