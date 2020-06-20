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

    public function GetaddNcc()
    {
        return view('Admin.ncc.addNcc');
    }
    public function PostAddNcc(Request $request)
    {
       $this->validate($request,[
           'ten'=>'required|min:4|max:30',
           'diachi'=>'required|min:4|max:20',
           'sdt'=>'required',
           'email'=>'required'
          
       ],[
           'ten.required'=>'Mời nhập tên nhà cung cấp!',
           'ten.min'=>'Tên nhà cung cấp tối thiểu 4 kí tự và tối đa 30 kí tự!',
           'ten.max'=>'Tên nhà cung cấp tối thiểu 4 kí tự và tối đa 30 kí tự!',
           'diachi.required'=>'Mời nhập địa chỉ!',
           'diachi.min'=>'Địa chỉ tối thiểu 4 kí tự và tối đa 10 kí tự!',
           'diachi.max'=>'Địa chỉ tối thiểu 4 kí tự và tối đa 10 kí tự!',
           'phone.required'=>'Mời nhập số điện thoại liên hệ!',
           'email.required'=>'Mời nhập email!'
           

       ]);
       $acc=new ncc;
       $acc->name=$request->ten;
       $acc->address=$request->diachi;
        $acc->email=$request->email;
       $acc->phone=$request->sdt;
       $acc->save();
       return redirect('admin/ncc/addNcc')->with('mess','Thêm thành công!');
    }

    public function getEditNcc($id_supplier)
    {
        //$acc=DB::table('account')->where('id_account',$id)->get()->toArray();
      $acc= ncc::find($id_supplier);    //   print_r($acc);
      //$acc=DB::table('supplier')->where('id_supplier', $id)->get();
    //   foreach($acc as $ac)
    //   {
        // print_r($acc);
    //   }
      //echo $acc->user_name;
    return view('Admin.ncc.editNcc',['acc'=>$acc]);
    
    }
    public function postEditNcc(Request $request,$id)
    {
        //$acc=DB::table('account')->where('id_account',$id)->get()->toArray();
        
        $this->validate($request,[
            'ten'=>'required|min:4|max:30',
            'diachi'=>'required|min:4|max:20',
            'sdt'=>'required|max:10',
            'email'=>'required'
           
        ],[
            'ten.required'=>'Mời nhập tên nhà cung cấp!',
            'ten.min'=>'Tên nhà cung cấp tối thiểu 4 kí tự và tối đa 30 kí tự!',
            'ten.max'=>'Tên nhà cung cấp tối thiểu 4 kí tự và tối đa 30 kí tự!',
            'diachi.required'=>'Mời nhập địa chỉ!',
            'diachi.min'=>'Địa chỉ tối thiểu 4 kí tự và tối đa 10 kí tự!',
            'diachi.max'=>'Địa chỉ tối thiểu 4 kí tự và tối đa 10 kí tự!',
            'sdt.required'=>'Mời nhập số điện thoại liên hệ!',
            'email.required'=>'Mời nhập email!',
            'sdt.max'=>'Số điện thoại tối đa 10 số'
            
 
        ]);
        $acc=ncc::find($id);
        $acc->name=$request->ten;
        $acc->address=$request->diachi;
        $acc->email=$request->email;
        $acc->phone=$request->sdt;
        $acc->save();
        return redirect('admin/ncc/list')->with('mess','Sửa thành công!');
    }
    public function getDeleteNcc($id)
    {
        $acc=ncc::find($id);
        $acc->delete();
    //    $acc=DB::table('supplier')->where('id_supplier', $id)->delete();
        return redirect('admin/ncc/list')->with('mess','Xoá thành công!');
    }
}
