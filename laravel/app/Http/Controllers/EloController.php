<?php

namespace App\Http\Controllers;

use App\Country;
use App\Message;
use App\Phone;
use App\Student;
use App\Vedio;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EloController extends Controller
{
    //Eloquent 关联模型操作(注意:你可以在关联关系上使用任何查询构建器！)

    //Phone与Student一对一
    public function EhasOne()
    {

        //后面跟的phone,即为Student模型中的phone()方法,可将其看做Student的动态属性
        $phone = Student::find(2)->phone;
        var_dump($phone->phonenumber);

    }

    //Phone与Student相对关联
    public function Erelative()
    {

        $student = Phone::find(1)->student;
        print_r($student->age);

    }

    //Message与Comment 一对多
    public function EhasMany()
    {
        //获取最近执行的sql语句
        //DB::connection()->enableQueryLog();

        $comment = Message::find(1)->comment;

        //可添加更多外键约束(where orderBy等等)
        //$comment = Message::find(1)->comment)->where('title', 'foo')->first();

        //sql 语句调试输出(无法用于错误sql语句)
        //$log = DB::getQueryLog();
        foreach ($comment as $value) {
            echo $value->c_content . '<br />';
        }

    }


    //Student与Role 多对多
    public function EManyToMany()
    {

        $student_role = Student::find(1)->roles()->get();
        foreach ($student_role as $value) {

            dd($value->role_name);
        }
    }


    /**
     * 远层一对多,例如:当需要获取给定国家的所有电话,表结构为:
     * countries:id-intger,name-varchar(15);
     * student:id-intger,country_id等等
     * message:id-intger,user_id-intger
     */
    public function EmultihasOne()
    {

        $info = Country::find(1)->Phone()->get();
        dd($info);
    }

    /**
     *单关联的多态关联(多态关联允许一个模型在单个关联下属于多个不同模型)。
     *例如:应用用户既可以对文章进行评论也可以对视频进行评论,表结构如下:
     * message:id-intger,content-varchar(150),create_at
     * vedio:id-intger,v_url-varchar(40)
     * comment:id-intger,commentable_id-intger(message或vedio的id),commentable_type-varchar(10)(message或vedio)
     */
    public function Esinglemorph()
    {

        //注意comment_type的值应该是App\Video或者App\Message
        $info = Vedio::find(2)->comments()->get();
        dd($info);

    }

    /**当以属性方式访问数据库关联关系的时候，关联关系数据是“懒惰式加载”的，这意味着关联关系数据直到第一次访问的时候才被加载。
     * 渴求式加载:Eloquent 还可以在查询父级模型的同时”渴求式加载“关联关系。渴求式加载缓解了N+1查询问题，要阐明N+1查询问题
     * 例如:获取说说的评论,如果一条说说有20条评论,懒惰式加载(1条说说+20条评论=21次加载);渴求式加载(1条说说+一次性获取所有评论=2次加载)
     */
    public function Edesire()
    {

        //DB::connection()->enableQueryLog();

        //渴求式加载(渴求式加载,一般需要些逆向关联关系(即belongsTo()))
        $comment = Comment::where('m_id', 1)->with('message')->get();
        //渴求式加载多个关联关系
        //$comment = Comment::where('m_id',1)->with('message','student')->get();
        //嵌套的渴求式加载
//        $student = Student::with(['message' => function ($query) {
//            $query->where('content', 'like', '%hello%');
//        }])->get();
        //在某种条件下渴求式加载
//        $comment = Comment::all();
//        if (true) {
//            $comment->load('message');
//        }


        $log = DB::getQueryLog();
        //dd($log);
        foreach ($comment as $value) {
            echo $value->c_content . '<br />';
        }
    }

    //Eloquent 关联模型操作 : delete
    public function ER_delete()
    {
        //注意,该处不会删除说说
        $num = Message::find(1)->comment()->delete();
        dd($num);

    }

    //Eloquent 关联模型操作 : update
    public function ER_update()
    {
        $num = Message::find(1)->comment()->update(['c_content' => 'hello']);
        dd($num);
    }

}
