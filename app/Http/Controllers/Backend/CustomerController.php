<?php

namespace App\Http\Controllers\Backend;

//use App\Model\Account as AppAccount;
//use App\Model\Backend\ncc;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\View;

class CustomerController extends Controller
{
   
    public function listCus()
    {
        $cus=DB::table('customer')->get();
        return view('Admin.Customer.listCus',['cus'=>$cus]);
    }
    public function active($id){
        $t=DB::table('customer')->where('id_customer',$id)->update(['status'=>1]);
        if($t)
        {
            return back()->with('mess','Kích hoạt thành công!');
        }
    }
    public function un_active($id){
        $t=DB::table('customer')->where('id_customer',$id)->update(['status'=>0]);
        if($t)
        {
            return back()->with('mess','Vô hiệu hoá thành công!');
        }
    }

}
