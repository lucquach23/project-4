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
        {{-- action="/postAddPro_of_IO/{{$id}}" --}}
    </div>
    <form action="{{$io->id_import_order}}" method="post" class="form-horizontal">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <h3>Thêm sản phẩm</h3>
        <div style="display: flex;width: 544px;" class="form-group">
            <div>
                <label style="    width: 83px;" class="control-label ">Mã đơn nhập:</label>
                <input style="width: 50px" name="madonnhap" type="" class="form-control"
                    value="{{$io->id_import_order}}">
            </div>
            <div style="margin-right: 50px;margin-left: 50px">
                <label class="control-label col-sm-8" for="">Nhà cung cấp</label>      
                <select name="ncc" style="width: 160px;" class="form-control">
                    @foreach($sup as $s)
                    <option value="{{$s->id}}">{{$s->name}}</option>
                    @endforeach
                </select>   
            </div>
            <div>
                <label class="control-label ">Ngày:</label>
                <input name="ngay" type="" class="form-control" value="{{$io->create_date}}">
            </div>
            <div>
                <label class="control-label ">Seri:</label>
                <input name="seri" type="" class="form-control" value="{{$seri}}">
            </div>
        </div>

       
        <div class="form-group">
            <label class="control-label col-sm-4" >Tên áo:</label>
             <input name="tenao" type="" class="form-control"   placeholder="Tên áo...">       
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="">Loại áo :</label>      
        <select name="loaiao" style="width: 160px;" class="form-control">
            @foreach($loai as $l)
            <option value="{{$l->id_category_shirt}}">{{$l->id_category_shirt}} - {{$l->description}}</option>
            @endforeach
        </select>      
    </div>
      <div class="form-group">
        <label class="control-label col-sm-4" >Mô tả:</label>
        <textarea name="mota" type="" class="form-control"   placeholder="Mô tả về áo..."></textarea>       
      </div>
    
      <div class="form-group">
            <label class="control-label col-sm-4" for="">Ảnh </label>
          
             <input name="anh" type="file">
         
      </div>
    
      <div  class="form-group">
        <label class="control-label col-sm-2" for="email">Size:</label>
        <select name="size" style="width: 160px;" class="form-control">           
            <option value="S">S</option>
            <option value="XS">XS</option>
            <option value="L">L</option>
            <option value="M">M</option>
            <option value="XL">XL</option>
            <option value="XXL">XXL</option>
            <option value="XXXL">XXXL</option>           
        </select>          
      </div>
      <div  class="form-group">
        <label class="control-label col-sm-2" for="email">Chất Liệu:</label>
        <select name="chatlieu" style="width: 160px;" class="form-control">           
            <option value="Voan">Voan</option>
            <option value="Lanh">Lanh</option>
            <option value="Kaki">Kaki</option>
            <option value="Bamboo">Bamboo</option>
            <option value="Thô">Thô</option>
            <option value="Cotton">Cotton</option>
            <option value="Jeans">Jeans</option>           
        </select>          
      </div>
      
      <div class="form-group">
        <label class="control-label col-sm-4" >Giá nhập:</label>
        <input name="gianhap" type="" class="form-control"   placeholder="Giá nhập của áo..."></input>       
      </div>
      <div class="form-group">
        <label class="control-label col-sm-4" >Giá bán:</label>
        <input name="giaban" type="" class="form-control"   placeholder="Giá nhập của áo..."></input>       
      </div>
      <div class="form-group">
        <label class="control-label col-sm-4" >Trạng thái:</label>
        <select name="trangthai" style="width: 160px;" class="form-control">           
            <option value="0">Ẩn</option>
            <option value="1">Hiện</option>       
        </select>        
      </div>


        <div style="display: flex;">
            <div class="form-group">

                <button type="submit" class="btn btn-success">Tạo mới</button>

            </div>
            <div class="form-group">

                <a href="{{route('listIO')}}" class="btn btn-info">Quay lại</a>

            </div>
        </div>

    </form>
</div>








<style>
    input,
    select,textarea {
        font-family: serif;
    }
</style>
@endsection