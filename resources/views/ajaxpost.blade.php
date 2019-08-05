<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>post ajax</title>
		<meta name="csrf-token" content="{{ csrf_token() }}">

	<script src="/static/jquery-1.8.3.min.js"></script>
</head>
<body>
<button>获取响应数据</button>
</body>
<script type="text/javascript">
	//将meta标签里的token值写入到请求的标头里
	$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
	});
	// alert($);
	// // 获取按钮 绑定单机事件
	$("button").click(function(){
	 $.post("/dopostajax",{},function(data){
	 	alert(data);
	 });
	});

</script>
</html>