<?php
namespace App\Http\Controllers\Backend;

use App\Model\Account as AppAccount;
use App\Model\Account;
//use DB;
use Session;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

class HomeAdminController extends Controller
{
    public function home()
    {
      $orderYear=DB::table('gettk')->get();
      $count_shirt=DB::table('shirt')->count('id_shirt');
      $count_order=DB::table('_order')->where('status',1)->count('id_order');
      $count_import_order=DB::table('import_order')->count('id_import_order');
      $count_customer=DB::table('customer')->count('id_customer');
      $ncc=DB::table('slcc')->get();
      $slgd=DB::table('slgd2')->get();
      $top_shirt=DB::table('gettop5shirt')->get();
      return  view('Admin.home',['orderYear'=>$orderYear,'top_shirt'=>$top_shirt,'slgd'=>$slgd,'ncc'=>$ncc,'count_customer'=>$count_customer,'count_import_order'=>$count_import_order,'count_order'=>$count_order,'count_shirt'=>$count_shirt]);
    }
   public function thongke(Request $req)
   {
        $od=DB::table('_order')->where('date_order',$req->times)->where('status',4)->get();
        $tongdon=$od->count();
        $tongtien=0;
        foreach($od as $o)
        {
          $tongtien+=$o->total_money;
        }
        return response()->json([
          'ngay' =>  date('d/m/Y',strtotime($req->times)),
          'tongtien' => number_format($tongtien) . " VNĐ",
          'tongdon'=>$tongdon,
          'status' => true
        ]);
   }
   
}