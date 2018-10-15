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

Route::get('/', [
    'as' => 'trang-chu',
    'uses' => 'PageController@getIndex'
]);
Route::get('index',[
    'as' => 'trang-chu',
    'uses' => 'PageController@getIndex'
]);

Route::get('loai-san-pham/{type}',[
    'as' => 'loai-san-pham',
    'uses' => 'PageController@getLoaiSP'
]);

Route::get('chi-tiet-san-pham/{id}',[
    'as' => 'chi-tiet-san-pham',
    'uses' => 'PageController@getChiTietSP'
]);

Route::get('lien-he',[
    'as' => 'lien-he',
    'uses' => 'PageController@getLienHe'
]);

Route::get('gioi-thieu',[
    'as' => 'gioi-thieu',
    'uses' => 'PageController@getGioiThieu'
]);

Route::get('add-to-cart/{id}',[
    'as' => 'themgiohang',
    'uses' => 'PageController@addtoCart'
]);

Route::get('delete-cart/{id}',[
    'as' => 'deletecart',
    'uses' => 'PageController@delItemCart'
]);

Route::get('get-checkout',[
    'as' => 'getcheckout',
    'uses' => 'PageController@getCheckout'
]);

Route::post('get-checkout',[
    'as' => 'getcheckout',
    'uses' => 'PageController@postCheckout'
]);

Route::get('signup',[
    'as' => 'signup',
    'uses' => 'PageController@getSignup'
]);

Route::post('signup',[
    'as' => 'signup',
    'uses' => 'PageController@postSignup'
]);

Route::get('login',[
    'as' => 'login',
    'uses' => 'PageController@getLogin'
]);

Route::post('login',[
    'as'=>'login',
    'uses'=> 'PageController@postLogin'
]);

Route::get('logout',[
    'as'=>'logout',
    'uses'=>'PageController@postLogout'
]);

Route::get('search',[
    'as'=>'search',
    'uses'=>'PageController@getSearch'
]);

Route::get('admin/dangnhap','UserController@getDangnhap');
Route::post('admin/dangnhap','UserController@postDangnhap');

Route::get('admin/dangxuat','UserController@getLogout');

Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
    Route::get('trangchu','DashBoardController@getTrangChu');

    Route::group(['prefix'=>'bills'],function(){
        Route::get('danhsach','BillsController@getDanhSach');

        Route::get('them','BillsController@getThem');
        Route::post('them','BillsController@postThem');

        Route::get('sua/{id}','BillsController@getSua');
        Route::post('sua/{id}','BillsController@postSua');
    });
    Route::group(['prefix'=>'bill_detail'],function(){
        Route::get('danhsach','AdminController@getDanhSach');

        Route::get('them','AdminController@getThem');

        Route::get('sua','AdminController@getSua');
    });
    Route::group(['prefix'=>'customer'],function(){
        Route::get('danhsach','CustomerController@getDanhSach');

        Route::get('them','CustomerController@getThem');
        Route::post('them','CustomerController@postThem');

        Route::get('sua/{id}','CustomerController@getSua');
        Route::post('sua/{id}','CustomerController@postSua');

        Route::get('xoa/{id}','CustomerController@getXoa');
    });
    Route::group(['prefix'=>'products'],function(){
        Route::get('danhsach','ProductController@getDanhSach');

        Route::get('them','ProductController@getThem');
        Route::post('them','ProductController@postThem');

        Route::get('sua/{id}','ProductController@getSua');
        Route::post('sua/{id}','ProductController@postSua');

        Route::get('xoa/{id}','ProductController@getXoa');
    });
    Route::group(['prefix'=>'type_product'],function(){
        Route::get('danhsach','ProductTypeController@getDanhSach');

        Route::get('them','ProductTypeController@getThem');
        Route::post('them','ProductTypeController@postThem');

        Route::get('sua/{id}','ProductTypeController@getSua');
        Route::post('sua/{id}','ProductTypeController@postSua');

        Route::get('xoa/{id}','ProductTypeController@getXoa');
    });
    Route::group(['prefix'=>'slide'],function(){
        Route::get('danhsach','SlideController@getDanhSach');

        Route::get('them','SlideController@getThem');
        Route::post('them','SlideController@postThem');

        Route::get('sua/{id}','SlideController@getSua');
        Route::post('sua/{id}','SlideController@postSua');

        Route::get('xoa/{id}','SlideController@getXoa');
    });
    Route::group(['prefix'=>'user'],function(){
        Route::get('danhsach','UserController@getDanhSach');

        Route::get('them','UserController@getThem');
        Route::post('them','UserController@postThem');

        Route::get('sua/{id}','UserController@getSua');
        Route::post('sua/{id}','UserController@postSua');

        Route::get('xoa/{id}','UserController@getXoa');
    });
});

