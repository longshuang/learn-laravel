<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    //文件上传
    public function upload(Request $file){

        if($file->isMethod('POST')){
            $avatar = $file->file('avatar');
            //若上传成功，则继续执行
            if($avatar->isValid()){
                //获取扩展名
                $ext = $avatar->getClientOriginalExtension();
                //获取文件类型
                $type = $avatar->getClientMimeType();
                //获取临时路径
                $tmp = $avatar->getRealPath();
                $filename = date('Y-m-d H:i:s').'.'.$ext;
                $bool = Storage::disk('upload')->put($filename,file_get_contents($tmp));
                return $bool==true ? '上传成功': '上传失败,请重新上传!';
            }
        }

        return view('upload.upload');

    }
}
