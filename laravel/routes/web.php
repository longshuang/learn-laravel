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

//数据库增删改查之原始方式
Route::get('/DBorigin',['as'=>'DB','uses'=>'DBController@DB_CURD']);

//数据库增删改查之查询构造器新增
Route::get('/DBinsert',['as'=>'DB','uses'=>'DBController@insert']);
//数据库增删改查之查询构造器更新
Route::get('/DBupdate',['as'=>'DB','uses'=>'DBController@update']);
//数据库增删改查之查询构造器删除
Route::get('/DBdelete',['as'=>'DB','uses'=>'DBController@delete']);
//数据库增删改查之查询构造器查询
Route::get('/DBquery',['as'=>'DB','uses'=>'DBController@query']);
//数据库增删改查之查询构造器聚合函数
Route::get('/DBjuhe',['as'=>'DB','uses'=>'DBController@JuHe']);

//数据库增删改查之EloquentORM使用之查询
Route::get('/Equery',['as'=>'Equery','uses'=>'DBController@Equery']);
//数据库增删改查之EloquentORM使用之更新
Route::get('/Eupdate',['as'=>'Equery','uses'=>'DBController@Eupdate']);
//数据库增删改查之EloquentORM使用之删除
Route::get('/Edelete',['as'=>'Equery','uses'=>'DBController@Edelete']);
//数据库增删改查之EloquentORM使用之新增
Route::get('/Einsert',['as'=>'Equery','uses'=>'DBController@Einsert']);
