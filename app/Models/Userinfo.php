<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Userinfo extends Model
{
    //写出与User模型类对应的数据表user
    protected $table="user_info";
    //模型自动维护时间戳 false 不开启 true 开启
    public $timestamps = false;
}

