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
route::post('detail/cmt/{id}','Frontend\ShirtController@cmt');
route::post('detail/rate/{id}','Frontend\ShirtController@rate');
// route::post('/discount','Frontend\ShirtController@discount')->name('discount');
// route::post('/material','Frontend\ShirtController@material')->name('material');
// route::post('/PriceRange','Frontend\ShirtController@PriceRange')->name('PriceRange');
// route::post('/searchcus','Frontend\ShirtController@searchcus')->name('searchcus');


route::post('/discount','Frontend\ShirtController@discount')->name('discount');
route::get('/discount','Frontend\ShirtController@listShirt');

route::post('/PriceRange','Frontend\ShirtController@PriceRange')->name('PriceRange');
route::get('/PriceRange','Frontend\ShirtController@listShirt');

route::post('/material','Frontend\ShirtController@material')->name('material');
route::post('/PriceRange','Frontend\ShirtController@PriceRange')->name('PriceRange');
route::post('/searchcus','Frontend\ShirtController@searchcus')->name('searchcus');
route::get('/searchcus','Frontend\ShirtController@listShirt');




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


	//customer
	route::group(['prefix'=>'customer'],function(){
		route::get('listCus','CustomerController@listCus')->name('listCus');
		route::get('active/{id}','CustomerController@active');
		route::get('un_active/{id}','CustomerController@un_active');
		
	});

	//PRODUCT
	route::group(['prefix'=>'product'],function(){
		route::get('listproduct','ProductController@listproduct')->name('listproduct');
		route::get('AddPro','ProductController@GetAddPro')->name('getaddpro');
		route::post('AddPro','ProductController@PostAddPro');
		route::get('editPro/{id}','ProductController@getEditPro');
		route::post('editPro/{id}','ProductController@postEditPro');
		route::get('deletePro/{id}','ProductController@getDeletePro');
	});

	//IO
	route::group(['prefix'=>'IO'],function(){
		route::get('listIO','IOController@listIO')->name('listIO');
		route::get('AddIO','IOController@AddIO')->name('addIO');
		
		route::get('deleteIO/{id}','IOController@getDeleteIO');
		route::get('/viewDetailIO/{id}','IOController@viewDetailIO');

		route::get('addProduct_of_IO/{id}','IOController@getAddPro_of_IO');
		route::post('addProduct_of_IO/{id}','IOController@postAddPro_of_IO')->name('postAddPro_of_IO');
		route::get('viewDetailIO/deletePro/{id}','IOController@getDeletePro');
		route::get('viewDetailIO/editPro/{id}','IOController@getEditPro');
		route::post('viewDetailIO/editPro/{id}','IOController@postEditPro');
	});




	route::group(['prefix'=>'order'],function(){
		route::get('list_order','OderController@list_order')->name('list_order');
		route::get('confirm_order/{id}','OderController@confirm_order');

		route::get('list_order_confirmed','OderController@list_order_confirmed')->name('listOrderConfirmed');
		route::get('confirmed_to_shiping/{id}','OderController@confirmed_to_shiping');


		route::get('list_order_shiping','OderController@list_order_shiping')->name('listOrderShiping');
		route::get('shiping_to_paymented/{id}','OderController@shiping_to_paymented');
		
		route::get('list_order_paymented','OderController@list_order_paymented')->name('listOrderPaymented');

		route::get('list_order_distroyed','OderController@list_order_distroyed')->name('listOrderDistroyed');

		route::get('distroy_order/{id}','OderController@distroy_order');

		route::get('print_order/{checkout_code}','OderController@print_order');


		
	});
		
});
route::get('/login','Backend\LoginController@getLogin')->name('getLogin');
route::post('/login','Backend\LoginController@postLogin')->name('postLogin');	
route::get('/logout','Backend\LoginController@logout')->name('logoutadmin');





