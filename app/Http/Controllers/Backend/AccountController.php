<?php

namespace App\Http\Controllers\Backend;

use App\Model\Account as AppAccount;
use App\Model\Backend\Account;
use DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\View;

class AccountController extends Controller
{
   
    public function getList()
    {
        //$account=Account::all()->orderBy('id','desc');
        $account=DB::table('account')->orderBy('id','desc')->get();
        //dd($account);
        return view('Admin.Account.listAccount',['account'=>$account]);
    }

    public function addAccount()
    {
        return view('Admin.Account.addAccount');
    }
    public function PostAddAccount(Request $request)
    {
       $this->validate($request,[
           'user_name'=>'required|min:4|max:30|unique:account',
           'matkhau'=>'required|min:4|max:20',
           'hoten'=>'required',
           'email'=>'required|unique:account',
           'quyen'=>'required'
       ],[
           'user_name.required'=>'Mời nhập tên đăng nhập!',
           'user_name.unique'=>'Tên đăng nhập đã tồn tại!',
           'user_name.min'=>'Tên đăng nhập tối thiểu 4 kí tự và tối đa 30 kí tự!',
           'user_name.max'=>'Tên đăng nhập tối thiểu 4 kí tự và tối đa 30 kí tự!',
           'matkhau.required'=>'Mời nhập mật khẩu!',
           'matkhau.min'=>'Mật khẩu tối thiểu 4 kí tự và tối đa 10 kí tự!',
           'matkhau.max'=>'Mật khẩu tối thiểu 4 kí tự và tối đa 10 kí tự!',
           'hoten.required'=>'Mời nhập họ tên người sử dụng!',
           'email.unique'=>'Email đã được sử dụng!',
           'email.required'=>'Nhập email!',
           'quyen.required'=>'Yêu cầu chọn quyền!',

       ]);
       $acc=new Account;
       $acc->user_name=$request->user_name;
       $acc->password=md5($request->matkhau);
       $acc->name_of_user=$request->hoten;
       $acc->email=$request->email;
       $acc->role=$request->quyen;
       $acc->save();
       return redirect('admin/account/addAccount')->with('mess','Thêm thành công!');
    }

    public function getEdit($id)
    {
        //$acc=DB::table('account')->where('id_account',$id)->get()->toArray();
       $acc= Account::find($id);    //   print_r($acc);
    //   foreach($acc as $ac)
    //   {
        // print_r($acc);
    //   }
      //echo $acc->user_name;
    return view('Admin.Account.EditAccount',['acc'=>$acc]);
    
    }
    public function postEdit(Request $request,$id)
    {
        //$acc=DB::table('account')->where('id_account',$id)->get()->toArray();
        
        $this->validate($request,[
            'tendangnhap'=>'required|min:4|max:20',
            'matkhau'=>'required|min:4|max:20',
            'hoten'=>'required',
            'email'=>'required',
            'quyen'=>'required'
        ],[
            'tendangnhap.required'=>'Mời nhập tên đăng nhập!',
            'tendangnhap.min'=>'Tên đăng nhập tối thiểu 4 kí tự và tối đa 20 kí tự!',
            'tendangnhap.max'=>'Tên đăng nhập tối thiểu 4 kí tự và tối đa 20 kí tự!',
            'matkhau.required'=>'Mời nhập mật khẩu!',
            'matkhau.min'=>'Mật khẩu tối thiểu 4 kí tự và tối đa 10 kí tự!',
            'matkhau.max'=>'Mật khẩu tối thiểu 4 kí tự và tối đa 10 kí tự!',
            'hoten.required'=>'Mời nhập họ tên người sử dụng!',
            'email.required'=>'Mời nhập email!',
            'quyen.required'=>'Yêu cầu chọn quyền!',
 
        ]);
        $acc= Account::find($id);  
        $acc->user_name=$request->tendangnhap;
       // $acc->user_name =>'unique:account';
        $acc->password=md5($request->matkhau);
        $acc->name_of_user=$request->hoten;
        $acc->email=$request->email;
        $acc->role=$request->quyen;
        $acc->save();
        //return redirect('admin/account/list')->with('mess','Sửa thành công!');
        return redirect()->route('listAccount')->with('mess','Sửa thành công!');
    }
    public function deleteAccount($id)
    {
        $acc= Account::find($id); 
        $acc->delete();
        return redirect('admin/account/list')->with('mess','Xoá thành công!');
    }
}
