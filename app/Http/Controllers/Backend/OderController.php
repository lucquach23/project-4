<?php

namespace App\Http\Controllers\Backend;


use DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;

use Illuminate\Support\Facades\View;

class OderController extends Controller
{
   public function list_order()
   {
    
    $list_order=DB::table('list_order')->get();
    foreach($list_order as $od)
    {
        $dod=DB::table('order_detail')->where('id_order',$od->id_order)->get();
        $od->viewd=$dod;
    }
      return view('Admin.Order.listOrder',['listOrder'=>$list_order]);
   }
   public function confirm_order($id_order)
   {
      // echo $id_order;
      $rs=DB::table('_order')->where('id_order',$id_order)->update(['status'=>2]);
      if($rs)
      {
          return back()->with('mess','Xác thực thành công! Đơn hàng đã chuyển sang đã xác thực');
      }
   }



   public function list_order_confirmed()
   {
    $list_order_shiping=DB::table('list_order_confirmed')->get();
 
    foreach($list_order_shiping as $od)
    {
        $dod=DB::table('order_detail')->where('id_order',$od->id_order)->get();
        $od->viewd=$dod;
    }
      return view('Admin.Order.listOrderConfirmed',['listOrder'=>$list_order_shiping]);
   }
   public function confirmed_to_shiping($id_order)
   {
    $rs=DB::table('_order')->where('id_order',$id_order)->update(['status'=>3]);
    if($rs)
    {
        return back()->with('mess','Xác thực thành công! Đơn hàng đã chuyển sang đang gửi');
    }
   }
   public function list_order_shiping()
   {
    $list_order_paymented=DB::table('list_order_shiping')->get();
   
    foreach($list_order_paymented as $od)
    {
        $dod=DB::table('order_detail')->where('id_order',$od->id_order)->get();
        $od->viewd=$dod;
    }
      return view('Admin.Order.listOrderShiping',['listOrder'=>$list_order_paymented]);
   }
   public function shiping_to_paymented($id_order)
   {
    $rs=DB::table('_order')->where('id_order',$id_order)->update(['status'=>4]);
    if($rs)
    {
        return back()->with('mess','Thành công! Đơn hàng đã chuyển sang đã thanh toán');
    }
   }
   public function list_order_paymented()
   {
    $list_order_paymented=DB::table('list_order_paymented')->get();
   
    foreach($list_order_paymented as $od)
    {
        $dod=DB::table('order_detail')->where('id_order',$od->id_order)->get();
        $od->viewd=$dod;
    }
      return view('Admin.Order.listOrderPaymented',['listOrder'=>$list_order_paymented]);
   }
   public function distroy_order($id_order)
   {
    $rs=DB::table('_order')->where('id_order',$id_order)->update(['status'=>5]);
    if($rs)
    {
        return back()->with('mess','Đã huỷ! Đơn hàng đã chuyển sang trạng thái đã huỷ');
    }
   }
   public function list_order_distroyed()
   {
    $list_order_paymented=DB::table('list_order_distroyed')->get();
   
    foreach($list_order_paymented as $od)
    {
        $dod=DB::table('order_detail')->where('id_order',$od->id_order)->get();
        $od->viewd=$dod;
    }
      return view('Admin.Order.listOrderDistroyed',['listOrder'=>$list_order_paymented]);
   }
   public function print_order($checkout_code)
   {
       //echo $id_order;
       $pdf=\App::make('dompdf.wrapper');
       $pdf->loadHTML($this->print_order_convert($checkout_code));
       return $pdf->stream();
   }
   public function print_order_convert($checkout_code)
   {
       $order=DB::table('_order')->where('id_order',$checkout_code)->first();
       //$cus=DB::table('customer')->where('id_customer',$order->id_customer)->first();
       $order_detail=DB::table('order_detail')->where('id_order',$checkout_code)->get();
       //dd($order,$cus,$order_detail);
       $output='';
       $output.='
        <style>
            body{
                border:1px solid #ccc;
                font-family:DejaVu Sans;
            }
            .table-ling{
                border: 1px solid $000;
                width:400px;
            }
            h1{
                font-size:50px;
            }
            img{
                width:50px;
            }
            .divct{
               margin-left:100px;
               margin-top:100px;
            }
            .div1{
                display:flex;

            }
            .div1-2{
                float:right;
            }
        </style>
       <h1><center>LU-Shirt</center></h1>
       
            <div>
                <div class="div1">
                    <div class="div1-1">
                    -------<i>THÔNG TIN NGƯỜI GỬI</i>-------<br>
                        Họ tên: Quách Văn Lực<br>
                        SĐT: 0337 104 694<br>
                    </div>
                    <div class="div1-2">
                   --------<i>THÔNG TIN NGƯỜI NHẬN</i>--------<br>
                        Họ tên người nhận: '.$order->name_ship.'<br>
                        Địa chỉ nhận: '.$order->address_ship.'<br>
                        SĐT: '.$order->phone_ship.'<br>
                        Ghi chú: '.$order->notes.'<br>
                        Email: '.$order->email_ship.'<br>
                    </div>
                </div>
            </div>
            <div class="divct">
            -----<i>CHI TIẾT ĐƠN HÀNG</i>-----
                <br><br>
                Ngày đặt: '.$order->date_order.'<br>
                
                <table class="table-ling">      
                    <tr>
                    <th>Mã áo</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Size</th>
                    <th>Ảnh</th>
                    </tr>';
            
            
                foreach($order_detail as $q) {
                $output.='
                <td>'.$q->id_shirt.'</td>
                <td>'.$q->quantity.'</td>
                <td>'.number_format($q->price).'</td>
                <td>'.$q->size.'</td>
                <td><img src="source/images-shirt/'.$q->image.'" alt=""></td>
                
                ';
                }
                $output.='</table>
                <br><br>
                <center>TỔNG TIỀN THU HỘ: '.number_format($order->total_money).' VNĐ</center>
            </div>
            







     
        
        ';
    return $output;
   }
}
