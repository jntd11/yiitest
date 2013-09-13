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
		if(val == "")
			return;
		var patt1 = /^[0-9][A-Z] [a-z]+ [0-9]{1,2}[ SFsf][0-9]{1,3}[\-\.][0-9]{1,2}$/gi;
		var patt2 = /[\-\.]/gi;
		var patt3 = /^[0-9][A-Z] /gi;		
		patt = patt1;
		if(!patt.test(val)){
			var patt4 = patt3;
			if(!patt4.test(val)){
				alert("This is not a valid Farm & Herd");
				if(extra != "" && extra1 != "")
					$("#earnotch").val(extra+extra1);
				else if(extra != "")
					$("#earnotch").val(extra);
				else
					$("#earnotch").val("");
			}else if(!patt2.test(val))
				alert("Dash (or period) is required between Litter Number and Pig in Litter.");
			else
				alert("Farm Herd - Not in valid format");
			$("#earnotch").focus();
			return;
		}
		val = val.replace(".","-");
		$("#earnotch").val(val);
	}else if(type == 2){
		var val = element.value;
		val = val.replace(".","-");
	}
}
function searchSireDam(txtObj,type){
	var search = txtObj.value;
	if(search != "") {
		search = search.replace(".","-");
		$.ajax({
			url: encodeURI('index.php?r=sowBoar/search'),
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
		search = search.replace(".","-");
		$.ajax({
			url: encodeURI('index.php?r=sowBoar/search'),
			type: "GET",
			data: {s:search}
		}).done(function(data){
			var obj = $.parseJSON(data);
			if(obj != "") {
				if(type == 1){
					window.location="index.php?r=sowBoar/siredam&val="+$("#sire_notch").val();
				}else if(type == 2){
					window.location="index.php?r=sowBoar/siredam&val="+$("#dam_notch").val();
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

function cancelSow(){
	$("#earnotch").val("");
	$("#SowBoar_sow_boar_name").focus();
	window.location="index.php?r=sowBoar/index";
}

function setDefault(val,obj){
	obj.value = val;
}