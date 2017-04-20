<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CacheController extends Controller
{
    //缓存
    public function setCache(Request $request,$value){

        //forever()永久缓存
        //$bool = Cache::forever('key1',$value);
        $bool = Cache::add('key1',$value,600);

        return $bool==true ? 'Yes':'No';

    }

    //获取缓存
    public function getCache(){

        if(Cache::has('key1')){

            $value = Cache::get('key1');
            return $value;

        }
    }

}
