<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //声明请求对象
    public function index(Request $request)
    {
        // echo "<pre>";
        // var_dump($request);
        // 获取请求路径
        // $path=request->path();
        //获取完整的路由
        $url=$request->url();
        // echo $url;die;
        // echo "ok"; 
        // 获取请求方式
        $method=$request->method();
        //检测当前请求方式
        $res=$request->isMethod("GET");
        //获取所有参数
        $input = $request->all();
        //提取单个参数
        $age=$request->input('age');
        //获取指定参数
        $onlyparams=$request->only(['name','age']);
        //获取除了某个参数之外的参数
        $exceptparams=$request->except(['sex']);
        //设置默认值
        $hobby=$request->input('hobby','baseball');
        //检测参数是否存在
        $data=$request->has('name');
        //存储cookie方法一
        return response("666")->withCookie("php217","goods",1);
        //获取cookie一
        echo $request->cookie("php217");
        //设置cookie二
        // \Cookie::queue('php217s',"goods",1);
        //获取cookie二
        // echo \Cookie::get("php217s");
        //设置session信息
        // session(['lamp217'=>"very goods"]);
        //获取session
        // echo session('lamp217');
        //删除session
        // $request->session()->pull('lamp217');
        // dd() 可以打印数据的同时终止脚本 
        // dd($data);
        // echo "哈哈";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载表单
        return view("Admin.Req.req");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name=$request->input("name");
        //把所有的参数保存在闪存里
        // $request->flash();
        // 把部分参数保存在闪存里
         // $request->flashOnly('email');
         // 除去某些参数之外的参数
         // $request->flashExcept('email');
         // 
        //判断
        if($name==null){
            // echo "the name is not empty";
            // 阻止表单提交
            // return back();
            //阻止页面提交的同时,将全部的参数信息写入闪存里
            return back()->withInput(); 

        }else{
            echo "sddsasd";
        }
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
