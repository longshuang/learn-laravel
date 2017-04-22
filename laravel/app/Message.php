<?php
/**
 * 说说模型
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //自定义表名
    protected $table = 'message';
    //自定义主键
    protected $primaryKey = 'id';
    //自定义属性白名单
    protected $fillable = ['id', 'content', 'create_at'];


    //定义Message与Comment关系:一对多
    public function comment()
    {
        return $this->hasMany('App\Comment', 'm_id');
    }


    //单关联多态
    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
}
