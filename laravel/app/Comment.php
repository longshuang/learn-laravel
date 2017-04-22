<?php
/**
 * 评论模型
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //定义表名
    protected $table = 'comment';
    //定义主键
    protected $primaryKey = 'id';
    //定义属性白名单
    protected $fillable = ['m_id', 'c_content', 'create_at', 'commentable_id', 'commentable_type'];
    //定义时间属性是否维护
    public $timestamps = false;

    //单关联多态
    public function commentable()
    {
        return $this->morphTo();
    }

    //一对多关联(message-comment)
    public function message()
    {
        return $this->belongsTo('App\Message', 'm_id');
    }

}
