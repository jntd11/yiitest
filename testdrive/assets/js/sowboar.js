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

function checkData(element,type,extra,extra1){
	if(type == 1){
		var val = element.value;
		var patt1 = '/^'+extra+'[a-z]+ [0-9]{1,2}[ SFsf][0-9]{1,3}[\-\.][0-9]{1,2}$/i';
		patt = eval(patt1);
		if(!patt.test(val)){
			alert("Farm Herd - Not in valid format");
			$("#earnotch").val(extra+extra1);
			$("#earnotch").focus();
			return;
		}
		val = val.replace(".","-");
		$("#earnotch").val(val);
	}else if(type == 2){
		var val = element.value;
		var patt = /^[A-Z]$/
		if(!patt.test(val)){
			alert("Not in valid format - Should be letter");
			$("#breed").val("");
		}
		$("#breed").focus();
		
	}else if(type == 3){
		var val = element.value;
		var patt = /^[0-9]+$/
		if(!patt.test(val)){
			alert("Not in valid format - Should be Numbers");
			$(element).val("");
		}
		$(element).focus();
	}
	
}