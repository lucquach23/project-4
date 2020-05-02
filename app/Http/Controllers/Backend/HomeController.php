<?php

namespace App\Http\Controllers;
use App\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    // public function index()
    // {
    // 	$data = array('id' => 1,
    // 					'name'=>'duc' );
    // 	return view('Home.index',$data);
    // }

    public function index()
    {
    	// $pr = new Product();

     //    $pr->tensp="sp2";
     //    $pr->mota="mota2";

     //   $tm= $pr->save();
    	//  $tb='';
     //     if($tm) $tb='thanhcong';
     //     else $tb="that bai";
     //     return $tb;
    	//return view('Home.index');
        return view('homeAdmin.index');
    }
}
