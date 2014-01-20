$(function() {

});

function checkData(element,type,extra,extra1){
	var val = element.value;
	if(type == 1){
		
		if(val == "" || extra+" "+extra1 == val)
			return;
		var patt1 = /^[0-9][A-Z] [a-z]+ [0-9]{1,2}[ SFsf][0-9]{1,3}[\-\.][0-9]{1,2}$/gi;
		var patt2 = /[\-\.]/gi;
		var patt3 = /^[0-9][A-Z] /gi;		
		patt = patt1;
		if(!patt.test(val)){
			var patt4 = patt3;
			if(!patt4.test(val)){
				alert("This is not a valid ear notch");
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
			//$("#earnotch").focus();
			return;
		}
		val = val.replace(".","-");
		$("#earnotch").val(val);
		getDateReason(val);
	}
}
$(document).ready(function(){
	$("#tbl-sold-hogs-form :input[type!='submit']").change(function() {
		   $("#tbl-sold-hogs-form").data("changed",true);
	});

	$("#tbl-sold-hogs-form :input[type=submit]").click(function() {
		   $("#tbl-sold-hogs-form").data("changed",false);
	});
	autoSuggestSearch();
	
	window.onbeforeunload = iamexiting;
	function iamexiting(e) {
		if($("#tbl-sold-hogs-form").data("changed")) {
			   return 'You have unsaved changes. Do you want to continue';
			   // submit the form
		}
		return;
	}
	$("#date_sold").datepicker('setDate','01/01/2013');
});

function autoSuggestSearch(){

$("#tbl-sold-hogs-form [name='TblSoldHogs[customer_name]']").autocomplete({
	    source: 'index.php?r=tblSoldHogs/autocompleteFirstName',
	    select: function( event, ui ) {
	    	var data = ui.item.label;
	    	$("#tbl-sold-hogs-form [name='TblSoldHogs[customer_name]']").val(ui.item.label);
	    	$("#cust_id").val(ui.item.value);
	    	return false;
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
$("#jaitest").autocomplete({
    source: 'index.php?r=tblSoldHogs/autocompleteName',
    select: function( event, ui ) {
    	var data = ui.item.value;
    	$(this).val(data);
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
			$("#reason_sold").show();
			$("#label_reason_sold").show();
			if(obj.reason_sold == "") {
				//$("#reason_sold").hide();
				//$("#label_reason_sold").hide();
			}else{
				$("#reason_sold").val(obj.reason_sold);
			}
			if(obj.sow_boar_id == "")
				$("#ear_notch_id").val(0);
			else
				$("#ear_notch_id").val(obj.sow_boar_id);
			
			var dates = obj.sold_mmddyy;
			dates = dates.replace(/([0-9][0-9])([0-9][0-9])([0-9][0-9])/,"$1-$2-$3");
			$("#date_sold").val(dates);
		}
		
	});
}
function validateDate(val){
	var patt = /^(((([0-1][0-2])|([0]*[0-9]))[\-\.\/][0-9][0-9]*[\-\.\/][0-9][0-9]([0-9][0-9])*)|([0-9][0-9][0-9][0-9]\-[0-9][0-9]\-[0-9][0-9]))$/;
	//var patt = /^(([0-1][0-2])|([0]*[0-9]))[\-\.\/][0-9][0-9]*[\-\.\/][0-9][0-9]([0-9][0-9])*$/;
	if(!patt.test(val)){
		alert("Date - Invalid date format");
		$("#date_sold").focus();
		return false;
	}
	return true;
}
function validateForm(){
	if($("#cust_id").val() == "") {
		alert("Enter a valid customer name");
		return false;
	}
	if(!validateDate($("#date_sold").val()))
		return false;
	return true;

}
function validateSearch(){
	var  startBool = true;
	if($("#start_date").val() != "")
		startBool = startBool && validateDate($("#start_date").val());
	if($("#end_date").val() != "")
		startBool = startBool && validateDate($("#end_date").val());
	
	return startBool;
}
function cancelsoldhogs(){
	$("#earnotch").val("");
	$("#TblSoldHogs_customer_name").focus();
	window.location="index.php?r=tblSoldHogs/admin";
}
function getSoldHog(){
	var search = $("#soldhogname").val();
	$.ajax({
		url: encodeURI('index.php?r=tblSoldHogs/autocompleteId'),
		type: "GET",
		data: {s:search}
	}).done(function(data){
		var obj = $.parseJSON(data);
		$("#tbl_sold_hogs_id").html(obj.tbl_sold_hogs_id);
		$("#hog_ear_notch").html(obj.hog_ear_notch);
		$("#customer_name").html(obj.customer_name);
		$("#date_sold").html(obj.date_sold);
		$("#comments").html(obj.comments);
		$("#sold_price").html(obj.sold_price);
		$("#reason_sold").html(obj.reason_sold);
		$("#invoice_number").html(obj.invoice_number);
	});
}
function getUnMatchedSoldhog(id){
	var search = $("#soldhogname").val();
	$.ajax({
		url: encodeURI('index.php?r=tblSoldHogs/rebuildManual'),
		type: "GET",
		data: {id:id},
	}).done(function(data){
		$("#dataUpdate").prepend(data);
		
	});
}

function confirmRebuild(){
	if(!confirm("Are you sure you want to rebuild the Sold Hogs Customer link?")) {
		window.location = 'index.php?r=tblSoldHogs/index';
		return false;
	}
	$("#rebuild").hide();
	return true;
}
function updateSoldHog(){
	$("#updates").hide();
	var search = $("#soldhogname").val();
	$.ajax({
		url: encodeURI('index.php?r=tblSoldHogs/rebuildManual'),
		type: "GET",
		data: {s:$("#soldhogname").val(),c:$("#custname").val()}
	}).done(function(data){
		$("#forms").remove();
		$("#dataUpdate").append(data);
	});
}