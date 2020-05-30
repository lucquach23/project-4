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
    public function listShirt()
    {
        Session::forget('dis');
        Session::forget('mate');
        $listShirt=DB::table('shirt')->paginate(16);
        return view('Client.listShirt',compact('listShirt'));
    }
    public function typeShirt($id)
    {
        Session::forget('mate');
       Session::forget('dis');
        $listShirt=DB::table('shirt')->where('id_category_shirt',$id)->paginate(16);
       // dd($listShirt);
        // print_r($listType);
        // exit;
        return view('Client.listShirt',compact('listShirt'));
    }
    public function ViewDetail($id)
    {
        // echo $id;
        // exit;
        $productCare=DB::table('productcare')->get();
        $viewDetail=DB::table('shirt')->where('id_shirt',$id)->get();
        return view('Client.viewDetail',compact('viewDetail','productCare'));
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
     
       return view('Client.listShirt',compact('listShirt'));
      
    }
}
