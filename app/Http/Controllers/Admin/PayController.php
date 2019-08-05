<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use A;//导入自定义类
class PayController extends Controller
{
   	public function pay(){
   		pay();
   	}
   	public function sendphone()
   	{
   		$class=new A();
   		$class->sendphone();
   	}
   	public function pays()
   	{
   		pays(time(),"buy shop","0.01","buy shop");
   	}
}
