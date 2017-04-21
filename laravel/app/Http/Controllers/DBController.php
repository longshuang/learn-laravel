<?php

namespace App\Http\Controllers;

use App\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DBController extends Controller
{
    //数据库操作之原始方式
    public function DB_CURD()
    {

//        //查询
//        $arr = DB::select("SELECT * FROM student WHERE id=?", [1]);
//        dd($arr);

//        //新增
//        $bool = DB::insert("INSERT INTO student (`name`,age,sex) VALUES(?,?,?)", ['longyi', 28, 1]);
//        return $bool == true ? 'success!' : 'failed';

//        //修改,返回影响的行数
//        $num = DB::update("UPDATE student SET name=? WHERE id=?", ['tianyao', 1]);
//        return $num;
//        //删除
//        $bool = DB::delete('DELETE FROM student WHERE id=?', [1]);
//        return $bool == true ? 'delete success!' : 'delete failed!';

    }

    //数据库操作之查询构造器新增
    public function insert(){

        //插入一条数据,返回值是true或false
//        $bool = DB::table('student')->insert(
//            ['name'=>'xiaoyao','age'=>19,'sex'=>1]
//        );
//        dd($bool);
//        echo "<br />";

//        //插入一条数据,返回的是自增ID
//        $id = DB::table('student')->insertGetId(
//            ['name'=>'xiaoyi','age'=>20,'sex'=>0]
//        );
//        dd($id);
//        echo "<br />";

        //批量插入数据,返回值是true或false
        $bool = DB::table('student')->insert([
            ['name'=>'xiaotian','age'=>16,'sex'=>1],
            ['name'=>'xiaozhu','age'=>21,'sex'=>0],
            ['name'=>'xiaoshuang','age'=>19,'sex'=>0]
        ]);
        dd($bool);
    }

    //数据库操作之查询构造器更新
    public function update(){
        $arr = array();

        //更新数据,返回受影响行数
        $arr[0] = DB::table('student')->where('id',1)->update(['name'=>'one']);
        //自增,返回受影响行数
        $arr[1] = DB::table('student')->where('id',2)->increment('age');
        //自增大于1,返回受影响行数
        $arr[2] = DB::table('student')->where('id',3)->increment('age',5);
        //自减,返回受影响行数
        $arr[3] = DB::table('student')->where('id',4)->decrement('age');
        //自减大于1,返回受影响行数
        $arr[4] = DB::table('student')->where('id',5)->decrement('age',3);

        //自增的同时,更新其他字段
        $arr[5] = DB::table('student')->where('id',6)->increment('sex',1,['name'=>'tiantian']);

        //同时更新多个值,返回受影响行数
        $arr[6] = DB::table('student')->where('id',7)->update(['name'=>'seven','age'=>11]);

        dd($arr);

    }

    //数据库操作之查询构造器删除
    public function delete(){

        $arr = array();
        //删除数据,返回删除的行数
        $arr[0] = DB::table('student')->where('id',2)->delete();
        //删除数据,where条件
        $arr[1] = DB::table('student')->where('id','>=',6)->delete();

        //删除表中所有数据
//        DB::table('student')->truncate();
        dd($arr);

    }

    //数据库操作之查询构造器查询
    public function query(){

//        //获取结果集(简单where条件)
//        $arr1 = DB::table('student')->where('id','>=',3)->get();
//        //获取结果集(复杂where条件)
//        $arr2 = DB::table('student')->whereRaw('id >= ? and id <= ?',[3,5])->get();
//        //获取结果集中的第一条(配合order by使用)
//        $arr3 = DB::table('student')->orderBy('id','DESC')->first();


        //pluck 指定返回字段
//        $arr = DB::table('student')->where('id',3)->pluck('name');
//        dd($arr);
//
//        //lists 返回指定返回字段，可以使用指定字段作为返回字段的下标(实验失败)
//        $arrx = DB::table('student')->lists('name','id');
//        dd($arrx);

//        //select 正定返回字段,可多个
//        $arr = DB::table('student')->select('name','age')->get();
//        dd($arr);

        //chunk 分段查出,第一个参数是每次查询的数量,第二个是闭包函数(使用失败)
//         DB::table('student')->chunk(2,function($arr){
//            dd($arr);
//             //下面可以写查询停止条件,如id大于多少时停止
//        });
    }

    //数据库操作之查询构造器聚合函数
    public function JuHe(){

        //获取记录行数
        $arr = array();
        $arr[0] = DB::table('student')->where('id','>',3)->count('id');
        //获取最大id
        $arr[1] = DB::table('student')->where('id','>',3)->max('id');
        //获取最小id
        $arr[2] = DB::table('student')-> where('id','>',3)->min('age');
        //获取id和值
        $arr[3] = DB::table('student')->where('id','>',3)->sum('id');
        //获取id平均值
        $arr[4] = DB::table('student')->where('id','>',3)->avg('id');

        dd($arr);
    }

    //数据库操作之Eloquent之查询
    public function Equery(){
//        $student = Student::all();
//        dd($student);

        //find() 根据主键查找
//        $student = Student::find(4);
//        dd($student);

        //findOrFail() 根据主键查找,若找不到,直接报错
//        $student = Student::findOrFail(7);
//        dd($student);
//
        //get() 获取所有数据
//        $student = Student::get();
//        dd($student);
//
        //where查询
//        $student = Student::where('id','>',3)->orderBy('id','ASC')->first();
//        dd($student);

        //chunk 分段显示,可使用
//        echo '<pre>';
//        Student::chunk(2,function($students){
//            var_dump($students);
//        });

        //聚合函数的使用
        $arr[0] = Student::count('id');
        $arr[1] = Student::where('age','>',13)->max('age');
        $arr[2] = Student::where('id','>=',4)->avg('age');

        dd($arr);

    }

    //数据库操作之Eloquent之修改
    public function Eupdate(){

        //更新单条数据
//        $student = Student::find(3);
//        $student->name = 'three';
//        $bool = $student->save();
//        dd($bool);

        //批量更新数据
        $num = Student::where('id','>','6')->update(['age'=>25]);
        dd($num);

    }

    //数据库操作之Eloquent之删除
    public function Edelete(){

        //通过模型删除
//        $student = Student::find(8);
//        $bool = $student->delete();
//        dd($bool);

        //通过主键删除一条记录
//        $num = Student::destroy(3);
//        dd($num);
        //通过主键,批量删除数据
//        $num = Student::destroy([4,5]);
//        dd($num);

        //where条件删除
        $num = Student::where('id','>=',9)->delete();
        dd($num);
    }

    //数据库操作之Eloquent之新增
    public function Einsert(){

        //新增一条数据
//        $student = new Student();
//        $student->name = 'xiaolong';
//        $student->age = 15;
//        $student->sex = 0;
//        $student->save();

        //create()新增一条数据
//        Student::create([
//            ['name'=>'zhuzhu', 'age'=>21, 'sex'=>0],
//        ]);

        //firstOrCreate() 以属性值查找数据,若不存在,则建立并返回新的实例,并自动保存进数据库
//        $student = Student::firstOrCreate(
//            ['name'=>'xiaoyiyi']
//        );
//
//        dd($student);

        //firstOrNew() 以属性值查找数据,若不存在,则建立并返回新的实例,需要使用save()保存
//        $student = Student::firstOrNew(
//            ['name'=>'tian','age'=>1]
//        );
//        $student->save();
    }

    //Eloquent 访问器使用
    public function Evisit(){

        $student = Student::where('id',3)->get();
        //print_r($student[0]->name);

        $name = $student[0]->name;
        print_r($name);
    }

    //Eloquent 修改器
    public function Emodifier(){

        $student = new Student();
        $student->name = 'tiantian';
        $student->age = 20;
        $student->sex = 1;
        $student->save();

    }

    //Eloquent 属性转换
    public function EchangeAttr(){

        $student = Student::find(1);
        print_r(@$student->yutu);
    }

}
