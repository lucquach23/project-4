@extends('Admin.planlogin')
@section('body')


<form action="{{ route('postLogin') }}" method="post">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<div  style="box-shadow: 5px 10px 8px 10px #888888" class="login-box">
  <div class="login-logo">
    <a href="#"><b >ĐĂNG NHẬP QUẢN TRỊ</a>
  </div>

  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

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
        <div class="input-group mb-3">
          <input name="un"  class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="pw" type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <div class="col-4">
          
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
        </div>
 </div>
</div>
</form>
@stop