<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogController extends Controller
{
    //错误跳转页面在resouce/view/error中
    public function error(){

        $student = null;

        if($student === NULL){
            abort('500');
        }
    }

}
