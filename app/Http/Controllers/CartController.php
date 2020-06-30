<?php

namespace App\Http\Controllers;
use App\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;
class CartController extends Controller
{
    public function AddCart(Request $req,$id)
    {
        $product=DB::table('shirt')->where('id_shirt',$id)->first();
       if( $product!= null)
       {
          
            $oldCart=Session('Cart')?Session('Cart'):null;
            $newCart=new Cart($oldCart);
            $newCart->AddCart($product,$id);           
            $req->session()->put('Cart',$newCart);               
       }
      return view('Client.Cart');
    }
    public function DeleteItemCart(Request $req,$id)
    {     
        $oldCart=Session('Cart')?Session('Cart'):null;
        $newCart=new Cart($oldCart);
        $newCart->DeleteItemCart($id);
        if(count($newCart->products)>0)
        {
            $req->session()->put('Cart',$newCart); 
        }else 
        $req->session()->forget('Cart'); 
        return view('Client.Cart');     
    }
    public function ViewListCart()
    {
        return view('Client.viewListCart');
    }
    public function DeleteListItemCart(Request $req,$id)
    {
            $oldCart=Session('Cart')?Session('Cart'):null;
            $newCart=new Cart($oldCart);
            $newCart->DeleteItemCart($id);
            if(count($newCart->products)>0)
            {
                $req->session()->put('Cart',$newCart); 
            }else 
            $req->session()->forget('Cart'); 
            return view('Client.list-cart');
      
    }
    public function SaveListItemCart(Request $req,$id,$quanty,$size)
    {  
        $quan_size=DB::table('quantity_size')->where('id_shirt',$id)->where('size',$size)->first();            
        if((int)$quanty>$quan_size->quantity)
        {
            $tb='<script>
                    alert("size '.$size.' sẵn có '.$quan_size->quantity.' trong kho!!!");
                    </script>';
            echo $tb;
            return view('Client.list-cart');
        }else
        {
            $oldCart=Session('Cart')?Session('Cart'):null;
            $newCart=new Cart($oldCart);                
            $newCart->UpdateItemCart($id,$quanty,$size);
            $req->session()->put('Cart',$newCart);                
            return view('Client.list-cart');
        }  
    }     
    
}
