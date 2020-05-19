<?php
namespace App\Http\Controllers\Backend;

use App\Model\Account as AppAccount;
use App\Model\Account;
use DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function getLogin()
    {
      return  view('Admin.login');
    }
    public function postLogin(Request $request)
    {
       echo 'hi';
    }
    // public function postLogin(Request $request)
    // {
    //     $user=$request->username;
    //     $pass=$request->password;
    //    // echo $user;

    //     $request->validate([
    //     'username'=>'required',
    //     'password'=>'required|min:4|max:15'
    //     ],[
    //         'username.required'=>'Bạn phải điền tên đăng nhập!',
    //         'password.required'=>'Bạn phải nhập mật khẩu',
    //         'password.min'=>'Độ dài mật khẩu phải lớn hơn 4 kí tự',
    //         'password.max'=>'Độ dài mật khẩu phải nhỏ hơn 15 kí tự'
    //     ]);
    //    if(Auth::attempt(['user_name'=>$user,'password'=>$pass]))
    //    {
    //        echo 'dung';
    //        //return view('LayoutsAdmin.home');
    //    }else 'Login fail';
    // }
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