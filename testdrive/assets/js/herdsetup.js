$(function() {
$( document ).tooltip({
position: {
my: "center bottom-20",
at: "center top",
using: function( position, feedback ) {
$( this ).css( position );
$( "<div>" )
.addClass( "arrow" )
.addClass( feedback.vertical )
.addClass( feedback.horizontal )
.appendTo( this );
}
}
});
});

function checkData(element,type){
	if(type == 1){
		var val = element.value;
		var patt = /^[0-9][A-Z]$/
		if(!patt.test(val)){
			alert("Farm Herd - Not in valid format");
			$("#herd").val("");
			$("#herd").focus();
		}
		
	}else if(type == 2){
		var val = element.value;
		var patt = /^[A-Z]$/
		if(!patt.test(val)){
			alert("Not in valid format - Should be letter");
			$("#breed").val("");
			$("#breed").focus();
		}
	}else if(type == 3){
		var val = element.value;
		var patt = /^[0-9]+$/
		if(!patt.test(val)){
			alert("Not in valid format - Should be Numbers");
			$(element).val("");
			$(element).focus();
		}
	}
	
}
$(document).ready(function(){
	$("#tbl-herd-setup-form :input[type!='submit']").change(function() {
		   $("#tbl-herd-setup-form").data("changed",true);
	});

	$("#tbl-herd-setup-form :input[type=submit]").click(function() {
		   $("#tbl-herd-setup-form").data("changed",false);
	});
	
	
	window.onbeforeunload = iamexiting;
	function iamexiting(e) {
		if($("#tbl-herd-setup-form").data("changed")) {
			   return 'You have unsaved changes. Do you want to continue';
			   // submit the form
		}
		return;
	}
	$('#tbl-herd-setup-grid tbody > tr').on('click', function(id){
		//$(this).click();
		var link = $(this).find('a.update').attr('href');
		location.href = link;
	});
});