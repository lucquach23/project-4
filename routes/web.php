<?php

use Illuminate\Support\Facades\Route;
//namespace App\Http\Controllers\Backend;
//use Illuminate\Routing\RedirectorRedirectorRedirectResponseroute
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//mặc định
// Route::get('/admin', function () {
//   return view('LayoutsAdmin.home');
//  })->middleware('AdminRole');


//  Route::get('/homeAdmin', function () {
// 	return view('LayoutsAdmin.home');
//    })->middleware('AdminRole');



// route::get('/login',function()
// {
// 	return view('LayoutsAdmin.login');
// })->name('login');
//route::get('/homeadmin','HomeController@index');

// Route::get('/account', function () {
// 	return view('LayoutsAdmin.account');
//    });


//route::post('postLogin','LoginController@postLogin')->name('postLogin');




route::group(['prefix'=>'admin','namespace'=>'Backend'],function(){
	route::group(['prefix'=>'account'],function(){
		route::get('list','AccountController@getList')->name('list');

		route::get('addAccount','AccountController@addAccount');
		route::post('addAccount','AccountController@PostAddAccount');


		route::get('edit/{id}','AccountController@getEdit');
		route::post('edit/{id}','AccountController@postEdit');

		route::post('delete/{id}','AccountController@deleteAccount');
	});
		
});








//Route::get('/homeadmin', function () {
    //return redirect()->route('login');
//});

// route::group(['middleware'=>'guest'],funciton()
// 	{

// route::match(['get','post'],'login','LoginController@index')
// 	}
// );























/*
//trả về view tự định nghĩa
Route::get('test', function () {
    return view('test');
});
route::get('user',function(){
	return 'user screen';
});
route::get('product',function(){
	return 'product screen';
});
route::get('news',function(){
	return 'news screen';
});
route::get('service',function(){
	return 'service screen';
});


//truyền vào 1 tham số
route::get('baiviet/{id}',function($id){
	return "bài viết số ${id}";
});

//truyền vào 2 tham số
route::get('baiviet/{id}/category/{catID}',function($id,$catID){
	return "bài viết số ${id} . category là: ${catID}";
});


//k truyền tham số có sử dung name
route::get('user-managament',function(){
	return 'my route use name';
})->name('myuser');

//truyền 2 tham số sử dụng name
route::get('user/{id}/branch/{id_br}',function($id,$id_br){
	return "user $id chi nhánh $id_br";
})->name('user.show');

//truyền 1 tham số  sử dụng name
route::get('hoa/{id}',function($id){
return "hoa $id";
})->name('hoa.show')->where('id','[a-z]+');
//để cấu hình điều kiện cho toàn bộ các id chỉ là số vào 
// app/Providers/RouterServiceProvider.php cấu hình trong public funciton boot()


//route group prefix



route::get('/','HomeController@index'); 

*/

// route::prefix('admin')->group(function(){

// 	route::get('account','AccountController@getList');
// 	route::get('user-managament','UserController@index')->name('backend.user.index');
// 	route::get('user-managament/create','UserController@create')->name('backend.user.create');


// 	route::post('user-managament/create','UserController@store')->name('backend.user.store');

// 	route::put('user-managament/update','UserController@update')->name('backend.user.update');




// 	route::get('product-managament','ProductController@index')->name('backend.product');

// 	route::get('news-managament', 'NewsController@index')->name('backend.news');
// });
