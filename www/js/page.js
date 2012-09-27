<<<<<<< HEAD
$().ready(function() {
		$('#addEditDialog').jqm({modal: true, trigger: '.addRcrd a'});
		$('#addEditDialog').jqm({ajax: $('.addRcrd a').attr('href')});
//		$('#addEditDialog').jqmAddTrigger('.edtRcrd');
//		$('#addEditDialog').jqm({ajax: $('.edtRcrd').attr('href')});
});
/*$(document).ready(function(){
	$("#flex1").flexigrid({
		url: 'post2.php',
		dataType: 'json',
		colModel : [
		{display: 'ISO', name : 'iso', width : 40, sortable : true, align: 'center'},
		{display: 'Name', name : 'name', width : 180, sortable : true, align: 'left'},
		{display: 'Printable Name', name : 'printable_name', width : 120, sortable : true, align: 'left'},
		{display: 'ISO3', name : 'iso3', width : 130, sortable : true, align: 'left', hide: true},
		{display: 'Number Code', name : 'numcode', width : 80, sortable : true, align: 'right'}
		],
		searchitems : [
		{display: 'ISO', name : 'iso'},
		{display: 'Name', name : 'name', isdefault: true}
		],
		sortname: "iso",
		sortorder: "asc",
		usepager: true,
		title: 'Countries',
		useRp: true,
		rp: 15,
		showTableToggleBtn: true,
		width: 700,
		onSubmit: addFormData,
		height: 200
		});
});*/

=======
$(document).ready(function(){
	$("#flex1").flexigrid({
		url: 'post2.php',
		dataType: 'json',
		colModel : [
		{display: 'ISO', name : 'iso', width : 40, sortable : true, align: 'center'},
		{display: 'Name', name : 'name', width : 180, sortable : true, align: 'left'},
		{display: 'Printable Name', name : 'printable_name', width : 120, sortable : true, align: 'left'},
		{display: 'ISO3', name : 'iso3', width : 130, sortable : true, align: 'left', hide: true},
		{display: 'Number Code', name : 'numcode', width : 80, sortable : true, align: 'right'}
		],
		searchitems : [
		{display: 'ISO', name : 'iso'},
		{display: 'Name', name : 'name', isdefault: true}
		],
		sortname: "iso",
		sortorder: "asc",
		usepager: true,
		title: 'Countries',
		useRp: true,
		rp: 15,
		showTableToggleBtn: true,
		width: 700,
		onSubmit: addFormData,
		height: 200
		});
});
>>>>>>> branch 'master' of https://github.com/kereell/smarty.git
