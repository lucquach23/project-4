<?php

use App\Http\Controllers\Backend\nccController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

route::get('/','Frontend\HomeController@getIndex')->name('home');
//route::get('/about','Frontend\AboutController@getIndexAbout')->name('about');
route::get('/about',function(){
	return view('Client.about');
});
route::get('/blog',function(){
	return view('Client.blog');
});
route::get('/contact',function(){
	return view('Client.contact');
});


//list Shirt
route::get('listShirt','Frontend\ShirtController@listShirt')->name('listShirt');
route::get('listShirt/{id}','Frontend\ShirtController@typeShirt');
route::get('detail/{id}','Frontend\ShirtController@ViewDetail');
route::post('/discount','Frontend\ShirtController@discount')->name('discount');



















//cart
route::get('/Add-Cart/{id}','CartController@AddCart');
route::get('/Delete-Item-Cart/{id}','CartController@DeleteItemCart');
route::get('/ListCart','CartController@ViewListCart')->name('viewlistcart');
route::get('/Delete-Item-List-Cart/{id}','CartController@DeleteListItemCart');
route::get('/Save-Item-List-Cart/{id}/{quanty}/{size}','CartController@SaveListItemCart');


//checkout

route::get('/login-checkout','CheckoutController@login_checkout')->name('login_checkout');
route::post('/add_customer','CheckoutController@add_customer');
route::get('/payment','CheckoutController@getpayment')->name('getpayment');
route::post('/payment','CheckoutController@postpayment')->name('postpayment');
route::post('/login_customer','CheckoutController@login_customer');
route::get('/logout','CheckoutController@logout')->name('logout');
route::get('/order_customer','CheckoutController@order_customer')->name('order_customer');
route::get('/detail-order-cus/{id}','CheckoutController@detail_order_cus');
route::get('/distroy_order_cus/{id_order}','CheckoutController@distroy_order_cus');

route::get('/vde',function(){
	return view('Client.vde');
});


//admin login
route::get('admin/login','Backend\LoginController@getLogin')->name('getLogin');
route::post('admin/login','Backend\LoginController@postLogin')->name('postLogin');



//quản trị account
route::group(['prefix'=>'admin','namespace'=>'Backend'],function(){
	route::group(['prefix'=>'account'],function(){
		route::get('list','AccountController@getList')->name('listAccount');

		route::get('addAccount','AccountController@addAccount');
		route::post('addAccount','AccountController@PostAddAccount');


		route::get('edit/{id}','AccountController@getEdit');
		route::post('edit/{id}','AccountController@postEdit');

		route::get('delete/{id}','AccountController@deleteAccount');
	});
		
});
// end quản trị account


//quản trị nhà cung cấp
route::group(['prefix'=>'admin','namespace'=>'Backend'],function(){
	route::group(['prefix'=>'ncc'],function(){
		route::get('list','nccController@getList')->name('listNcc');

		route::get('addNcc','nccController@GetAddNcc');
		route::post('addNcc','nccController@PostAddNcc');


		route::get('edit/{id}','nccController@getEditNcc');
		route::post('edit/{id}','nccController@postEditNcc');

		//route::post('delete/{id}','nccController@postdeleteNcc');
		route::get('delete/{id}','nccController@getDeleteNcc');
	});
		
});
