function processLoad(values){
	JsHttpRequest.query(
			'/smarty/page/_processAddRecord', 
			{'q':values}, 
			function(res,err){ 
				alert('hi');
				$('#response').html(res);
				$('#error').html(err);
			},
			'GET',
			true
			);
}
function confirm(msg,callback) {
  $('#confirm')
    .jqmShow()
    .find('p.jqmConfirmMsg')
      .html(msg)
    .end()
    .find(':submit:visible')
      .click(function(){
        if(this.value == 'yes')
          (typeof callback == 'string') ?
            window.location.href = callback :
            callback();
        $('#confirm').jqmHide();
      });
}

/** Add or Edit JQM**/
$().ready(function() {
		$('#addEditDialog').jqm({
			modal: true,
			overlay: 0,
			onShow: function(h) {
		        h.w.css('opacity',0.90).delay(250).slideDown(); 
		        },
	        onHide: function(h) {
	            h.w.slideUp("slow", function() { if(h.o) h.o.remove(); }); 
	            }, 
			ajax: '@href',
			ajaxHTML: 'Loading...'
				});
		$('#addEditDialog').jqmAddTrigger('.addRcrd a');
		$('#addEditDialog').jqmAddTrigger('.edtRmRcrd a:first-child');

		/** Confirm Delete JQM **/
		$('#confirm').jqm({overlay: 88, modal: true, trigger: false});
	  // trigger a confirm whenever links of class alert are pressed.
		$('.edtRmRcrd a:last-child').click(function() { 
	    confirm('Are you about to delete user with id: '+this.id+' ?!',this.href); 
	    return false;
	  });


	/** SORTING**/
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
	    					return this.parentNode;
	    					});
	    		inverse = !inverse;
	    		});
	    	});
});