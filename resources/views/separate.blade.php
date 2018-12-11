<!DOCTYPE>
<html>
<head>
	<title>Results page</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
	<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
	<script src="{{asset('js/bootstrap.js')}}"></script>
	<script src="{{asset('js/separate.js')}}"></script>
</head>
<body>
	<div class="col-md-12" style="padding:20px;padding-top:5%;" align='center'>
		<div class="col-md-6" id="table-holder">
			<h4>Please wait...</h4>
		</div>
	</div>
</body>
</html>