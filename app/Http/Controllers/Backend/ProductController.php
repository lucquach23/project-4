<?php

namespace App\Http\Controllers\Backend;

//use App\Model\Account as AppAccount;
//use App\Model\Backend\ncc;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Session;



class ProductController extends Controller
{
   /* ProductController@listproduct')->name('listproduct');
    route::get('AddPro','ProductController@GetAddPro');
    route::post('AddPro','ProductController@PostAddPro');
    route::get('editPro/{id}','ProductController@getEditPro');
    route::post('editPro/{id}','ProductController@postEditPro');
    route::get('deletePro/{id}','ProductController@getDeletePro');*/
    public function display($id){
        //echo 'hi';
        DB::table('shirt')->where('id_shirt',$id)->update(['status'=>0]);
        // if($t)
        // {
            return back()->with('mess','Vô hiệu hoá thành công!');
        //}
    }
    public function un_display($id){
        DB::table('shirt')->where('id_shirt',$id)->update(['status'=>1]);
        // if($t)
        // {
            return back()->with('mess','Kích hoạt thành công!');
        //}
    }
    public function listproduct()
    {
       // $rs=DB::table('gs')->get();
       // dd($rs);

        $shirt=DB::table('shirt')->get();
        Session::put('allshirt','allshirt');

        foreach($shirt as $i)
       {
           $vd=DB::table('quantity_size')->where('id_shirt',$i->id_shirt)->get();
           $i->detail_quanti_size = $vd;
       }
      // dd($shirt['detail_quanti_size']['size']);
       return view('Admin.Product.listPro',['view'=>$shirt]);
    }

    public function GetAddPro()
    {
        return view('Admin.ncc.addNcc');
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
   
    public function getDeletePro($id)
    {
        $shirt=DB::table('shirt')->where('id_shirt',$id)->first();
        $io=DB::table('import_order')->where('id_import_order',$shirt->id_io)->first();
        DB::table('import_order')->where('id_import_order',$shirt->id_io)->update(['quantity'=>$io->quantity-1,'total_money'=>$io->total_money-$shirt->price_input]);
        DB::table('shirt')->where('id_shirt', $id)->delete();
        return back()->with('mess','Xoá thành công!');
    }
}
