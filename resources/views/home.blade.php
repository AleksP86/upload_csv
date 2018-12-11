<!DOCTYPE>
<html>
<head>
	<title>Home page</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
	<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
	<script src="{{asset('js/bootstrap.js')}}"></script>
	<link rel="stylesheet" href="{{asset('css/home.css')}}">
	<script src="{{asset('js/home.js')}}"></script>
</head>
<body>
	<div>
		<div class="col-md-12" style="padding:10px;">
			<br/>
			<div id="search_div" style="float:left;width:49%">

				<div id="search_holder" class="col-md-6">
		        	<h4>Product search</h4>
		        	<form id="search_form">
		        		<div class="form-group">
							<label>Barcode</label>
							<input type="text" class="form-control" name="barcode" id="barcode" placeholder="Barcode">
							<div class="suggestion-box" id="barcode-box"></div>
						</div>
						<div class="form-group">
							<label>Product</label>
							<input type="text" class="form-control" name="product" id="product" placeholder="Product">
							<div class="suggestion-box" id="product-box"></div>
						</div>
						<div>
							<button type="button" class="btn btn-primary btn-sm" onclick="searchEntry();">Search</button>
						</div>
		        	</form>
		        </div>
		        <div id="insert-holder" class="col-md-12">
					<div id="message_holder" class="message_holder"></div>
				</div>
				<div id="table-holder" class="col-md-12"></div>
			</div>

			<div style="float:left;width:49%">
				<div id="search_holder" class="col-md-12">
					<h4>Product upload (csv)</h4>
					<br>
					<form method="post" action="/uploadcsv">
						{{csrf_field()}}
					    <input type="file" name="file" class="file btn btn-sm" accept=".csv">
					    <input type="submit" name="submit" class="submit btn btn-sm btn-info" value="Submit">
					</form>
					<hr>
					<div id="upload_message"></div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>