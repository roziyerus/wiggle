$(function(){
	$("#dosen").autocomplete({
		serviceUrl:'mail/searchMailDosen'
	});
	
});
$("#dosen").result(function(even,data,formatted){});