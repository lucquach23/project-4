<?php
namespace App\Http\Controllers\Backend;

use App\Model\Account as AppAccount;
use App\Model\Account;
use DB;
use Session;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeAdminController extends Controller
{
    public function home()
    {
        $count_shirt=DB::table('shirt')->count('id_shirt');
       // dd($shirt);
       $count_order=DB::table('_order')->where('status',1)->count('id_order');
       //dd($count_order);
       $count_import_order=DB::table('import_order')->count('id_import_order');
       $count_customer=DB::table('customer')->count('id_customer');
       $ncc=DB::table('slcc')->get();
       //dd($ncc);
       $slgd=DB::table('slgd2')->get();
       $top_shirt=DB::table('gettop5shirt')->get();
      return  view('Admin.home',['top_shirt'=>$top_shirt,'slgd'=>$slgd,'ncc'=>$ncc,'count_customer'=>$count_customer,'count_import_order'=>$count_import_order,'count_order'=>$count_order,'count_shirt'=>$count_shirt]);
    }
   
   
}