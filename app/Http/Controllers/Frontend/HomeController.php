<?php

namespace App\Http\Controllers\Frontend;

//use App\Model\Account as AppAccount;
use App\Model\Slide;
//use App\Model\Category_shirt;
use App\Model\Shirt;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use App\Shirt as AppShirt;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function getIndex()
    {
        $beatyShirt=DB::table('shirt')->limit(4)->orderBy('heart_on_insta', 'desc') ->get();
        $bestSale=DB::table('bestSale') ->get();
        $bestCmt=DB::table('bestCmt') ->get();
        $moinhap=DB::table('moinhap')->get();
        $viewinsta=DB::table('viewinsta')->get();
        // print_r($bestSale);
        // exit;
        $sl=Slide::where('role_display',0)->get();
        $viewsp=Slide::where('role_display',1)->get();

       
        return view('Client.index',['viewinsta'=>$viewinsta,'moinhap'=>$moinhap,'slidee'=>$sl,'viewsp'=>$viewsp,'beatyShirt'=>$beatyShirt,'bestSale'=>$bestSale,'bestCmt'=>$bestCmt]);
    }
}
