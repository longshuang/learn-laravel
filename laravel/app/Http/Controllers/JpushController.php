<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JPush\Client;

class JpushController extends Controller
{
    //极光推送
    public function Jpush()
    {
        $Client = new Client('123','456');
        $content =  $Client->xtest('255');
        return $content.'-'.config('Jpush.key');

    }
}
