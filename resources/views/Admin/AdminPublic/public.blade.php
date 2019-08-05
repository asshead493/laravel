<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>@yield('title')</title>
</head>
<body>
	<div style="background-color: cyan;width: 100%;height: 200px">header</div>
	@section("admin")
	@show
	<div style="background-color: pink;width: 100%;height: 200px">footer</div>

</body>
</html>