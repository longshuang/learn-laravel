<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tool\Tool;

class ToolController extends Controller
{
    //app/tool
    public function tools()
    {

        return Tool::xtest('tool');

    }

}
