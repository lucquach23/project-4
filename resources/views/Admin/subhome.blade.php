
@if(Session('thongke')!=null)
<div class="x_panel">
    <div class="x_title">
        <h2>Chọn thống kê<small>theo thời gian</small></h2>
        <form action="thongke" method="get">
          <input type="date" name="times" style="float: left;background: #fff; cursor: pointer; margin-left: 310px; padding: 5px 10px; border: 1px solid #ccc">
          {{-- <input type="text" name="te" value="4"> --}}
          <button type="submit" style="border: 1px solid red;height: 33px;" class="btn">Xem</button>
        </form>
        <div class="clearfix"></div>
      </div>
  <div class="x_content">
    <div class="col-md-9 col-sm-12 ">
      
      <div class="tiles">
        <div class="col-md-4 tile">
          <span>dd/mm/YY</span>
        <h2>{{date('d/m/Y',strtotime($ngay))}}</h2>
          <span class="sparkline11 graph" style="height: 160px;"><canvas width="198" height="40" style="display: inline-block; width: 198px; height: 40px; vertical-align: top;"></canvas></span>
        </div>
        <div class="col-md-4 tile">
          <span>Đơn đã thanh toán</span>
        <h2><a href="{{route('listOrderPaymented')}}">{{$tongdon}}</a></h2>
          <span class="sparkline11 graph" style="height: 160px;"><canvas width="198" height="40" style="display: inline-block; width: 198px; height: 40px; vertical-align: top;"></canvas></span>
        </div>
        <div class="col-md-4 tile">
          <span>Doanh thu</span>
          <h2>{{number_format($tongtien)}} VNĐ</h2>
          <span class="sparkline22 graph" style="height: 160px;"><canvas width="200" height="40" style="display: inline-block; width: 200px; height: 40px; vertical-align: top;"></canvas></span>
        </div>
        
      </div>

    </div>

    <div class="col-md-3 col-sm-12 ">
      
    </div>

  </div>
</div>
@else 
<div class="x_panel">
    <div class="x_title">
        <h2>Chọn thống kê<small>theo thời gian</small></h2>
        <form action="thongke" method="get">
          <input type="date" name="times" style="float: left;background: #fff; cursor: pointer; margin-left: 310px; padding: 5px 10px; border: 1px solid #ccc">
          {{-- <input type="text" name="te" value="4"> --}}
          <button type="submit" style="border: 1px solid red;height: 33px;" class="btn">Xem</button>
        </form>
        <div class="clearfix"></div>
      </div>
  <div class="x_content">
    <div class="col-md-9 col-sm-12 ">
      
      <div class="tiles">
        <div class="col-md-4 tile">
          <span>dd/mm/YY</span>
        <h2></h2>
          <span class="sparkline11 graph" style="height: 160px;"><canvas width="198" height="40" style="display: inline-block; width: 198px; height: 40px; vertical-align: top;"></canvas></span>
        </div>
        <div class="col-md-4 tile">
          <span>Đơn đã thanh toán</span>
        <h2></h2>
          <span class="sparkline11 graph" style="height: 160px;"><canvas width="198" height="40" style="display: inline-block; width: 198px; height: 40px; vertical-align: top;"></canvas></span>
        </div>
        <div class="col-md-4 tile">
          <span>Doanh thu</span>
          <h2> VNĐ</h2>
          <span class="sparkline22 graph" style="height: 160px;"><canvas width="200" height="40" style="display: inline-block; width: 200px; height: 40px; vertical-align: top;"></canvas></span>
        </div>
        
      </div>

    </div>

    <div class="col-md-3 col-sm-12 ">
      
    </div>

  </div>
  @endif