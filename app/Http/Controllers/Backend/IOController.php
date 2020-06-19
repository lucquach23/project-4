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
       
       foreach($viewDIO as $i)
       {
           $vd=DB::table('quantity_size')->where('id_shirt',$i->id_shirt)->get();
           $i->detail_quanti_size = $vd;
       }
       return view('Admin.IO.show_product_of_IO',['view'=>$viewDIO]);
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
    //$num=mt_rand(1,9999999);
   // $seri="sp-$num";
   
    return view('Admin.IO.addProduct_of_IO',['io'=>$io,'loai'=>$category,'sup'=>$sup]);
   }
   public function postAddPro_of_IO(Request $req, $id)
   {
    $tongsl=$req->sl_S+$req->sl_XS+$req->sl_L+$req->sl_M+$req->sl_XL+$req->sl_XXL;
    
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
    // $shirt['seri']=$req->seri;
    $shirt['name']=$req->tenao;  
    $shirt['description']=$req->mota;
    $shirt['image']=$req->anh;  
    // $shirt['size']=$req->size;  
    $shirt['fabric_material']=$req->chatlieu;  
    $shirt['price_sell']=$req->giaban;  
    $shirt['price_input']=$req->gianhap;  
    $shirt['status']=$req->trangthai;
    
    $id_shirt=DB::table('shirt')->insertGetId($shirt); 
    DB::insert('insert into quantity_size (id_shirt,size,quantity) values (?, ?,?)', [$id_shirt, $req->size_S,$req->sl_S]);
    DB::insert('insert into quantity_size (id_shirt,size,quantity) values (?, ?,?)', [$id_shirt, $req->size_XS,$req->sl_XS]);
    DB::insert('insert into quantity_size (id_shirt,size,quantity) values (?, ?,?)', [$id_shirt, $req->size_L,$req->sl_L]);
    DB::insert('insert into quantity_size (id_shirt,size,quantity) values (?, ?,?)', [$id_shirt, $req->size_M,$req->sl_M]);
    DB::insert('insert into quantity_size (id_shirt,size,quantity) values (?, ?,?)', [$id_shirt, $req->size_XL,$req->sl_XL]);
    DB::insert('insert into quantity_size (id_shirt,size,quantity) values (?, ?,?)', [$id_shirt, $req->size_XXL,$req->sl_XXL]);
    
    // if($rs)
    // {
        $io=DB::table('import_order')->where('id_import_order',$id)->first();
        DB::table('import_order')->where('id_import_order',$id)->update(['quantity'=>$io->quantity+$tongsl,'total_money'=>$io->total_money+$req->gianhap*$tongsl]);
        return back()->with('mess','Thêm thành công');
   // }
      
   }
   public function postEditPro(Request $req,$id)
   {
       //dd($id);
       $io=DB::table('import_order')->where('id_import_order',$req->madonnhap)->first();

    $tongsl=$req->sl_S+$req->sl_XS+$req->sl_L+$req->sl_M+$req->sl_XL+$req->sl_XXL;
    $old_quanti=floatval(DB::table('quantity_size')->where('id_shirt', '=', $id)->sum('quantity'));
   $sl=$io->quantity-$old_quanti+$tongsl;

    $old_money=floatval(DB::table('quantity_size')->where('id_shirt', '=', $id)->sum('quantity'));

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
    // $shirt['seri']=$req->seri;
    $shirt['name']=$req->tenao;  
    $shirt['description']=$req->mota;
    $shirt['image']=$req->anh;  
    // $shirt['size']=$req->size;  
    $shirt['fabric_material']=$req->chatlieu;  
    $shirt['price_sell']=$req->giaban;  
    $shirt['price_input']=$req->gianhap;  
    $shirt['status']=$req->trangthai;
    DB::table('shirt')->where('id_shirt',$id)->update($shirt); 
    DB::table('quantity_size')->where('id_quantity_size', $req->id_size_S)->update(['quantity' =>$req->sl_S]);
    DB::table('quantity_size')->where('id_quantity_size', $req->id_size_XS)->update(['quantity' =>$req->sl_XS]);
    DB::table('quantity_size')->where('id_quantity_size', $req->id_size_L)->update(['quantity' =>$req->sl_L]);
    DB::table('quantity_size')->where('id_quantity_size', $req->id_size_M)->update(['quantity' =>$req->sl_M]);
    DB::table('quantity_size')->where('id_quantity_size', $req->id_size_XL)->update(['quantity' =>$req->sl_XL]);
    DB::table('quantity_size')->where('id_quantity_size', $req->id_size_XXL)->update(['quantity' =>$req->sl_XXL]);
    //$old_quanti=DB::select('call get_quanti_size(?)', [$id]);
    DB::table('import_order')->where('id_import_order',$req->madonnhap)->update(['quantity'=>$sl,'total_money'=>$io->total_money-$old_money+$req->gianhap*$sl]);
    return back()->with('mess','Cập nhật thành công!');
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
   public function getEditPro($id)
   {
       $shirt=DB::table('shirt')->where('id_shirt',$id)->first();
       //dd($shirt);
       //dd($shirt->id_io);
       $qz=DB::table('quantity_size')->where('id_shirt',$id)->get();
      // dd($qz);
       $sup=DB::table('supplier')->get();   
       $category=DB::table('category_shirt')->get();
       $io=DB::table('import_order')->where('id_import_order',$shirt->id_io)->first();
       return view('Admin.IO.editProduct_of_IO',['io'=>$io,'loai'=>$category,'sup'=>$sup,'shirt'=>$shirt,'qz'=>$qz]);
   }
  
    public function getDeleteIO($id)
    {
       
        // DB::table('import_order')->where('id_import_order', $id)->delete();
        // return back()->with('mess','Xoá thành công!');
    }
   
}
