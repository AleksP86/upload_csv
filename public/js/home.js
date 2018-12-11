$(document).ready(function()
{
	/*csfr key ajax pre-setup*/
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	/*submit event listener*/
	$('.submit').on('click', function()
	{
		/*clear message box*/
		$('#upload_message').html('');
		/*check is file chosen*/
	    var file_data = $('.file').prop('files')[0];
	    if(file_data != undefined)
	    {
	    	/*calculate size for message*/
	    	if(Math.round(file_data.size/1024)>100)
	    	{
	    		$('#upload_message').html('File is very big. Processing will take time.');
	    	}
	    	else
	    	{
	    		$('#upload_message').html('Processing ...');
	    	}
	    	/*obtain file to send to controller*/
	        var form_data = new FormData();                  
	        form_data.append('file', file_data);
	        /*send to controller*/
	        $.ajax({
	            type: 'POST',
	            url: '/uploadcsv',
	            contentType: false,
	            processData: false,
	            data: form_data,
	            success:function(response)
	            {
	            	/*check response for alert and message box*/
	            	if(response!='true')
	            	{
	            		alert(response);
	            	}
	            	$('.file').val('');
	            	$('#upload_message').html('Upload completed sucesfully');
	            }
	        });
	        
	    }
	    else
	    {
	    	/*file missing message*/
	    	$('#upload_message').html('File for upload missing');
	    }
	    return false;
	});

	/*barcode and product typing sensitive fields*/
	$('#barcode, #product').on('keyup',function()
	{
		var ids=$(this).attr('id');//get id to recognize was barcode or product typed
		var valu=$(this).val();//get chosen field value for search
		$.ajax({
				url:'/search/browse',
				type:"post",
				data: {type:ids, val:valu},
				dataType:'json',
				success: function(data)
				{
					/*if some data is returned repack it to options for dropdown*/
					if(data.res.length>0)
					{
						$("#"+ids+"-box").show();
						var drop='<ul id="country-list">';
						$.each(data.res, function(index, val)
						{
							$.each(val, function(ind ,vred)
							{
								drop+='<li onClick="selectDrop(\''+ids+'\',\''+vred+'\');">'+vred+'</li>';
							});
						});
						drop+='</ul>';
						$("#"+ids+"-box").html(drop);
					}
					else
					{
						/*no results received, hide box*/
						$("#"+ids+"-box").hide();
					}
				}
			});
	});

	/*hide suggestion boxes on side click to see again field they covered*/
	$('html').click( function()
	{
		$('.suggestion-box').hide();
	});

});
	/*activate selected value from dropdown and addd it to form inoupt and hide dropdown*/
	function selectDrop(id, val)
	{
		$("#"+id).val(val);
		$("#"+id+"-box").hide();
	}

	/*search product based on form values*/
	function searchEntry()
	{
		var proceed=true;
		/*if both fields are empty write message*/
		if($('#barcode').val()=='' && $('#product').val()=='')
		{
			proceed=false;
		}
		if(!proceed)
		{
			$('#message_holder').html('You must fill at least one field.');
			$('#table-holder').html('');
			return false;
		}
		$('#message_holder').html('');
		var form_data=$('#search_form').serialize();
		$.ajax({
			url:'/search/filter',
			type:"post",
			data: form_data,
			dataType:'json',
			success: function(data)
			{
				if(data.new_page==true)
				{					
					var win = window.open('/new_page/'+form_data, '_blank');
					if (win) {
					    //Browser has allowed it to be opened
					    win.focus();
					} else {
					    //Browser has blocked it
					    alert('Please allow popups for this website');
					}
				}
				else
				{
					/*prepare and draw table to be put in table holder on page*/
					var html='<table style="width:100%;" class="table table-sm">';
					html+='<tr><th>Barcode</th><th>Product</th></tr>';
					$.each(data.entries, function(index, element)
					{
						html+="<tr><td style='white-space: nowrap;'>"+element.barcode+"</td><td style='white-space: nowrap;'>"+element.name+"</td></tr>";
					});
					$('#table-holder').html(html);
				}
			}
		});
	}
