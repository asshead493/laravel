<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersInsert extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    //给表单请求校验类授权
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //名字的规则 required不能为空的规则 unique 唯一 users表名
            "username"=>"required|regex:/\w{6,8}/|unique:users",
            //密码规则
            "password"=>"required|regex:/\w{6,18}/",
            //确认密码规则
            "repassword"=>"required|same:password",
             //邮箱规则
            "email"=>"required|email|unique:users",
            //电话
            "phone"=>"required|regex:/\d{11}/|unique:users",
        ];
    }
    //显示名字字段的自定义错误信息
    public function messages(){
        return [
            "username.required"=>"名字不能为空",
            "username.regex"=>"名字必须是6-8位的数字字母或者下划线",
            "password.unique"=>"名字不能重复",
            "password.required"=>"密码不能为空",
            "password.regex"=>"密码必须是6-8位的数字字母或者下划线",
            "user.unique"=>"密码不能重复",
            "repassword.required"=>"确认密码不能为空",
            "repassword.same"=>"两次密码不一致",
            "email.required"=>"邮箱不能为空",
            "email.email"=>"邮箱格式不对",
            "email.unique"=>"邮箱不能重复",
            "email.regex"=>"电话格式不对",
            "phone.unique"=>"电话不能重复",
    ];
    }
    


}
