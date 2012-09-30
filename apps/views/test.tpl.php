<!DOCTYPE html>
<html>
	<head>
	 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.js"></script>
	 <script type="text/javascript" src="{$smarty.const.JS_DIR}sortElements.js"></script>
	 <style type="text/css">
		td, th { border: 1px solid #111; padding: 6px; }
		th { font-weight: 700; }
	</style>
	
	<script type="text/javascript">
	$(document).ready(function(){
	    var table = $('table');
	    
	    $('#facility_header, #city_header')
	        .wrapInner('<span title="sort this column" />')
	        .each(function(){
	            
	            var th = $(this);
	            var thIndex = th.index();
	            var inverse = false;
	            
	            th.click(function(){
	                table.find('td').filter(function(){
	                    
	                    return $(this).index() === thIndex;
	                    
	                }).sortElements(function(a, b){
	                    
	                    return $.text([a]) > $.text([b]) ?
	                        inverse ? -1 : 1
	                        : inverse ? 1 : -1;
	                    
	                }, function(){
	                    
	                    // parentNode is the element we want to move
	                    return this.parentNode;
	                    
	                });
	                inverse = !inverse;     
	            });      
	        });
	});
		</script>
	</head>
	
	<body>
	<table>
    <tr>
        <th id="facility_header">Facility name</th>
        <th>Phone #</th>
        <th id="city_header">City</th>
        <th>Speciality</th>
    </tr>
    <tr>
        <td>CCC</td>
        <td>00001111</td>
        <td>Amsterdam</td>
        <td>GGG</td>
    </tr>
    <tr>
        <td>JJJ</td>
        <td>55544444</td>
        <td>London</td>
        <td>MMM</td>
    </tr>
    <tr>
        <td>AAA</td>
        <td>33332222</td>
        <td>Paris</td>
        <td>RRR</td>
    </tr>
</table>
	</body>
</html>