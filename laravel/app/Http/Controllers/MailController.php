<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
class MailController extends Controller
{
    //发送邮件
    public function sendMail(){


        //注意:MAIL_PASSWORD是客户端授权码，而不是邮箱密码
        Mail::raw('您好，这是laravel学院,欢迎学习laravel框架,请多多指教',function($message){

            $message->from('a787031584@163.com','xiaolong');
            $message->subject('这是关于laravel的学习,请多多关照...');
            $message->to('827193289@qq.com');

        });

    }
}
