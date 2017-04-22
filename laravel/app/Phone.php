<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    //默认表名为Phones

    //自定义表名
    protected $table = 'phone';
    //定义主键
    protected $primaryKey = 'id';
    //定义属性白名单
    protected $fillable = ['id', 'stu_id', 'phone'];

    //定义相对关联
    public function student()
    {
        return $this->belongsTo('App\Student', 'stu_id');
    }


}
