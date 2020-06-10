<?php

namespace App\Http\Controllers\Backend;


use DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


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
}
