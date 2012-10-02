function doLoad(data){
	
	JsHttpRequest.query(
			'/smarty/page/buildTable', 
			{'data' : data}, 
			
			function(res,err){ 
				$('#response').html(res['one']);
				$('#error').html(err);
			},
			
			true
			
			);
	
}