<?php

namespace App\Http\Controllers;

use App\Model\Order as ModelOrder;
use Illuminate\Http\Request;
session_start();
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use Mail;
//use Symfony\Component\HttpFoundation\Session\Session;
use App\Model\Order;
use App\Model\Order_Detail;
use App\Model\Customer;

class CheckoutController extends Controller
{
    public function login_checkout()
    {
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
        Session::put('customer_id', $customer_id);
        Session::put('customer_name',$req->fullname);  
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
            //dd(Session::get(''))
            return Redirect::to('/payment');
        }else{
            return back()->with('mess','Tên đăng nhập hoặc mật khẩu không chính xác');
        }
        
        

    }
    public function getChangeInfo($id)
    {
        $rs=DB::table('customer')->where('id_customer',$id)->first();
        return view('Client.changeInfo',['info'=>$rs]);
    }
    public function postChangeInfo(Request $req, $id)
    {
        $this->validate($req,[
            'hoten'=>'required|min:4|max:30',
            'diachi'=>'required|min:4|max:300',
            
            'sdt'=>'required|regex:/^\d{10}$/',
            'mk1'=>'required|min:4|max:30',
            'mk2'=>'required|min:4|max:30|same:mk1',]
        // ],[
        //     'fullname.required'=>'Mời nhập tên !',
        //     'fullname.min'=>'Họ tên tối thiểu 4 kí tự và tối đa 30 kí tự!',
        //     'fullname.max'=>'Họ tên tối thiểu 4 kí tự và tối đa 30 kí tự!',
        //     'address.required'=>'Mời nhập địa chỉ!',
        //     'address.min'=>'Địa chỉ tối thiểu 4 kí tự và tối đa 300 kí tự!',
        //     'address.max'=>'Địa chỉ tối thiểu 4 kí tự và tối đa 300 kí tự!',
        //     'phone.required'=>'Mời nhập số điện thoại của bạn!',
        //     'username.required'=>'Mời nhập tên tài khoản',
        //     'pass.required'=>'Yêu cầu nhập mật khẩu',
        // ]
    );
    $info=array();
    $info['name']=$req->hoten ;
    $info['address']=$req->diachi ;
    $info['email']=$req->email;
    $info['phone']=$req->sdt;
    $info['password']=$req->mk1;
    $rs=DB::table('customer')->where('id_customer',$id)
    ->update(['name'=>$req->hoten,'address'=>$req->diachi,'email'=>$req->email,'phone'=>$req->sdt,'password'=>$req->mk1]);
    if($rs)
    {
        return back()->with('mess','Thay đổi thành công');
    }
    }
    public function logout()
    {
        //dd(Session::get('customer_id'));
        Session::flush();
        return redirect()->route('home');
    }
    public function getpayment()
    {
       // Session::put('customer_id', $rs->id_customer);
        $info_cus=DB::table('customer')->where('id_customer',Session::get('customer_id'))->first();
        //dd($info_cus);
        return view('Client.checkout.payment',['info_cus'=>$info_cus]);
    }
    public function postpayment(Request $req)
    {
        //dd($req->name)
        $this->validate($req,[
            'name_ship'=>'required|min:4|max:30',
            'sdt_ship'=>'required|min:10|max:10',
            'address_ship'=>'required',
            'note_ship'=>'required'           
        ],[
            'name_ship.required'=>'Mời nhập họ tên người nhận !',
            'name_ship.min'=>'Họ tên tối thiểu 4 kí tự và tối đa 30 kí tự!',
            'name_ship.max'=>'Họ tên tối thiểu 4 kí tự và tối đa 30 kí tự!',
            'sdt_ship.required'=>'Mời nhập số điện thoại!',
            'sdt_ship.min'=>'Số điện thoại 10 kí tự!',
            'sdt_ship.max'=>'Số điện thoại 10 kí tự!',
            'address_ship.required'=>'Mời nhập địa chỉ nhận hàng!',
            'note_ship.required'=>'Thêm ghi chú về đơn hàng'  
        ]);      
        $cart=Session::get('Cart');
        $arrOrder=array();
        $arrOrder['id_customer']=Session::get('customer_id');
        $arrOrder['total_money']=$cart->totalPrice;
        $arrOrder['payment_method']="COD";
        $arrOrder['date_order']=date('Y-m-d');
        $arrOrder['notes']=$req->note_ship;
        $arrOrder['status']=1;
        $arrOrder['name_ship']=$req->name_ship;
        $arrOrder['address_ship']=$req->address_ship;
        $arrOrder['phone_ship']=$req->sdt_ship;
        $arrOrder['email_ship']=$req->email_ship;
        $id_order=DB::table('_order')->insertGetId($arrOrder);             
        foreach($cart->products as $key=>$value)
        {
            $order_detail=new Order_Detail();
            $order_detail->id_order=$id_order;
            $order_detail->id_shirt=$key;
            $order_detail->price=$value['price'];
            $order_detail->quantity=$value['quanty'];
            $order_detail->size=$value['size'];
            $order_detail->image=$value['productInfo']->image;
            $order_detail->save();
        }
       
       $email_ship=$req->email_ship;
       $info=DB::select('call get_info_cus_mail(?,?)',[Session::get('customer_id'), $id_order]);
       $arrInfo=array();
       foreach($info as $i)
       {
           $arrInfo['name']=$req->name_ship;
           $arrInfo['diachi']=$req->address_ship;
           $arrInfo['email']=$req->email_ship;
           $arrInfo['sdt']=$req->sdt_ship;
           $arrInfo['tongtien']=$i->total_money;
           $arrInfo['ngaydat']=$i->date_order;
       }
       //dd($arrInfo);
     // $arrInfo=array();
      //$arrInfo['name']=$info->name;
     
       Mail::send('Client.mail',$arrInfo ,function($mes) use ($email_ship){
          ;
            $mes->from('hoangluc1002@gmail.com','Quách Lực');
            $mes->to($email_ship)->subject('THÔNG TIN ĐƠN HÀNG');
        });
        Session::forget('Cart');
        return back()->with('mess',"Đặt hàng thành công. Vui lòng chú ý điện thoại, sẽ có nhân viên check lại đơn hàng của bạn ^_^");
    }
































    
    public function order_customer()
    {
        $id_cus=Session::get('customer_id');
       // $ord_cus=DB::table('_order')->where('id_customer',$id_cus)->where('status',1)
       $ord_cus=DB::select('call getOrderCustomer(?)',[$id_cus]);
       foreach($ord_cus as $i)
       {
           $vd=DB::select('call getdetailorder(?)',[$i->id_order]);
           $i->order = $vd;
       }
       $order_distroyed=DB::select('call getOrderDistroyed(?)',[$id_cus]);
       foreach($order_distroyed as $i)
       {
        $vd=DB::select('call getdetailorder(?)',[$i->id_order]);
        $i->order = $vd;
       }

       return view('Client.order_management',['ord_cus'=>$ord_cus,'ordis'=>$order_distroyed]);
        
    }
  public function distroy_order_cus($id_order)
  {
      DB::table('_order')->where('id_order',$id_order)->update(['status'=>4]);
      return back();
      //dd($id_order);
  }
  public function re_Order($id_order)
  {
      DB::table('_order')->where('id_order',$id_order)->update(['status'=>1,'date_order'=>date('y-m-d')]);
      return back();
      //dd($id_order);
  }

}
