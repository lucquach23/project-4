<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
session_start();
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;

class CheckoutController extends Controller
{
    public function login_checkout(){
        return view('Client.checkout.login_checkout');
    }  
    public function add_customer(Request $req)
    {
        $this->validate($req,[
            'fullname'=>'required|min:4|max:30',
            'address'=>'required|min:4|max:300',
            'phone'=>'required',
            'username'=>'required|min:4|max:30',
            'pass'=>'required|min:4|max:30',
        ],[
            'fullname.required'=>'Mời nhập tên !',
            'fullname.min'=>'Họ tên tối thiểu 4 kí tự và tối đa 30 kí tự!',
            'fullname.max'=>'Họ tên tối thiểu 4 kí tự và tối đa 30 kí tự!',
            'address.required'=>'Mời nhập địa chỉ!',
            'address.min'=>'Địa chỉ tối thiểu 4 kí tự và tối đa 300 kí tự!',
            'address.max'=>'Địa chỉ tối thiểu 4 kí tự và tối đa 300 kí tự!',
            'phone.required'=>'Mời nhập số điện thoại của bạn!',
            'username.required'=>'Mời nhập tên tài khoản',
            'pass.required'=>'Yêu cầu nhập mật khẩu',
 
        ]);
        $data=array();
        $data['name']=$req->fullname;       				
        $data['address']=$req->address;
        $data['email']=$req->email;
        $data['phone']=$req->phone;
        $data['username']=$req->username;
        $data['password']=$req->pass;
        $customer_id=DB::table('customer')->insertGetId($data);
//dd($customer_id);
        Session::put('customer_id', $customer_id);
        Session::put('customer_name',$req->fullname);
        //dd(Session::get('customer_id'));
        //return redirect('/payment');
        //$mess='Đăng kí thành công! Mời đăng nhập';
       // return redirect('Client/checkout/login_checkout')->with('mess','Đăng kí thành công');
       return back()->with('mess','Đăng kí thành công, Mời đăng nhập để tiếp tục');

    }
    public function login_customer(Request $req)
    {
        $un=$req->username_login;
        $pw=$req->password_login;
        //dd($un,$pw);
        $rs=DB::table('customer')->where('username',$un)->where('password',$pw)->first();
        if($rs)
        {
            Session::put('customer_id', $rs->id_customer);
            Session::put('customer_name', $rs->name);
            return Redirect::to('/payment');
        }else{
            return back()->with('mess','Tên đăng nhập hoặc mật khẩu không chính xác');
        }
        
        

    }
    public function logout()
    {
        Session::flush();
        return redirect('/');
    }
    public function getpayment()
    {
        return view('Client.checkout.payment');
    }
    public function postpayment(Request $req)
    {
        $this->validate($req,[
            'name_ship'=>'required|min:4|max:30',
            'sdt_ship'=>'required|min:10|max:10',
            'address_ship'=>'required',
            'note_ship'=>'required',
            
        ],[
            'name_ship.required'=>'Mời nhập họ tên người nhận !',
            'name_ship.min'=>'Họ tên tối thiểu 4 kí tự và tối đa 30 kí tự!',
            'name_ship.max'=>'Họ tên tối thiểu 4 kí tự và tối đa 30 kí tự!',
            'sdt_ship.required'=>'Mời nhập số điện thoại!',
            'sdt_ship.min'=>'Số điện thoại 10 kí tự!',
            'sdt_ship.max'=>'Số điện thoại 10 kí tự!',
            'address_ship.required'=>'Mời nhập địa chỉ nhận hàng!',
            'note_ship.required'=>'Thêm ghi chú về đơn hàng',
           
        ]);
        $cart=Session::get('Cart');
        
    }
    public function order_customer()
    {
        echo 'order_customer';
    }

}
