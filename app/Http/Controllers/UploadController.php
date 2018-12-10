<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UploadController extends Controller
{
    //
    function csvfileupload(Request $request)
    {
    	/*browse $_FILES to check extension*/
    	if(strpos($_FILES['file']['name'], '.csv')!==false)
    	{}
    	else
    	{
    		return 'Invalid extension. Only csv is accepted.';
    	}
    	/*make directory where file will be saved*/
		if (!file_exists('uploads'))
		{
			mkdir('uploads', 0777);
		}
		/*move file to new location*/
		move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $_FILES['file']['name']);
		$row = 1;
		$item_old=array();
		/*open handle to rear csv file*/
		if (($handle = fopen('uploads/'.$_FILES['file']['name'], "r")) !== FALSE)
		{
			while (($data = fgetcsv($handle, 1000)) !== FALSE)
		    {
		        $num = count($data);
		        /* row count to skip header*/
		        if($row>1)
		        {
		        	for ($c=0; $c < $num; $c++)
			        {
			        	/*obtain row value and break it on ; */
			        	$item=explode(';',str_replace('"', '', $data[$c]) );
			        	/*check does product with this barcode exist already*/
			        	$val=DB::select("select id from products where barcode='".$item[0]."';");
			        	if(count($val)<1)
			        	{
			        		/*item with current barcode doesn't exits, verify that barcode and name are present*/
			        		if(count($item)==2)
			        		{
			        			/*insert into DB*/
			        			$id=DB::insert('insert into products (name, barcode, added_at) values (?,?,?)', [$item[1], $item[0], date('Y-m-d H:i:s')]);
			        			/*keep earlier value because , in product name*/
			        			$item_old=$item;
			        		}
			        		else
			        		{
			        			/*barcode is missing because bad split caused on , in product name*/
			        			if(count($item_old)>1 && $item[0]!='')
			        			{
			        				/*update earlier product name*/
				        			$upd=DB::table('products')->where('name',$item_old[1])->update(['name'=>$item_old[1].', '.$item[0]]);
				        			/*update earlier product in case multiple , in product name*/
				        			$item_old[1]=$item_old[1].', '.$item[0];
			        			}
			        		}
			        	}
			        	else
			        	{
			        		/*entry already exists, skip it*/
			        	}
			        }
		        }
		        $row++;
		    }
		    /*close reader handle*/
		    fclose($handle);
		    /*delete uploaded file to clean up*/
		    unlink('uploads/' . $_FILES['file']['name']);
		    return 'true';
		}
		
	}
}
