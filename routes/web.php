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

route::get('listShirt','Frontend\ShirtController@listShirt')->name('listShirt');

route::get('listShirt/{id}','Frontend\ShirtController@typeShirt');

route::get('detail/{id}','Frontend\ShirtController@ViewDetail');
// route::group(['prefix'=>'category_shirt'],function(){
// 	route::get('so-mi-hoa-tiet','Frontend\TypeShirtController@listHoaTiet')->name('listHoaTiet');
// 	route::get('so-mi-trang','Frontend\TypeShirtController@listSoMiTrang')->name('listSoMiTrang');
// 	route::get('caro-ke-soc','Frontend\TypeShirtController@listCaro')->name('listCaro');
// 	route::get('so-mi-oxford','Frontend\TypeShirtController@listOxford')->name('listOxford');
// 	route::get('dress-shirt','Frontend\TypeShirtController@listDressShirt')->name('listDressShirt');
// 	route::get('so-mi-khoac-ngoai','Frontend\TypeShirtController@listOverShirt')->name('listOverShirt');
// 	route::get('so-mi-denim','Frontend\TypeShirtController@listDenim')->name('listDenim');
// });



route::get('/Add-Cart/{id}','CartController@AddCart');
route::get('/Delete-Item-Cart/{id}','CartController@DeleteItemCart');
route::get('/ListCart','CartController@ViewListCart');
route::get('/Delete-Item-List-Cart/{id}','CartController@DeleteListItemCart');
//route::get('/Save-Item-List-Cart/{id}/{quanty}','CartController@SaveListItemCart');
route::get('/Save-Item-List-Cart/{id}/{quanty}/{size}','CartController@SaveListItemCart');














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
