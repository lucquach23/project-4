<?php

namespace App\Http\Controllers\Frontend;



use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use App\Shirt as AppShirt;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\View;

class ShirtController extends Controller
{
    public function listShirt()
    {
        $listShirt=DB::table('shirt')->paginate(16);
        return view('Client.listShirt',compact('listShirt'));
    }
    public function typeShirt($id)
    {
       
        $listShirt=DB::table('shirt')->where('id_category_shirt',$id)->paginate(16);
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
}
