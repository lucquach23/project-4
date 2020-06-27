<?php

namespace App\Http\Controllers\Backend;

//use App\Model\Account as AppAccount;
//use App\Model\Backend\ncc;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\View;

class BlogController extends Controller
{
   
    public function getList()
    {
        //$ncc=DB::table('viewlistncc')->get();
        $ncc=DB::table('blog')->get();
        // print_r($ncc);
        // exit;
        return view('Admin.Blog.listBlog',['ncc'=>$ncc]);
    }

    public function GetAddBlog()
    {
        return view('Admin.Blog.addBlog');
    }
    public function postAddBlog(Request $request)
    {
       
     $rs= DB::table('blog')->insert([
        'title'=>$request->title,
        'content'=>$request->content,
        'image'=>$request->image
      ]);
      if($rs)
      {
          return back()->with('mess','Thêm thành công!');
      }
    }

    public function getEditBlog($id)
    {
       $blog=DB::table('blog')->where('id_blog',$id)->first();
       
    return view('Admin.Blog.editBlog',['blog'=>$blog]);
    
    }
    public function postEditBlog(Request $request,$id)
    {
        $rs=DB::table('blog')->where('id_blog',$id)->update([
            'title'=>$request->title,
            'content'=>$request->content,
            'image'=>$request->image
        ]);
        if($rs)
        {
            return redirect()->route('listBlog')->with('mess','Sửa thành công!');
        }
       
    }
    public function getDeleteBlog($id)
    {
        $rs=DB::table('blog')->where('id_blog',$id)->delete();
        if($rs)
        {
            return redirect()->route('listBlog')->with('mess','Xoá thành công!');
        }
    }
}
