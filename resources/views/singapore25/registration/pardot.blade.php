<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="robots" content="noindex,nofollow,noarchive">
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Cache-Control" content="no-cache">
	<meta http-equiv="Expires" content="0">
	<title></title>
</head>
<body>
@include('singapore25._component.bodyAfter')
<main>
	<form name="form" action="{!! $pardotFormHandlerEndpoint !!}" method="post">
		@foreach ($pardotDataList as $key => $value)
			<input type="hidden" name="{{ $key }}" value="{{ $value }}"/>
		@endforeach
	</form>
	<script type="text/javascript">
		window.onload = function () {
			document.form.submit()
		}
	</script>
</main>
</body>
</html>
