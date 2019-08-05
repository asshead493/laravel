<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//引入哈希类
use Hash;
use DB;
use App\Http\Requests\UsersInsert;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response正整数,
     */
    public function index(Request $request)
    {
        //搜索关键词获取到
        $k=$request->input("keywords");
        $kk=$request->input("keywordss");
        //加载列表
        // echo "this is index";
        //获取users数据
        $users=DB::table("users")->where("username","like","%".$k."%")->where("email","like","%".$kk."%")->paginate(2);
        // 加载列表视图
        return view("Admin.Users.index",['users'=>$users,'request'=>$request->all()]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载添加视图
    // echo "this is add";
        return view("Admin.Users.add");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersInsert $request)
    {
        //执行添加
        // dd($request->all());
        //除去_token
        $data=$request->except(['_token','repassword']);
        $data['password']=Hash::make($data['password']);
        // dd($data);
        // 入库
        if(DB::table("users")->insert($data)){
            // echo "sada";
            return redirect("/adminusers")->with("success","添加成功");
        }else{
            return back();
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
       // echo $id;
       // 获取需要修改的数据
       	$info=DB::table("users")->where("id","=",$id)->first();
       	return view("Admin.Users.edit",['info'=>$info]);
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
        // echo $id;
        //封装需要修改的数据
        //dd($request->all());
       	$data=$request->except(['_token','_method']);
       	// dd($data);
       	if (DB::table("users")->where("id","=",$id)->update($data)) {
       		return redirect("/adminusers")->with("success","修改成功");
       	}else{
       		return redirect("/adminusers/$id/edit")->with("error","修改失败");
       	}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       // echo $id;
      	if(DB::table("users")->where("id","=",$id)->delete()){
      		return redirect("/adminusers")->with("success","删除成功");
      	}else{
      		return redirect("/adminusers")->with("error","删除失败");
      	}
    }
}
