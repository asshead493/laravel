<!doctype html>
<html>
<head>
	<meta charset="utf-8">

	<title>get ajax</title>
	<script src="/static/jquery-1.8.3.min.js"></script>
</head>
<body>
<button>获取响应数据</button>
</body>
<script type="text/javascript">
	
	// alert($);
	// 获取按钮 绑定单机事件
	$("button").click(function(){
	 $.get("/dogetajax",{},function(data){
	 	alert(data);
	 });
	});

</script>
</html>