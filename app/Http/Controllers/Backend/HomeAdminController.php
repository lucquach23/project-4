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
      return  view('Admin.home');
    }
    // public function postLogin(Request $request)
    // {
    //    echo 'hi';
    // }
    public function postLogin(Request $request)
    {    
        $request->validate([
        'un'=>'required',
        'pw'=>'required|min:4|max:250'
        ],[
            'un.required'=>'Bạn phải điền tên đăng nhập!',
            'pw.required'=>'Bạn phải nhập mật khẩu',
            'pw.min'=>'Độ dài mật khẩu phải lớn hơn 4 kí tự',
            'pw.max'=>'Độ dài mật khẩu phải nhỏ hơn 15 kí tự'
        ]);
        $user=$request->un;        
        $pass=md5($request->pw);
       
        $rs=DB::table('account')->where('user_name',$user)->where('password',$pass)->first();
        if($rs)
        {
            Session::put('id_account',$rs->id);
            Session::put('name_account',$rs->name_of_user);
            return redirect()->route('');
           // dd(Session::get('id_account'));
        }
      
        dd($rs);
    }
    /*
    public function getLogin(Request $request)
    {
        $user=$request->username;
        $pass=$request->password;

        if(Auth::attempt(['user_name'=> $user]))
        {
            return view('LayoutsAdmin.home');
        }else{
            echo 'dang nhap that bai';
        }

        //$testUser=DB::table('account')->where('user_name',$user);
        //$testPass=DB::table('account')->where('password',$pass);
        //$testRole=DB::table('account')->where('role',1);
   
    }
}
*/
}