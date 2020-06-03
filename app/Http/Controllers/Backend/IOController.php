<?php

namespace App\Http\Controllers\Backend;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Session;


class IOController extends Controller
{
    public function viewDetailIO($id)
    {
        Session::forget('allshirt');
       $viewDIO=DB::table('shirt')->where('id_io',$id)->get();
       return view('Admin.Product.listPro',['view'=>$viewDIO]);
    }
    public function listIO()
    {
        $rs=DB::table('import_order')->get();
       
        return view('Admin.IO.listIO',['io'=>$rs]);
    }
  
   public function getAddPro_of_IO($id)
   {
    $io=DB::table('import_order')->where('id_import_order',$id)->first();
    $sup=DB::table('supplier')->get();
   
    $category=DB::table('category_shirt')->get();
    $num=mt_rand(1,9999999);
    $seri="sp-$num";
   
    return view('Admin.IO.addProduct_of_IO',['io'=>$io,'loai'=>$category,'seri'=>$seri,'sup'=>$sup]);
   }
   public function postAddPro_of_IO(Request $req, $id)
   {
    $this->validate($req,[
        'tenao'=>'required|min:4',
        'mota'=>'required|min:4',
        'gianhap'=>'required|numeric',
        'giaban'=>'required|numeric',
        
    ],[
        'tenao.required'=>'Mời nhập tên áo!',
        'tenao.min'=>'Tên áo tối thiểu 4 kí tự!',
        'mota.required'=>'Mô tả sản phẩm!',
        'mota.min'=>'Mô tả quá ngắn!',
        'gianhap.required'=>'Giá nhập không được để trống!',
        'gianhap.numeric'=>'Giá nhập phải là số',
        'giaban.required'=>'Giá bán không được để trống!',
        'giaban.numeric'=>'Giá bán phải là số',      
    ]);
    $shirt=array();
    $shirt['id_category_shirt']=$req->loaiao;
    $shirt['id_io']=$req->madonnhap;
    $shirt['id_supplier']=$req->ncc;  
    $shirt['seri']=$req->seri;
    $shirt['name']=$req->tenao;  
    $shirt['description']=$req->mota;
    $shirt['image']=$req->anh;  
    $shirt['size']=$req->size;  
    $shirt['fabric_material']=$req->chatlieu;  
    $shirt['price_sell']=$req->gianhap;  
    $shirt['price_input']=$req->giaban;  
    $shirt['status']=$req->trangthai;
    
    $rs=DB::table('shirt')->insert($shirt); 
    if($rs)
    {
        $io=DB::table('import_order')->where('id_import_order',$id)->first();
        DB::table('import_order')->where('id_import_order',$id)->update(['quantity'=>$io->quantity+1,'total_money'=>$io->total_money+$req->gianhap]);
        return back()->with('mess','Thêm thành công');
    }
      
   }

   public function GetAddPro()
   {
       return view('Admin.Product.addPro');
   }

    public function AddIO()
    {
        $arr=array();
        $arr['create_date']=date('y-m-d');
        $arr['quantity']=0;
        $arr['total_money']=0;
        $rs=DB::table('import_order')->insert($arr);
        if($rs)
        {
            return back()->with('mess','Tạo thành công!');
        }
    }
    public function PostAddIO(Request $request)
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
        
       $acc= Account::find($id);    
        return view('Admin.Account.EditAccount',['acc'=>$acc]);
    
    }
    public function postEdit(Request $request,$id)
    {
     
        
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
        
        return redirect()->route('listAccount')->with('mess','Sửa thành công!');
    }
    public function deleteAccount($id)
    {
        $acc= Account::find($id); 
        $acc->delete();
        return redirect('admin/account/list')->with('mess','Xoá thành công!');
    }
}
