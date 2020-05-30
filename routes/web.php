<?php

use App\Http\Controllers\Backend\nccController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\AdminRole;
use Faker\Provider\ar_JO\Address;
use Illuminate\Support\Facades\Route;


//page home
route::get('/','Frontend\HomeController@getIndex')->name('home');
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
route::post('/material','Frontend\ShirtController@material')->name('material');
route::post('/PriceRange','Frontend\ShirtController@PriceRange')->name('PriceRange');
route::post('/searchcus','Frontend\ShirtController@searchcus')->name('searchcus');








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

route::get('/order_customer','CheckoutController@order_customer')->name('order_customer');
route::get('/detail-order-cus/{id}','CheckoutController@detail_order_cus');
route::get('/distroy_order_cus/{id_order}','CheckoutController@distroy_order_cus');
route::get('/re_Order/{id_order}','CheckoutController@re_Order')->name('re_Order');

route::get('/logoutcus','CheckoutController@logout')->name('logoutcus');
route::get('/changeInfo/{id}','CheckoutController@getChangeInfo');
route::post('/changeInfo/{id}','CheckoutController@postChangeInfo');

//'middleware' => 'CheckLogin'



//admin 'middleware'=>'check' 'middleware' => 'check'
route::group(['prefix'=>'admin','namespace'=>'Backend'],function(){
	
	
	//home admin
	route::get('home','HomeAdminController@home')->name('adminhome');
	
	
	//account
	route::group(['prefix'=>'account'],function(){
		route::get('list','AccountController@getList')->name('listAccount');
		route::get('addAccount','AccountController@addAccount');
		route::post('addAccount','AccountController@PostAddAccount');
		route::get('edit/{id}','AccountController@getEdit');
		route::post('edit/{id}','AccountController@postEdit');
		route::get('delete/{id}','AccountController@deleteAccount');
	});
	//nha cung cap
	route::group(['prefix'=>'ncc'],function(){
		route::get('list','nccController@getList')->name('listNcc');
		route::get('addNcc','nccController@GetAddNcc');
		route::post('addNcc','nccController@PostAddNcc');
		route::get('edit/{id}','nccController@getEditNcc');
		route::post('edit/{id}','nccController@postEditNcc');
		route::get('delete/{id}','nccController@getDeleteNcc');
	});

	//PRODUCT
	route::group(['prefix'=>'product'],function(){
		route::get('listproduct','ProductController@listproduct')->name('listproduct');
		route::get('AddPro','ProductController@GetAddPro');
		route::post('AddPro','ProductController@PostAddPro');
		route::get('editPro/{id}','ProductController@getEditPro');
		route::post('editPro/{id}','ProductController@postEditPro');
		route::get('deletePro/{id}','ProductController@getDeletePro');
	});

	//IO
	route::group(['prefix'=>'IO'],function(){
		route::get('listIO','IOController@listIO')->name('listIO');
		route::get('AddIO','IOController@GetAddIO')->name('addIO');
		route::post('AddPro','IOController@PostAddIO');
		route::get('editPro/{id}','IOController@getEditPro');
		route::post('editPro/{id}','IOController@postEditPro');
		route::get('deletePro/{id}','IOController@getDeletePro');


		route::get('addProduct_of_IO/{id}','IOController@getAddPro_of_IO');
		route::post('addProduct_of_IO/{id}','IOController@postAddPro_of_IO')->name('postAddPro_of_IO');
		//addProduct_of_IO/{{$r->id_import_order}}
	});
	
		
});
route::get('/login','Backend\LoginController@getLogin')->name('getLogin');
route::post('/login','Backend\LoginController@postLogin')->name('postLogin');	
route::get('/logout','Backend\LoginController@logout')->name('logoutadmin');





