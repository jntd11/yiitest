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
		if(val == "")
			return;
		var patt1 = /^[0-9][A-Z] [a-z]+ [0-9]{1,2}[ SFsf][0-9]{1,3}[\-\.][0-9]{1,2}$/gi;
		var patt2 = /[\-\.]/gi;
		var patt3 = /^[0-9][A-Z] /gi;		
		patt = patt1;
		if(!patt.test(val)){
			var patt4 = patt3;
			if(!patt4.test(val)){
				alert("This is not a valid ear notch");
				$("#earnotch").val("");
			}else if(!patt2.test(val))
				alert("Dash (or period) is required between Litter Number and Pig in Litter.");
			else
				alert("Farm Herd - Not in valid format");
			//$("#earnotch").focus();
			return;
		}
		val = val.replace(".","-");
		$("#earnotch").val(val);
	}
}
$(document).ready(function(){
	$("#tbl-herd-setup-form :input[type!='submit']").change(function() {
		   $("#tbl-herd-setup-form").data("changed",true);
	});

	$("#tbl-herd-setup-form :input[type=submit]").click(function() {
		   $("#tbl-herd-setup-form").data("changed",false);
	});
	autoSuggestSearch();
	
	window.onbeforeunload = iamexiting;
	function iamexiting(e) {
		if($("#tbl-herd-setup-form").data("changed")) {
			   return 'You have unsaved changes. Do you want to continue';
			   // submit the form
		}
		return;
	}
});

function autoSuggestSearch(){
	$("#tbl-sold-hogs-form [name='TblSoldHogs[customer_name]']").autocomplete({
		    source: 'index.php?r=tblSoldHogs/autocompleteFirstName',
		    select: function( event, ui ) {
		    	var data = ui.item.value;
		    	$(this).val(data);
		    }
	});
}

function validateDate(val){
	var patt = /^(([0-1][0-2])|([0-9]))[\-\.\/][0-9][0-9]*[\-\.\/][0-9][0-9]([0-9][0-9])*$/;
	if(!patt.test(val)){
		alert("invalid date format")
		//this.value = ""
	}
}