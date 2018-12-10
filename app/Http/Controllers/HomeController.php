<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    function index()
    {
    	return view('home');
    }

    /*check table for barcode or name depending whet field was typed on*/
    function browse(Request $request)
    {
    	$this->check_is_ajax($request);
    	switch($request->type)
    	{
    		case "product":
    		{
    			/*because form is named product and table column is called name*/
    			$request->type='name';
    		}
    	}
    	$results = DB::table('products')
    	->select($request->type)
    	->where($request->type, $request->val)
    	->orWhere($request->type, 'like', '%' . $request->val . '%')
    	->distinct()
    	->get();

    	return response()->json(['type'=>$request->type, 'res'=>$results]);
    }
    /*for form values of barcode and product find appropriate item*/
    function filter(Request $request)
    {
    	$this->check_is_ajax($request);
    	$results = DB::table('products')

	    ->when($request->barcode, function($query) use ($request){
	        return $query->where('barcode', $request->barcode);
	    })
	   	->when($request->product, function($query) use ($request){
	        return $query->where('name', $request->product);
	    })
	    ->orderBy('name')->get();

	    /*if appropriate items is not found find simmilar items but set mark to open in new page*/
	    if(count($results)<1)
	    {
	    	$results = DB::table('products')
	    	->when($request->barcode, function($query) use ($request){
	        return $query->where('barcode', 'like', '%' . $request->barcode . '%');
	    	})
	    	->when($request->product, function($query) use ($request){
	        return $query->where('name', 'like', '%' . $request->product . '%');
	    	})
	    	->orderBy('name')->get();
	    	return response()->json(['entries'=>$results,'new_page'=>true]);
	    }
    	return response()->json(['entries'=>$results,'new_page'=>false]);
    }
    /*check does call comes from ajax, if yes proceed if not return back*/
    function check_is_ajax(Request $request)
    {
    	if($request->ajax())
    	{
    		return;
    	}
    	else
    	{
    		$this->index($request);
    	}
    }
    /*separate view for multiple results*/
    function separate(Request $request, $slug)
    {
    	return view('separate', ["html" => $slug]);
    }
}
