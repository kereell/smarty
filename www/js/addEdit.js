$(document).ready(function(){
	Date.firstDayOfWeek = 0;
	Date.format = 'dd-mm-yyyy';
	$('#birthday').datePicker(
			{
				clickInput:true,
				startDate: '01-01-1940',
				endDate: (new Date()).asString()
			}
		);
	/** TODO Make stronger Validation **/
/*	$('.addEditFrm input').blur(function validInput(){
		switch(this.id){
		case 'login':
		case 'name':
		case 'lastname':
		case 'pass':
			if (this.value!='') {
				if($(this).nextAll().hasClass('error')){
					$(this).nextAll('div.error').remove();
					}
				if(!$(this).nextAll().hasClass('done')){
					$(this).parent().append('<div class="done">&nbsp;</div>');
					}
				} else {
					if($(this).nextAll().hasClass('done')){
						$(this).nextAll('div.done').remove();
						}
					if(!$(this).nextAll().hasClass('error')){
						$(this).parent().append('<div class="error">&nbsp;</div>');
						return false;
				
					}
				}
			break;
		case 'email':
			 var emailPattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
			 if (this.value!='' && emailPattern.test(this.value)) {
					if($(this).nextAll().hasClass('error')){
						$(this).nextAll('div.error').remove();
						}
					if(!$(this).nextAll().hasClass('done')){
						$(this).parent().append('<div class="done">&nbsp;</div>');
						}
					} else {
						if($(this).nextAll().hasClass('done')){
							$(this).nextAll('div.done').remove();
							}
						if(!$(this).nextAll().hasClass('error')){
							$(this).parent().append('<div class="error">&nbsp;</div>');
							return false;
						}
					}
			break;
		case 'rePass':
			if (this.value!='' && this.value==$('#pass').val()) {
				if($(this).nextAll().hasClass('error')){
					$(this).nextAll('div.error').remove();
					}
				if(!$(this).nextAll().hasClass('done')){
					$(this).parent().append('<div class="done">&nbsp;</div>');
					}
				} else {
					if($(this).nextAll().hasClass('done')){
						$(this).nextAll('div.done').remove();
						}
					if(!$(this).nextAll().hasClass('error')){
						$(this).parent().append('<div class="error">&nbsp;</div>');
						return false;
					}
				}
			break;
		case 'birthday':
			var birthPattern = new RegExp(/^\d{2}\-\d{2}\-\d{4}$/);
			if (this.value!='' && birthPattern.test(this.value)) {
				if($(this).nextAll().hasClass('error')){
					$(this).nextAll('div.error').remove();
					}
				if(!$(this).nextAll().hasClass('done')){
					$(this).parent().append('<div class="done">&nbsp;</div>');
					}
				} else {
					if($(this).nextAll().hasClass('done')){
						$(this).nextAll('div.done').remove();
						}
					if(!$(this).nextAll().hasClass('error')){
						$(this).parent().append('<div class="error">&nbsp;</div>');
						return false;
					}
				}
			break;
		}
	});
	$('#sBtn').focus(function(){
		if($('div').is('.error') || $('.addEditFrm input').not('#sBtn').val()==''){
			alert('There is an error');
		} else {
			*//** some code here **//*
			}
	});*/
	
});