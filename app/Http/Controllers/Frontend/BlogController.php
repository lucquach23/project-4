<?php

namespace App\Http\Controllers\Frontend;

//use App\Model\Account as AppAccount;
//use App\Model\Slide;
//use App\Model\Category_shirt;
//use App\Model\Shirt;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
//use App\Shirt as AppShirt;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\View;

class BlogController extends Controller
{
    public function getIndex()
    {
       $blog=DB::table('blog')->get();
       return view('Client.blog',['blog'=>$blog]);
    }
}
