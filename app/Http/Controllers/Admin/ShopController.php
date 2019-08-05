<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    //删除
   public function delete($id){
   	echo "这是商品的删除".$id;
   }
   //列表
    public function index(){
   	echo "这是商品的列表";
   }
}
