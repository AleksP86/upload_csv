	/*grab html value to use it in js*/
	var form_data = "<?php echo $html ?>";
	$(document).ready(function()
	{
		draw();
	});
	/*csfr key ajax pre-setup*/
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});
	/*request data with paramether*/
	function draw()
	{
		$.ajax({
			url:'/search/separate_filter',
			type:"post",
			data: form_data,
			dataType:'json',
			success: function(data)
			{
				/*draw table*/
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