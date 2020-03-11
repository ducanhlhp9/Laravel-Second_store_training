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
Route::prefix('authenticate')->group(function (){
    Route::get('/login','AdminAuthController@getLogin')->name('admin.login');
    Route::post('/login','AdminAuthController@postLogin');
});
Route::prefix('admin')->middleware('CheckLoginAdmin')->group(function() {
    Route::get('/', 'AdminController@index')->name('Admin');

    Route::group(['prefix' => 'category'], function (){
        Route::get('/','AdminCategoryController@index')->name('admin.get.list.category');
        Route::get('/create','AdminCategoryController@create')->name('admin.get.create.category');
        Route::post('/create','AdminCategoryController@store');
        Route::get('/update/{id}','AdminCategoryController@edit')->name('admin.get.edit.category');
        Route::post('/update/{id}','AdminCategoryController@update');
        Route::get('/{action}/{id}','AdminCategoryController@action')->name('admin.get.action.category');

    });
    Route::group(['prefix' => 'Product'], function (){
        Route::get('/','AdminProductController@index')->name('admin.get.list.Product');
        Route::get('/create','AdminProductController@create')->name('admin.get.create.Product');
        Route::post('/create','AdminProductController@store');
        Route::get('/update/{id}','AdminProductController@edit')->name('admin.get.edit.Product');
        Route::post('/update/{id}','AdminProductController@update');
        Route::get('/{action}/{id}','AdminProductController@action')->name('admin.get.action.Product');
        Route::get('/upload','AdminProductController@uploadImage')->name('admin.files.uploadImage');
        Route::post('/upload','AdminProductController@uploadImage');

    });
    Route::group(['prefix' => 'article'], function (){
        Route::get('/','AdminArticleController@index')->name('admin.get.list.article');
        Route::get('/create','AdminArticleController@create')->name('admin.get.create.article');
        Route::post('/create','AdminArticleController@store');
        Route::get('/update/{id}','AdminArticleController@edit')->name('admin.get.edit.article');
        Route::post('/update/{id}','AdminArticleController@update');
        Route::get('/{action}/{id}','AdminArticleController@action')->name('admin.get.action.article');

    });
    route::group(['prefix'=>'users'], function (){
        route::get('/','AdminUserController@index')->name('admin.get.list.user');
        route::get('{action}/{id}','AdminUserController@action')->name('admin.get.action.user');
    });
    route::group(['prefix'=>'transaction'],function (){
        route::get('/','AdminTransactionController@index')->name('admin.get.list.transaction');
        route::get('/view/{id}','AdminTransactionController@viewOrder')->name('admin.get.view.order');
        Route::get('/active/{id}','AdminTransactionController@active')->name('admin.get.active.transaction');
        Route::get('/{action}/{id}','AdminTransactionController@action')->name('admin.get.action.transaction');

    });
    route::group(['prefix'=>'rating'], function (){
        route::get('/','AdminRatingController@index')->name('admin.get.list.rating');
    });
        route::get('logout','LogoutController@getLogout')->name('get.logout.admin');
    // group dùng để nhóm các Route  lại
});
