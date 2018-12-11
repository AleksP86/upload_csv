<!DOCTYPE>
<html>
<head>
	<title>Results page</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
	<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
	<script src="{{asset('js/bootstrap.js')}}"></script>
</head>
<body>
	<div class="col-md-12" style="padding:20px;padding-top:10%;" align='center'>
		<div class="col-md-6" id="table-holder"></div>
	</div>
</body>
<script>
	/*grab html value to use it in js*/
	var form_data = "<?php echo $html ?>";
	$(document).ready(function()
	{
		draw();
	});

	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	function draw()
	{
		$.ajax({
			url:'/search/separate_filter',
			type:"post",
			data: form_data,
			dataType:'json',
			success: function(data)
			{
				var html='<table style="width:100%;" class="table table-sm"><tr><th>Barcode</th><th>Product</th></tr>';
				$.each(data.entries, function(index, element)
				{
					html+="<tr><td style='white-space: nowrap;'>"+element.barcode+"</td><td style='white-space: nowrap;'>"+element.name+"</td></tr>";
				});
				html+='</table><hr>';
				$('#table-holder').html(html);
			}
		});
	}
</script>
</html>