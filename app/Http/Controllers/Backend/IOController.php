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
        Session::put('getViewDetail');
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
    $shirt['price_sell']=$req->giaban;  
    $shirt['price_input']=$req->gianhap;  
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
   
    public function getDeleteIO($id)
    {
       
        DB::table('import_order')->where('id_import_order', $id)->delete();
        return back()->with('mess','Xoá thành công!');
    }
   
}
