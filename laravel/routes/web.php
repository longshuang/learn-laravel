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

Route::get('/', function () {
    return view('welcome');
});

//测试
//['as'=>'test','uses'=>'TestController@test']
Route::get('/test',['as'=>'test','uses'=>'TestController@test']);

//设置缓存
Route::get('/setRedis',['as'=>'setRedis','uses'=>'RedisController@setRedis']);

//获取缓存
Route::get('/getRedis',['as'=>'getRedis','uses'=>'RedisController@getRedis']);

Auth::routes();

Route::get('/home', 'HomeController@index');

//文件上传
Route::any('/upload',['as'=>'upload','uses'=>'UploadController@upload']);

//发送邮件
Route::any('/sendMail',['as'=>'sendMail','uses'=>'MailController@sendMail']);

//设置缓存(file)
Route::get('/setCache/value/{value}',['as'=>'fileCache','uses'=>'CacheController@setCache']);

//获取缓存(file)
Route::get('/getCache',['as'=>'fileCache','uses'=>'CacheController@getCache']);

//邮件队列
Route::get('/MailQueue/email/{email}',['as'=>'queue','uses'=>'MailqueueController@Inqueue']);

//错误页面跳转
Route::get('/error',['as'=>'queue','uses'=>'LogController@error']);

//事件
Route::get('/order/orderid/{orderid}',['as'=>'order','uses'=>'OrderController@ship']);
