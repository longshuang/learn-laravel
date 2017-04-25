<?php

namespace App\Tool;

class Tool{

    public function __construct()
    {

    }

    //tool
    public static function xtest($reg_id){

        return $reg_id.'-app\tool';
    }
}