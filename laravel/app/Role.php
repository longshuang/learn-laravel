<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //定义表名(这里与模型Student是多对多的关系,所以需要roles(+s),否则数据库查询失败失败)
    protected $table = 'roles';
    //定义主键
    protected $primaryKey = 'id';
    //定义属性白名单
    protected $fillable = ['role_name','role_describe'];
}
