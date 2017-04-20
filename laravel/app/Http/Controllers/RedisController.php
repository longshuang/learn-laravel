<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class RedisController extends Controller
{
    //设置缓存
    public function setRedis(){

        Redis::set('name','xiaoyi');
    }

    //获取缓存
    public function getRedis(){

        $value = Redis::get('name');
        return $value;
    }
}
