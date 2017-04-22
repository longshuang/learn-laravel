<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vedio extends Model
{
    //定义表名
    protected $table = 'vedio';
    //定义主键
    protected $primaryKey = 'id';
    //定义属性白名单
    protected $fillable = ['v_url'];

    //单关联多态
    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
}
