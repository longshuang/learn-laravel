<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //定义表名
    protected $table = 'countries';
    //定义主键
    protected $primaryKey = 'id';
    //定义属性白名单
    protected $fillable = ['name'];

    /**
     * 获取指定国家的所有电话(远层一对多)
     */
    public function Phone()
    {
        //第一个参数是最终关联的模型,第二个参数是中间模型,第三个参数是中间模型的外键,第四个参数是最终关联模型的外键,第五个参数是本地主键
        return $this->hasManyThrough('App\Phone','App\Student','country_id','stu_id','id');
    }
}
