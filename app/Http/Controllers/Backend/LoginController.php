<?php
namespace App\Http\Controllers\Backend;

use App\Model\Account as AppAccount;
use App\Model\Account;
use DB;
use Session;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function getLogin()
    {
      return  view('Admin.login');
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
        // if (Auth::attempt(['user_name' => $user, 'password' => $pass]))
        // {
        //     return redirect()->route('adminhome');
        // }
        $rs=DB::table('account')->where('user_name',$user)->where('password',$pass)->first();
        if($rs)
        {
            Session::put('id_account',$rs->id);
            Session::put('name_account',$rs->name_of_user);
            Session::put('role_account',$rs->role);
            return redirect()->route('adminhome');
           // dd(Session::get('id_account'));
        }else
        {
            return back()->with('mess','Tên đăng nhập hoặc mật khẩu không đúng');
        }
      
       // dd($rs);
    }
    public function logout()
    {
        Session::forget('id_account');
        Session::forget('name_account');
        return redirect()->route('getLogin');
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