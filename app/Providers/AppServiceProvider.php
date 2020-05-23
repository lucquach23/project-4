<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Model\Category_shirt;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Cart;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('Client.header',function($view){
            $loai_sp = Category_shirt::all();
            
            $view->with('loai_sp',$loai_sp);
        });
        view()->composer('Client.header',function($view){
           
                $namecus=Session('customer_name')?Session('customer_name'):null;
               // $newCart=new Cart($oldCart);
                
                $view->with('namecus',$namecus);
            
        });
    }
}
