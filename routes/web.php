<?php

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



Route::get('admin/{i}/{j}',function($i,$j){
		return $tong=$i+$j;;
});

Route::get('admin',function(){
		return 'Admin';
})->name('admin'); // định danh route

// chuyển hướng route cách 1
/*Route::get('user', function(){
	return redirect()->route('admin');
});*/ 

// chuyển hướng route cách 2
Route::get('user', function(){
	return redirect('admin');
}); 

//group
Route::group(['prefix'=>'admin'],function(){
	Route::get('home',function(){
		return 'Home';
	}); 
	Route::get('product',function(){
		return 'Product';
	}); 
});

//controller

Route::get('controller/{i}/{j}', 'MyController@getController');

//view

// Route::get('/', function () {
//     return view('test');
// });

Route::get('view', 'MyController@getView');

Route::get('blade', 'MyController@getPost');
//middleware
Route::get('')->middleware('Check');
Route::post('login', 'MyController@postLaravel');
Route::get('logout', 'MyController@Logout');
Route::get('login', 'MyController@Login');
Route::get('home', 'MyController@Home');

// SChema

Route::group(['prefix' => 'query'], function () {
	Route::get('insert', function () {
		// thêm một hàng
		// DB::table('user')->insert(['mail'=>'laravel@gmail.com', 'password'=>md5('1234')]);
		// thêm nhiều hàng
		DB::table('user')->insert([
			['mail'=>'laravel1@gmail.com', 'password'=>md5('1234')],
			['mail'=>'laravel2@gmail.com', 'password'=>md5('1234')],
			['mail'=>'laravel3@gmail.com', 'password'=>md5('1234')]
			]);
	});

	//cập nhật thông tin
	Route::get('update', function () {
		DB::table('user')->where('id','=',2)->update(['mail'=>'nvlinh1309@gmail.com']);
	});

	//select all

	Route::get('get', function () {
		$user=DB::table('user')->get();
		dd($user);
	});
	//select first
	Route::get('first', function () {
		$user=DB::table('user')->first();
		dd($user);
	});
	//select
	Route::get('select', function () {
		$user=DB::table('user')->select('mail', 'password')->get();
		dd($user);
	});
	//join
	Route::get('join', function () {
		$user=DB::table('user')->join('info','user.id','=','info.user_id')->select('mail', 'password')->get();
		dd($user);
	});
	//where and
	Route::get('where-and', function () {
		$user=DB::table('user')->where('id','>',3)->where('id','<',5)->get(); 
		dd($user);
	});
	//where or
	Route::get('where-or', function () {
		$user=DB::table('user')->where('id','=',3)->orwhere('id','=',5)->get(); 
		dd($user);
	});


	//orderby (desc giảm dần, asc tăng dần)
	Route::get('orderby', function () {
		$user=DB::table('user')->where('id','=',3)->orwhere('id','=',5)->orderBy('id','desc')->get(); 
		dd($user);
	});
	
	//skip(lấy hàng thứ- skip bắt đầu từ 0)-take(số hàng cần lấy)
	Route::get('skip-take', function () {
		$user=DB::table('user')->where('id','=',3)->orwhere('id','=',5)->orderBy('id','asc')->skip('1')->take('1')->get(); 
		dd($user);
	});

	//increment tẳng giá trị cột được gắn lên n đơn vị,
	
	Route::get('increment', function () {
		$user=DB::table('user')->where('id','=',2)->increment('id',4);
		dd($user);
	});
	//decrement ngược lại với increment
	Route::get('decrement', function () {
		$user=DB::table('user')->decrement('id',2);
		dd($user);
	});
	
	
});


