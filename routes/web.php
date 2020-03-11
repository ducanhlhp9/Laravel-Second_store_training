<?php

Auth::Routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/shop', 'HomeController@shop')->name('shop');
Route::get('/news', 'HomeController@news')->name('news');
Route::get('contact','ContactController@getContact')->name('get.contact');
Route::post('contact','ContactController@saveContact');
Route::get('search','HomeController@search')->name('search');
Route::get('test', function () {
   return view('home.test') ;
});

Route::get('/category/{slug}-{id}','CategoryController@getListProduct')->name('get.list.product');
Route::get('/detail/{slug}-{id}','ProductDetailController@productDetail')->name('get.detail.product');
Route::get('/news/{slug}-{id}','NewsController@NewsDetail')->name('get.detail.news');

route::prefix('shopping')->group(function (){
    route::get('/add/{id}','ShoppingCartController@addProduct')->name('add.shopping.cart');
    route::get('/delete/{id}','ShoppingCartController@deleteProductItem')->name('delete.shopping.cart');
    route::get('/list','ShoppingCartController@getListShoppingCart')->name('get.list.shopping.cart');

});
//route::group(['prefix'=> 'cart','middleware'=>'CheckLoginUser'],function (){
//    route::get('/thanh-toan','ShoppingCartController@getFormPay')->name('get.form.pay');
//    route::post('/thanh-toan','ShoppingCartController@saveInfoShoppingCart');
//
//});
//route::group(['prefix'=> 'ajax','middleware'=>'CheckLoginUser'],function (){
//    route::post('/rating/{id}','RatingController@saveRating')->name('post.rating.product');
//});
//route::group(['prefix'=> 'ajax','middleware'=>'CheckLoginUser'],function (){
//    route::post('/comment/{id}','CommentController@saveComment')->name('post.comment.article');
//});
route::group(['prefix'=> 'cart','middleware'=>'CheckLoginUserInterface'],function (){
    route::get('/thanh-toan','ShoppingCartController@getFormPay')->name('get.form.pay');
    route::post('/thanh-toan','ShoppingCartController@saveInfoShoppingCart');
});
Route::prefix('user')->middleware('CheckLoginUser')->group(function() {
    route::group(['prefix'=> 'ajax'],function (){
        route::post('/rating/{id}','RatingController@saveRating')->name('post.rating.product');
    });
    route::group(['prefix'=> 'ajax'],function (){
        route::post('/comment/{id}','CommentController@saveComment')->name('post.comment.article');
    });
    // group dùng để nhóm các Route  lại
});
route::group(['namespace'=>'Auth'],function (){
    route::get('register','RegisterController@getRegister')->name('get.register');
    route::post('register','RegisterController@postRegister')->name('post.register');
    route::get('login','LoginController@getLogin')->name('get.login');
    route::post('login','LoginController@postLogin')->name('post.login');

    route::get('logout','LoginController@getLogout')->name('get.logout.user');
});
route::group(['prefix'=> 'user','middleware'=>'CheckLoginUser'],function (){
    route::get('/','UserController@index')->name('user.dashboard');
});
