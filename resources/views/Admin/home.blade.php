@extends('Admin.app')
@section('content')
<div class="">
    <div class="row" style="display: inline-block;">
    <div class="top_tiles">
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
        <div class="tile-stats">
          <div class="icon"><i style="font-size: 40px; color:#98FB98" class="fa fa-list"></i></div>
        <div class="count">{{$count_shirt}}</div>
        <span style="font-size: 23px">Sản phẩm</span>
          <p><i><a href="#">Tổng số sản phẩm</a></i></p>
        </div>
      </div>
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
        <div class="tile-stats">
          <div class="icon"><i style="font-size: 40px; color:#00CED1"class="fa fa-shopping-cart"></i></div>
        <div style="color: red" class="count">{{$count_order}}</div>
        <span style="font-size: 23px">Đơn đặt</span>
        <p><i><a href="{{route('listOrderConfirmed')}}">{{$count_order}} đơn cần duyệt</a></i></p>
        </div>
      </div>
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
        <div class="tile-stats">
          <div class="icon"><i style="font-size: 40px; color:#FF69B4"class="fa fa-edit"></i></div>
        <div class="count">{{$count_import_order}}</div>
        <span style="font-size: 23px">Đơn nhập</span>
        <p><i><a href="{{route('listIO')}}">Số đơn nhập hàng </a></i></p>
        </div>
      </div>
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
        <div style="width:130px" class="tile-stats">
          <div class="icon"><i style="font-size: 40px; color:chartreuse " class="fa fa-male"></i></div>
        <div class="count">{{$count_customer}}</div>
          <span style="font-size: 23px">Khách hàng</span>
        <p><i><a href="{{route('listCus')}}">Khách hàng</a></i></p>
        </div>
      </div>
    </div>
</div>

    <div class="row">
      <div class="col-md-12">
        <div id="container" data-order="{{ $orderYear }}"></div>
        {{-- @if(Session('thongke')!=null) --}}
        
        {{-- @else  --}}
        <div class="x_panel">
            <div class="x_title">
                <h2>Chọn thống kê<small>theo thời gian</small></h2>
                <form>
                  <input type="date" name="times" style="float: left;background: #fff; cursor: pointer; margin-left: 310px; padding: 5px 10px; border: 1px solid #ccc">
                  {{-- <input type="text" name="te" value="4"> --}}
                  <button type="button" style="border: 1px solid red;height: 33px;" class="btn" id="btnXemThongKe">Xem</button>
                </form>
                <div class="clearfix"></div>
              </div>
          <div class="x_content">
            <div class="col-md-9 col-sm-12 ">
              
              <div class="tiles">
                <div class="col-md-4 tile">
                  <span>dd/mm/YY</span>
                  <h2 id="ngaythongke"></h2>
                  <span class="sparkline11 graph" style="height: 160px;"><canvas width="198" height="40" style="display: inline-block; width: 198px; height: 40px; vertical-align: top;"></canvas></span>
                </div>
                <div class="col-md-4 tile">
                  <span>Đơn đã thanh toán</span>
                <h2 id="sodonhang"></h2>
                  <span class="sparkline11 graph" style="height: 160px;"><canvas width="198" height="40" style="display: inline-block; width: 198px; height: 40px; vertical-align: top;"></canvas></span>
                </div>
                <div class="col-md-4 tile">
                  <span>Doanh thu</span>
                  <h2 id="doanhthu"> </h2>
                  <span class="sparkline22 graph" style="height: 160px;"><canvas width="200" height="40" style="display: inline-block; width: 200px; height: 40px; vertical-align: top;"></canvas></span>
                </div>
                
              </div>
        
            </div>
        
            <div class="col-md-3 col-sm-12 ">
              
            </div>
        
          </div>
          {{-- @endif --}}
      </div>
    </div>



    <div class="row">
      <div class="col-md-12">
        
      </div>
    </div>



    <div class="row">
      <div class="col-md-4">
        <div class="x_panel">
          <div class="x_title">
            <h2>Top Nhà cung cấp<small></small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              
             
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content" style="display: block;">
            @foreach($ncc as $n)
            <article class="media event">
              <div class="media-body">
              <a class="title" href="#">{{$n->name}}</a>
              <p>Tổng cung: {{$n->SLSP}}</p>
              </div>
            </article>
            @endforeach
            {{-- <article class="media event">
             
                <div class="media-body">
                  <a class="title" href="#">Quốc Hùng</a>
                  <p>Địa chỉ: Đống Đa, Hà Nội</p>
                </div>
              </article> --}}
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="x_panel">
          <div class="x_title">
            <h2>Top Khách hàng<small></small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
             
              
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            @foreach($slgd as $s)
            <article class="media event">
              
              <div class="media-body">
                <a class="title" href="#">{{$s->name}}</a>
              <p>Số lượng giao dịch: {{$s->soluonggd}}</p>
              </div>
            </article>
            @endforeach
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="x_panel">
          <div class="x_title">
            <h2>Top Sản phẩm<small></small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              
              
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            @foreach($top_shirt as $ts)
            <article class="media event">
                <a style="margin-top: 3px;margin-bottom: 3px" class="pull-left">
                <img src="/source/images-shirt/{{$ts->image}}" style="width:50px" alt="">
                  </a>
              <div style="margin-left: 19px;" class="media-body">
              <a class="title" href="#">{{$ts->name}}</a>
              <p>{{number_format($ts->price_sell)}} VNĐ</p>
              </div>
            </article>
           @endforeach
           
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function(){
    var order = $('#container').data('order');
    var listOfValue = [];
    var listOfYear = [];
    order.forEach(function(element){
        listOfYear.push(element.getYear);
        listOfValue.push(element.value);
    });
    console.log(listOfValue);
    var chart = Highcharts.chart('container', {

        title: {
            text: 'Doanh thu theo tháng'
        },

        subtitle: {
            text: '2020'
        },

        xAxis: {
            categories: listOfYear,
        },

        series: [{
            type: 'column',
            colorByPoint: true,
            data: listOfValue,
            showInLegend: false
        }]
    });
    
    $('#plain').click(function () {
        chart.update({
            chart: {
                inverted: false,
                polar: false
            },
            subtitle: {
                text: 'Plain'
            }
        });
    });

    $('#inverted').click(function () {
        chart.update({
            chart: {
                inverted: true,
                polar: false
            },
            subtitle: {
                text: 'Inverted'
            }
        });
    });

    $('#polar').click(function () {
        chart.update({
            chart: {
                inverted: false,
                polar: true
            },
            subtitle: {
                text: 'Polar'
            }
        });
    });

    //Click xem thong ke
    $('#btnXemThongKe').on('click', function(e) {
      e.preventDefault();
      var times = $("input[name='times']").val();
      var url_thongke = "{!! route('admin.thongke') !!}";
      $.ajax({
        url: url_thongke,
        type: 'POST',
        dataType: 'json',
        data: {
          "_token": "{{ csrf_token() }}",
          times: times
        },
        success: function(res) {
          if(res.status) {
            $('#ngaythongke').text(res.ngay);
            $('#doanhthu').text(res.tongtien);
            $('#sodonhang').text(res.tongdon);
          }
        },
        error: function(err) {
          console.log(err);
        }
      });
    });
});

  </script>
@endsection
