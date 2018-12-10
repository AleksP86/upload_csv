<!DOCTYPE>
<html>
<head>
	<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
	<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
	<script src="{{asset('js/bootstrap.js')}}"></script>
</head>
<body>
	<div class="col-md-12" style="padding:10px;" id="table_holder" style></div>
</body>
<script>
	/*grab html value to use it in js*/
	var type = "<?php echo $html ?>";
	/*split string to items and prepare table drawing*/
	var spl1=type.split('+');
	var html='<table border="1"><tr><th style="padding:10px;">Barcode</th><th style="padding:10px;">Product</th></tr>';
	$.each(spl1, function(key,val)
	{
		/*prepare row drawing for eachitem barcode and name*/
		var spl2=val.split(';');
		if(spl2[0]!='')
		{
			html+='<tr><td style="padding:10px;">'+spl2[1]+'</td><td style="padding:10px;">'+spl2[0]+'</td></tr>';
		}
	});
	html+='</table>';
	$('#table_holder').html(html);
</script>
</html>