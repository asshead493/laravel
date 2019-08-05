<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //写出与user模型类对应的数据表
    protected $table='user';
    //该模型是否被自动维护时间戳 false 不开启 true 开启
    public $timetamps=true;
    //可以被批量赋值的属性 在使用模型添加的时候必须使用该属性
    protected $fillable=['name','password','email','status'];
    //修改器 可以自动转换获取数据字段的值
    public function getStatusAttribute($value){
    	$status=[1=>'禁用',0=>'开启',2=>'挂机'];
    	return $status[$value];
    }
    //通过User模型类和Userinfo模型类的关系获取当前会员下的会员详情信息
    public function info(){
        // App\Models\Userinfo 关联的Userinfo模型类  user_id 关联的自段
        return $this->hasOne("App\Models\Userinfo","user_id");
    }
    //通过User模型类和Useraddress模型类的关系获取当前会员下的所有收货地址
    public function address(){
        // "App\Models\Useraddress" 地址模型类 user_id 关联id
        return $this->hasMany("App\Models\Useraddress","user_id");
    }
  
}
