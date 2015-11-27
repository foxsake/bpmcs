<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	@yield('title')
	{!! Html::style('css/styles.css') !!}
	{!! Html::script('js/app.js') !!}
</head>
<body>
	@yield('content')
</body>
</html>