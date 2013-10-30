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
		getDateReason(val);
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
	
	
$("#tbl-sold-hogs-grid [name='TblSoldHogs[hog_ear_notch]']").autocomplete({
	    source: 'index.php?r=tblSoldHogs/autocompleteEarNotch',
	    select: function( event, ui ) {
	    	var data = this.name+"="+ui.item.value;
	    	$('#sow-boar-grid').yiiGridView('update', {data: data});
	    }
});

$("#tbl-sold-hogs-grid [name='TblSoldHogs[date_sold]']").autocomplete({
    source: 'index.php?r=tblSoldHogs/autocompleteDateSold',
    select: function( event, ui ) {
    	var data = this.name+"="+ui.item.value;
    	$('#sow-boar-grid').yiiGridView('update', {data: data});
    }
});
$("#tbl-sold-hogs-grid [name='TblSoldHogs[invoice_number]']").autocomplete({
    source: 'index.php?r=tblSoldHogs/autocompleteInvoice',
    select: function( event, ui ) {
    	var data = this.name+"="+ui.item.value;
    	$('#sow-boar-grid').yiiGridView('update', {data: data});
    }
});
$("#tbl-sold-hogs-grid [name='TblSoldHogs[customer_name]']").autocomplete({
    source: 'index.php?r=tblSoldHogs/autocompleteName',
    select: function( event, ui ) {
    	var data = this.name+"="+ui.item.value;
    	$('#sow-boar-grid').yiiGridView('update', {data: data});
    }
});

}
function getDateReason(val){
	var search = $("#earnotch").val();
	$.ajax({
		url: encodeURI('index.php?r=sowBoar/search'),
		type: "GET",
		data: {s:search,type:1}
	}).done(function(data){
		var obj = $.parseJSON(data);
		if(obj != "") {
			$("#reason_sold").val(obj.reason_sold);
			var dates = obj.sold_mmddyy;
			dates = dates.replace(/([0-9][0-9])([0-9][0-9])([0-9][0-9])/,"$1-$2-$3");
			$("#date_sold").val(dates);
		}
	});
}
function validateDate(val){
	var patt = /^(([0-1][0-2])|([0-9]))[\-\.\/][0-9][0-9]*[\-\.\/][0-9][0-9]([0-9][0-9])*$/;
	if(!patt.test(val)){
		alert("Date Sold - Invalid date format");
		$("#date_sold").focus();
		return false;
		//this.value = ""
	}
	return true;
}
function validateForm(){
	return validateDate($("#date_sold").val());
}