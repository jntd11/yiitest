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
		var patt = /[0-9][A-Z]/
		if(!patt.test(val)){
			alert("Farm Herd - Not in valid format");
			$("#herd").val("");
		}
		$("#herd").focus();
		
	}
	
}