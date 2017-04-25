<?php

namespace App\Http\Controllers;

use App\Mail\RegMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    //注册管理员
    public function RegAdmin(){

        $text = "这是laravel学院，恭喜你，通过了管理员验证!";
        Mail::to('827193289@qq.com')->queue(new RegMail());
    }
}
