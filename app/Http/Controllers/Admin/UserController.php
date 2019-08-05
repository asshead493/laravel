<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
// 导入模型类
use App\Models\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //把集合数据转换为数组
        // $res=User::get()->toArray();
        //蒋集合转换为json格式
        // $res1=User::get()->toJson();
        // echo "<pre>";
        // var_dump($res1);
        // die;
        //列表
        // echo "this is index";
        $k=$request->input('keywords');
        $kk=$request->input('keywordss');
        $user=User::where("name","like","%".$k."%")->where("email","like","%".$kk."%")->paginate(2);
         return view("Admin.User.index",['user'=>$user,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //添加
        // echo "this is add";
        // 加载模板 
        return view("Admin.User.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all()); 
        $data=$request->except(['_token']);
        //密码加密
        $data['password']=Hash::make($data['password']);
        $data['status']=1;//1 代表禁用
        //用模型类插入数据
        if(User::create($data)){
            echo "ok";
        }else{
            echo "error";
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
        //获取需要修改的数据
        $user=User::where("id","=",$id)->first();
        return view("Admin.User.edit",['user'=>$user]);
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
        echo $id;
        // 获取修改数据
        $data=$request->except(['_token','_method']);
        if(User::where("id","=",$id)->update($data)){
            return redirect("/adminuser")->with("success","修改成功");

        }else{
            return redirect("/adminuser/$id/edit")->with("error","修改失败");
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
        //删除
        if(User::where("id","=",$id)->delete()){
            return redirect("/adminuser")->with("success","删除成功");
        }else{
            return redirect("/adminuser")->with("error","删除失败");
        }       
    }
    //获取会员的详情信息 $id 会员id
    public function userinfo($id){
        // echo $id;
        $userinfo=User::find($id)->info;
        // dd($userinfo);
        // 加载视图
        return view("Admin.User.info",['info'=>$userinfo]);
    }
    //获取会员下的所有收货地址
    public function useraddress($id){
        // echo $id;
        //调用模型类的address
        $address=User::find($id)->address;
        // dd($address);
        return view("Admin.User.address",['address'=>$address]);
    }
}
