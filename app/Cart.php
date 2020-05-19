<?php
namespace App;
class Cart
{
    public $products=null;
    public $totalPrice=0;
    public $totalQuanty=0;
    //public $size="";
   
     
    public function __construct($cart)
    {
        if($cart)
        {
            $this->products= $cart->products;
            $this->totalPrice= $cart->totalPrice;
            $this->totalQuanty= $cart->totalQuanty;
           // $this->size=$cart->size;
           
        }
    }
    public function AddCart( $product,$id)
    {
        $newProduct=['quanty'=>0,'price'=>$product->price_sell,'productInfo'=>$product,'size'=>$product->size];
        if($this->products)
        {
            if(array_key_exists($id,$this->products))
            {
                $newProduct=$this->products[$id];
            }
        }
        $newProduct['quanty']++;
        $newProduct['price']=$newProduct['quanty']*$product->price_sell;
        $this->products[$id]=$newProduct;
        $this->totalPrice += $product->price_sell;
        $this->totalQuanty++;
    }
    public function DeleteItemCart($id)
    {
        $this->totalQuanty -= $this->products[$id]['quanty'];
        $this->totalPrice-=$this->products[$id]['price'];
        unset($this->products[$id]);
    }
    public function UpdateItemCart($id,$quanty,$size)
    {
        
        $this->totalQuanty -= $this->products[$id]['quanty'];
        $this->totalPrice-=$this->products[$id]['price'];

        $this->products[$id]['quanty']=$quanty;
        $this->products[$id]['price']=$quanty*$this->products[$id]['productInfo']->price_sell;

        $this->totalQuanty += $this->products[$id]['quanty'];
        $this->totalPrice+=$this->products[$id]['price'];
        $this->products[$id]['size']=$size;
        //$this->products[$id]['size'];
        //$this->size=$size;
    }
    
}

?>