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
    protected $fillable = ['name', 'age', 'sex'];

    //属性转换
    protected $casts = [
        //'字段'=>'最终转换的属性'
        'yutu' => 'array'
    ];

    //自定义访问器(用于从数据库读出数据的操作)
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    //自定义修改器(用于写入数据库的操作)
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst($value);
    }


    //与phone模型一对一的关系
//    public function phone()
//    {
//        //第一个参数是所关联的模型[,第二个是所关联模型的外键(默认为表名_id,即phone_id)[,第三个参数是Student的主键(默认主键为id)]]
//        return $this->hasOne('App\Phone', 'stu_id');
//    }

    //与Role模型多对多关系
    public function roles()
    {
        return $this->belongsToMany('App\Role', 'student_roles', 'stu_id', 'role_id');
    }

}
