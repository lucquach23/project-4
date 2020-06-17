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

    public function listproduct()
    {
       // $rs=DB::table('gs')->get();
       // dd($rs);

        $shirt=DB::table('shirt')->get();
        Session::put('allshirt','allshirt');

        
       return view('Admin.Product.listPro',['view'=>$shirt]);
    }

    public function GetAddPro()
    {
        return view('Admin.ncc.addNcc');
    }
    public function PostEditPro(Request $req,$id)
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
        $rs=DB::table('shirt')->where('id_shirt',$id)->update($shirt); 
        if($rs){
            return redirect()->route('listproduct')->with('mess','Cập nhật thành công!');
        }
    }

    public function getEditPro($id)
    {
        $shirt=DB::table('shirt')->where('id_shirt',$id)->first();
        //$io=DB::table('import_order')->where('id_import_order',$id)->first();
        $sup=DB::table('supplier')->get();
       
        $category=DB::table('category_shirt')->get();
       
       
        return view('Admin.Product.editPro',['loai'=>$category,'sup'=>$sup,'shirt'=>$shirt]);
        //return view('Admin.ncc.editNcc',['shirt'=>$shirt]);
    
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
