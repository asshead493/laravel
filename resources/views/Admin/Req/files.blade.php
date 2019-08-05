<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>多文件上传</title>
</head>
<body>
	<form action="/files" method="post" enctype="multipart/form-data">
		文件1:<input type="file" name="pic[]"><br>
		文件2:<input type="file" name="pic[]"><br>
		文件3:<input type="file" name="pic[]"><br>
		{{csrf_field()}}
		<input type="submit" value="上传">

	</form>
</body>
</html>