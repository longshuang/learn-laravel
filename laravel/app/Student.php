<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //若未指定表名，即表名为类的复数(Students)

    //指定表名
    protected $table = 'student';
    //指定主键
    protected $primaryKey = 'id';

    //由于laravel自动维护时间戳,所以需要手动关闭,这里必须是public
    public $timestamps = false;

    //指定可以赋值的字段(用于create)
    protected $fillable = ['name','age','sex'];

}
