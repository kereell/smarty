function doLoad(values){
	JsHttpRequest.query(
			'/smarty/page/buildTable', 
			{'q':values}, 
			function(res,err){ 
				$('#response').html(res);
				$('#error').html(err);
			},
			'GET',
			true
			);
}	
/*	function doLoad(value) {
	    // Create new JsHttpRequest object.
	    var req = new JsHttpRequest();
	    // Code automatically called on load finishing.
	    req.onreadystatechange = function() {
	        if (req.readyState == 4) {
	        	$('#response').html(req.responseJS);
				$('#error').html(req.responseText);
	        }
	    };
	    // Prepare request object (automatically choose GET or POST).
	    req.open('GET', '/smarty/page/buildTable', true);
	    // Send data to backend.
	    req.send( { q: value } );
	}*/
