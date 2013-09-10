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
		var patt1 = '/^'+extra+'[a-z]+ [0-9]{1,2}[ SFsf][0-9]{1,3}[\-\.][0-9]{1,2}$/gi';
		var patt2 = /[\-\.]/gi;
		var patt3 = '/^'+extra+'/gi';		
		patt = eval(patt1);
		if(!patt.test(val)){
			var patt4 = eval(patt3);
			if(!patt4.test(val)){
				alert("This is not a valid Farm & Herd");
				$("#earnotch").val(extra+extra1);
			}else if(!patt2.test(val))
				alert("Dash (or period) is required between Litter Number and Pig in Litter.");
			else
				alert("Farm Herd - Not in valid format");
			$("#earnotch").focus();
			return;
		}
		val = val.replace(".","-");
		$("#earnotch").val(val);
	}
}
function searchSireDam(txtObj,type){
	var search = txtObj.value;
	if(search != "") {
		$.ajax({
			url: encodeURI('index.php?r=sowboar/search'),
			type: "GET",
			data: {s:search}
		}).done(function(data){
			var obj = $.parseJSON(data);
			$("#"+type).html(obj);
		});
	}
}
function gerSireDam(type){
	if(type == 1){
		var search = $("#sire_notch").val();
	}else if(type == 2){
		var search = $("#dam_notch").val();
	}
	if(search != "") {
		$.ajax({
			url: encodeURI('index.php?r=sowboar/search'),
			type: "GET",
			data: {s:search}
		}).done(function(data){
			var obj = $.parseJSON(data);
			if(obj != "") {
				if(type == 1){
					window.location="index.php?r=sowboar/siredam&val="+$("#sire_notch").val();
				}else if(type == 2){
					window.location="index.php?r=sowboar/siredam&val="+$("#dam_notch").val();
				}
			}
		});
	}
}
$(document).ready(function(){
	$("#sow-boar-form :input[type!='submit']").change(function() {
		   $("#sow-boar-form").data("changed",true);
	});

	$("#sow-boar-form :input[type=submit]").click(function() {
		   $("#sow-boar-form").data("changed",false);
	});
	
	
	window.onbeforeunload = iamexiting;
	function iamexiting(e) {
		if($("#sow-boar-form").data("changed")) {
			   return 'You have unsaved changes. Do you want to continue';
			   // submit the form
		}
		return;
	}
});