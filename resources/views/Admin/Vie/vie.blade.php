@include("Admin.Vie.header")
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>视图</title>
</head>
<body>
	<h1>哈哈哈哈</h1>
	<h1>解析数据:{{$name}} {{$age}} {{$arr[0]}} {{$arr[1]}}{{$arr1['sex']}}</h1>
	<h1>使用函数:{{time()}}{{date("Y-m-d")}}</h1>
	<h1>设置默认值:{{$name or 'aaasddas'}}</h1>
	<h1>{!!$b!!}</h1>
	<h1>流程控制</h1>
	@if($c==20)
	aa
	@elseif($c>20)
	bb
	@else
	cc
	@endif
	<h1>foreach循环控制</h1>
	<center>
	<table border="1px" width="400px">
	<tr>
	<th>NAME</th>
	<th>AGE</th>
	</tr>
	@foreach($arr2 as $row)
	<tr>
	<td>{{$row['name']}}</td>
	<td>{{$row['age']}}</td>
	</tr>
	@endforeach
	</table>
	</center>
	<h1>for循环</h1>
	@for($i=1;$i<=10;$i++)
	{{$i}}
	@endfor
</body>
</html>