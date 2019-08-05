<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//导入数据库类的操作
use DB;// Model.class.php
class DbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //数据库的基本练习
        //查询laravel库下的表
        // $res=DB::select("select * from stu");
        //数据插入
        // DB::insert("insert into stu (name,password)values('cc','sdadsada')");
        //删除数据
        // DB::delete("delete from stu where id=3");
        //修改
        // DB::update("update stu set name='sdasdad' where id=1");
        // 一般语句删除或新建表
        // DB::statement("drop table cates");
        // 构造器连贯操作的插入单条
        // DB::table('stu')->insert(["name"=>"aa","password"=>"sasad"]);
        // 插入多条数据
        // DB::table('stu')->insert([["name"=>"asasd","password"=>"sasad"],["name"=>"asadasd","password"=>"saadsd"]]);
        // 获取插入数据的id
        // $id=DB::table('stu')->insertGetId(["name"=>'sdasd','password'=>'sada']);
        // echo $id;
        //构造器获取所有的数据
        // $data=DB::table("stu")->get();
        // dd($data);
        //获取id为8的数据
        // $ress=DB::table("stu")->where("id","=",8)->first();
        // dd($ress);
        //获取单条结果某个字段的值
        // $name=DB::table("stu")->where("id","=",8)->value("name");
        // dd($name);
        //获取password一列数据
        // $p=DB::table("stu")->pluck("password");
        // echo $p;
        //删除id为8的数据
        // DB::table("stu")->where("id","=",8)->delete();
        //修改
        // DB::table("stu")->where("id","=",7)->update(['name'=>'www']);
        //获取指定字段  获取stu表 id和name值
        // $data1=DB::table("stu")->select("id","name")->get();
        //模糊搜索
        // $data2=DB::table("stu")->where("name","like","%s%")->get();
        // dd($data2);
        //获取name字段含有s并且password含有1的数据
        // $data3=DB::table("stu")->where("name","like","%s%")->where("password","like","%1%")->get();
        // dd($data3);
        //获取name字段里含有s或者password字段里含有4的数据
        // $data4=DB::table("stu")->where("name","like","%s%")->orWhere("password","like","%4%")->get();
        // dd($data4);
        // dd($data1);
        // dd($res);
        // return view("Admin.Db.index",['res'=>$res]);
        // 获取区间值
            // $res=DB::table('stu')->whereIn("id",[1,2,4])->get();
        //获取降序排列的stu表数据
        // $res=DB::table('stu')->orderBy("id","desc")->get();
        // 分页 2代表每页的数据条数
        // $res=DB::table("stu")->paginate(2);
        // return view("Admin.Db.index",['res'=>$res]);
        //两表关联 class和brand
        // $res=DB::table("class")->join("brand","class.id","=","brand.class_id")->get();
        // 三表关联 class brand shop
        // $res=DB::table("class")->join("brand","class.id","=","brand.class_id")->join("shop","brand.id","=","shop.brand_id")->get();
        // 获取两表关联里的 class的name字段值,brand的name值
        // $res=DB::table("class")->join("brand","class.id","=","brand.class_id")->select("class.name as cname","brand.name as bname")->get();
        //获取三表关联里的 class的name字段值,brand的name值,shop里的role值
        // $res=DB::table("class")->join("brand","brand.id","=","brand.class_id")->join("shop","shop.id","=","shop.brand_id")->select("class.name as cname","brand.name as bname","shop.role")->get();
        //获取数据总条数
        // $res=DB::table("stu")->count();
        // 获取字段的最大值
         // $res=DB::table("stu")->max('id');
         // 获取id一列的平均值
         // $res=DB::table("stu")->avg('id');
         // 
          dd($res);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
