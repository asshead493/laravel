<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>file模板</title>
</head>
<body>
<form action="/file" method="post" enctype="multipart/form-data">
文件:<input type="file" name="pic"><br>
{{csrf_field()}}
<input type="submit" value="提交">
</form>
</body>
</html>