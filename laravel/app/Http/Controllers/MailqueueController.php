<?php

namespace App\Http\Controllers;

use App\Jobs\Queue;
use Illuminate\Http\Request;

class MailqueueController extends Controller
{
    //将邮件写入队列
    public function Inqueue($email){

        $this->dispatch(new Queue($email));

    }
}
