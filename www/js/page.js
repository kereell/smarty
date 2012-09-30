$().ready(function() {
		$('#addEditDialog').jqm({modal: true, trigger: '.addRcrd a'});
		$('#addEditDialog').jqm({ajax: $('.addRcrd a').attr('href')});
//		$('#addEditDialog').jqmAddTrigger('.edtRcrd');
//		$('#addEditDialog').jqm({ajax: $('.edtRcrd').attr('href')});
});

$(document).ready(function() {
	var table = $('.usrTbl');
	$('#id, #login, #name, #lastname, #email, #birthday')
	.wrapInner('<span title="sort this column" />')
	.each(function(){
	    	var th = $(this),
	    	thIndex = th.index(),
	    	inverse = false;
	    	th.click(function(){
	    		table.find('td').not('#paginator').filter(function(){
	    			return $(this).index() === thIndex;
	    			}).sortElements(function(a, b){
	    				return $.text([a]) > $.text([b]) ? inverse ? -1 : 1 : inverse ? 1 : -1;
	    				}, function(){
	    			// parentNode is the element we want to move
	    					return this.parentNode;
	    					});
	    		inverse = !inverse;
	    		});
	    	});
});