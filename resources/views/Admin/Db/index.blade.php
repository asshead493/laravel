<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>学生信息遍历</title>
</head>
<body>
	<center>
		<h1>学生信息遍历</h1>
		<table border="1px" width="400px">
			<tr>
				<th>ID</th>

				<th>NAME</th>
				<th>PASSWORD</th>

			</tr>
			@foreach($res as $row)
			<tr>
				<td>{{$row->id}}</td>
				<td>{{$row->name}}</td>
				<td>{{$row->password}}</td>


			</tr>
			@endforeach
			
		</table>
		{{$res->render()}}
	</center>
</body>
</html>