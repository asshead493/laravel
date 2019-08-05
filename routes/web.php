<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    // echo "三生三世";
    // echo date("Y-m-d H:i:s");
    //获取配置文件信息
    // echo Config::get("app.timezone");
    //设置配置信息
    // Config::set("app.locale","cn");
    // echo Config::get("app.locale");
    //获取快速配置文件信息env方法可以获取快速配置文件信息
    echo env("DB_PORT");
});
//基本路由 get 请求方式 /index路由规则 function匿名函数
//只要我们访问的url地址和路由规则匹配到的话，直接访问匿名函数
Route::get("/index",function(){
    echo "php217great";
});

Route::get("/home",function(){
    echo "this is home";
});

Route::post("/insert",function(){
    echo "this is insert";
});

//带参数的路由普通使用
Route::get("/delete/{id}",function($id){
echo "this is delete".$id;

});
//路由参数限制
Route::get("/edit/{name}",function($name){
echo "this is edit".$name;
})->where('name','[a-z]+');

//路由传递多个参数
Route::get("/index1/{id}-{name}",function($id,$name){
    echo "this is index1".$id.":".$name;
});
//路由别名
Route::get("/admins",['as'=>'a',function(){
    echo "aaaa";
}]);
//通过路由别名获取缘由的路由规则
Route::get("/b",function(){
    //route 路由函数可以通过路由别名获取原有路由规则
   echo route("a");
});
//路由组
Route::group([],function(){
//前台的首页
Route::get("/homeindex",function(){
    echo "this is homeindex";
});
//前台登录
Route::get("/homelogin",function(){
    echo "this is homelogin";
});
//前台的注册
Route::get("/homeregister",function(){
    echo "this is homeregister";
});
});
//后台路由组
Route::group([],function(){
//后台登录
Route::get("/adminlogin",function(){
    echo "this is adminlogin";
});
//后台首页
Route::get("/adminindex",function(){
    echo "this is adminindex";
});
//后台会员模块
Route::get("/homeuser",function(){
    echo "this is homeuser";
});
});
//加载登录模块
Route::get('/login',function(){
    return view("login");
});
//执行登录
Route::post('/dologin',function(){
    echo "this is dologin";
});
//Ajax get请求
Route::get("/ajaxget",function(){
    //加载视图
    return view('ajaxget');
});

Route::get("/dogetajax",function(){
    echo "this is dogetajax";
});
//Ajax post请求
Route::get("/ajaxpost",function(){
    return view('ajaxpost');
});
Route::post("/dopostajax",function(){
    echo "this is dopostajax";
});
//后台订单模块
Route::get("/adminorder",function(){
    echo "这是后台订单模块";
})->middleware("login");
//后台分类模块
Route::get("/admincate",function(){
    echo "这是后台分类模块";
})->middleware("login");
//中间件结合路由组
Route::group(["middleware"=>'login'],function(){
    //后台有情连接模块
    Route::get("/lists",function(){
        echo "this is lists";
    });
    //后台广告模块
    Route::get("/ads",function(){
        echo "this is ads";
    });
});
//控制器的使用
//控制器结合中间件一
Route::get('/userindex',"Admin\UserController@index")->middleware("login");
Route::get('/useradd',"Admin\UserController@add")->middleware("login");
Route::get('/useredit',"Admin\UserController@edit")->middleware("login");
Route::get('/userdelete',"Admin\UserController@delete")->middleware("login");

//带有参数的控制器
//控制器结合路由组
Route::group(["middleware"=>"login"],function(){
Route::get('/shopdelete/{id}',"Admin\ShopController@delete");    
Route::get('/shopindex',"Admin\ShopController@index");    
});
//资源控制器的使用
//Users里的所有法法都可以统统交给/users路由处理
// Route::resource("/users","Admin\UsersController");
// Route::get("/alldel","Admin\UsersController@alldel");
//资源控制器结合中间件
// Route::resource("/users","Admin\UsersController")->middleware("login");
// Route::get("/alldel","Admin\UsersController@alldel");
//资源控制器结合路由组
Route::group(["middleware"=>'login'],function(){
    Route::resource("/users","Admin\UsersController");
Route::get("/alldel","Admin\UsersController@alldel");
});
//请求报文 cookie
Route::resource("/req","Admin\ReqController");
//文件操作
Route::resource("/file","Admin\FileController");
//多文件上传
Route::resource("/files","Admin\FilesController");
//响应路由
Route::resource("/res","Admin\ResController");
Route::get("/ress",function(){
    echo "aaaaa";
});
//视图
Route::resource("/vie","Admin\VieController");
//模板继承
Route::resource("/admin","Admin\AdminController");
//后台用户模块
Route::resource("/adminuser","Admin\UserController");
//数据库的操作
Route::resource("/db","Admin\DbController");
//后台首页
Route::resource('/admin',"Admin\AdminController");
//用户模块路由
Route::resource("/adminusers","Admin\UsersController");
//会员模块路由
Route::resource("/adminuser","Admin\UserController");
//获取会员详情信息
Route::get("/userinfo/{id}","Admin\UserController@userinfo");
//获取会员收货地址
Route::get("/useraddress/{id}","Admin\UserController@useraddress");
//自定义函数的调用
Route::get("/pay","Admin\PayController@pay");
Route::get("/sendphone","Admin\PayController@sendphone");
//调用支付宝接口
Route::get("/pays","Admin\PayController@pays");
//支付页面成功通知
Route::get("/returntrl","Admin\PayController@returntrl");