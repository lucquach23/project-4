<?php

namespace App\Http\Controllers\Frontend;



use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use App\Shirt as AppShirt;
//use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Session;


use Illuminate\Support\Facades\View;

class ShirtController extends Controller
{
    public function rate($id,Request $req)
    {
        $sl=0;
        if(isset($req->gender))
       {
           $sl=$req->gender;

       }else $sl=0;
       //dd($rate);
        $rate=array();
        $rate['id_customer']=Session('customer_id');
        $rate['id_shirt']=$id;
        $rate['rate']=(int)$sl;
        DB::table('rate_cmt')->insert($rate);
        return back();
    }
    public function cmt($id,Request $req)
    {
        
        $save_cmt=array();
        $save_cmt['id_customer']=Session('customer_id');
        $save_cmt['id_shirt']=$id;
        $save_cmt['cmt']=$req->cmt;
        DB::table('rate_cmt')->insert($save_cmt);
        return back();
    }
    public function listShirt()
    {
        Session::forget('dis');
        Session::forget('mate');
       // Session::forget('search');
        $listShirt=DB::table('shirt')->paginate(16);
        return view('Client.listShirt',compact('listShirt'));
    }
    public function typeShirt($id)
    {
        Session::forget('mate');
       Session::forget('dis');
       Session::forget('search');
        $listShirt=DB::table('shirt')->where('id_category_shirt',$id)->paginate(16);
       // dd($listShirt);
        // print_r($listType);
        // exit;
        return view('Client.listShirt',compact('listShirt'));
    }
    public function ViewDetail($id)
    {
       $cmt=DB::select('call get_cmt(?)', [$id]);
       $count_rate=DB::table('rate_cmt')->where('id_shirt',$id)->whereNotNull('rate')->count();
       $rate=DB::select('call get_tb_rate(?)', [$id]);
       //$rate=(object)$rate[0];
      $tb=0;
      foreach($rate as $r)
      {
        $tb= ROUND($r->tbrate);
      }
      
    
       //($tb);
      
      $productCare= DB::table('shirt')->inRandomOrder()->limit(4)->get();
        $viewDetail=DB::table('shirt')->where('id_shirt',$id)->get();
        $quanti_size=DB::table('quantity_size')->where('id_shirt',$id)->get();
        
        return view('Client.viewDetail',['tbrate'=>$tb,'count_rate'=>$count_rate,'id_shirt'=>$id,'cmt'=>$cmt,'viewDetail'=>$viewDetail,'productCare'=>$productCare,'quanti_size'=>$quanti_size]);
    }
    public function discount(Request $req){
        //$a=(600-(600*20)/100)/100;
       // dd($a);
        if(isset($req->dis))
        {
            $dis=$req->dis;

        }else $dis=1;
        Session::put('dis',$dis);
        $listShirt=DB::select('call discount(?)',[$dis]);
        //dd($listShirt);
        return view('Client.listShirt',compact('listShirt'));
        //dd($dis);
    }
    public function material(Request $req)
    {
         
       if(isset($req->dis))
       {
           $dis=$req->dis;

       }else $dis="";
       Session::put('dis',$dis);
       Session::put('mate',$dis);
       $listShirt=DB::select('call material(?)',[$dis]);
       //dd($listShirt);
       return view('Client.listShirt',compact('listShirt'));
       //dd($dis);
    }
    public function PriceRange(Request $req)
    {
        Session::forget('mate');
        Session::forget('dis');
        //Session::forget('search');
       if(isset($req->dis))
       {
           $dis=$req->dis;

       }else $dis="";
       $arr = explode('-',$dis);
      
       $listShirt=DB::table('shirt')->whereBetween('price_sell',[$arr[0],$arr[1]])->paginate(16);
     
       return view('Client.listShirt',compact('listShirt'));
      
    }
    public function searchcus(Request $req)
    {
        Session::forget('mate');
        Session::forget('dis');
        
      $search=$req->searchcus;
      //dd($search);

       $listShirt=DB::table('shirt')->where('name', 'like', '%' . $search . '%')->paginate(16);
     
       //Session::put('search',$req);
       return view('Client.listShirt',compact('listShirt'));
      
    }
}
