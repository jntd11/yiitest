$(document).ready(function(){
	$("#creditbutton").bind('click',function(){
		$("#creditinfo").toggle();
	});
	$("#shipbutton").bind('click',function(){
		$("#shipinfo").toggle();
		var prefix = "TblCustomerEntry_"; 
		$("#"+prefix+"ship_company_name").val($("#"+prefix+"company_name").val());
		$("#"+prefix+"ship_name").val($("#"+prefix+"first_name").val()+" "+$("#"+prefix+"last_name").val());
		$("#"+prefix+"ship_address1").val($("#"+prefix+"address1").val());
		$("#"+prefix+"ship_address2").val($("#"+prefix+"address2").val());
		$("#"+prefix+"ship_city").val($("#"+prefix+"city").val());
		$("#"+prefix+"ship_state").val($("#"+prefix+"state").val());
		$("#"+prefix+"ship_zip").val($("#"+prefix+"zip").val());
		$("#"+prefix+"ship_country").val($("#"+prefix+"country").val());
		$("#"+prefix+"ship_contact").val($("#"+prefix+"contact").val());
		$("#"+prefix+"ship_phone").val($("#"+prefix+"phone_home").val());
		$("#"+prefix+"ship_area").val($("#"+prefix+"county").val());
		$("#"+prefix+"ship_company_name").focus();
		
	});	
	autoSuggestSearch();
	if($("#TblCustomerEntry_last_letter_sent").val() == "")
		$("#TblCustomerEntry_last_letter_sent").val($("#currdate").html());
	$("#tbl-customer-entry-form :input").change(function() {
		   $("#tbl-customer-entry-form").data("changed",true);
	});

	$("#tbl-customer-entry-form :input[type=submit]").click(function() {
		   $("#tbl-customer-entry-form").data("changed",false);
	});
	
	$("#tbl-mailing-code-form :input[type=submit]").click(function() {
		$("#tbl-mailing-code-form").data("changed",false);
	}); 
	
	window.onbeforeunload = iamexiting;
	function iamexiting(e) {
		if($("#tbl-customer-entry-form").data("changed")) {
			   return 'You have unsaved changes. Do you want to continue';
			   // submit the form
		}
		return;
	}
});

function autoSuggestSearch(){
	$("#tbl-customer-entry-grid [name='TblCustomerEntry[first_name]']").autocomplete({
		    source: 'index.php?r=tblCustomerEntry/autocompleteFirstName',
		    select: function( event, ui ) {
		    	var data = this.name+"="+ui.item.value;
		    	$('#tbl-customer-entry-grid').yiiGridView('update', {data: data});
		    }
	});
	
	$("#tbl-customer-entry-grid [name='TblCustomerEntry[last_name]']").autocomplete({
	    	  source: 'index.php?r=tblCustomerEntry/autocompleteLastName',
	  		    select: function( event, ui ) {
			    	var data = this.name+"="+ui.item.value;
			    	$('#tbl-customer-entry-grid').yiiGridView('update', {data: data});
			    }
	});
	$("#tbl-customer-entry-grid [name='TblCustomerEntry[company_name]']").autocomplete({
		  source: 'index.php?r=tblCustomerEntry/autocompleteCompanyName',
		    select: function( event, ui ) {
		    	var data = this.name+"="+ui.item.value;
		    	$('#tbl-customer-entry-grid').yiiGridView('update', {data: data});
		    }
	});
	$("#tbl-customer-entry-grid [name='TblCustomerEntry[phone_home]']").autocomplete({
		  source: 'index.php?r=tblCustomerEntry/autocompletePhoneHome',
			    select: function( event, ui ) {
			    	var data = this.name+"="+ui.item.value;
			    	$('#tbl-customer-entry-grid').yiiGridView('update', {data: data});
			    }
	});
	$("#tbl-customer-entry-grid [name='TblCustomerEntry[phone_business]']").autocomplete({
		  source: 'index.php?r=tblCustomerEntry/autocompletePhoneBusiness',
			    select: function( event, ui ) {
			    	var data = this.name+"="+ui.item.value;
			    	$('#tbl-customer-entry-grid').yiiGridView('update', {data: data});
			    }
	});
	$("#tbl-customer-entry-grid [name='TblCustomerEntry[phone_cell]']").autocomplete({
		  source: 'index.php?r=tblCustomerEntry/autocompletePhoneCell',
			    select: function( event, ui ) {
			    	var data = this.name+"="+ui.item.value;
			    	$('#tbl-customer-entry-grid').yiiGridView('update', {data: data});
			    }
	});
	$("#tbl-customer-entry-grid [name='TblCustomerEntry[phone_other1]']").autocomplete({
		  source: 'index.php?r=tblCustomerEntry/autocompletePhoneOther1',
			    select: function( event, ui ) {
			    	var data = this.name+"="+ui.item.value;
			    	$('#tbl-customer-entry-grid').yiiGridView('update', {data: data});
			    }
	});
	$("#tbl-customer-entry-grid [name='TblCustomerEntry[phone_other2]']").autocomplete({
		  source: 'index.php?r=tblCustomerEntry/autocompletePhoneOther2',
			    select: function( event, ui ) {
			    	var data = this.name+"="+ui.item.value;
			    	$('#tbl-customer-entry-grid').yiiGridView('update', {data: data});
			    }
	});
	
	$("#tbl-customer-entry-form [name='TblCustomerEntry[mailing_code]']").autocomplete({
	    source: 'index.php?r=tblCustomerEntry/autocompleteMailingCode',
	    select: function( event, ui ) {
	    	var data = this.name+"="+ui.item.value;
	    	if(ui.item.value == "<New>"){
	    		openDialogMailing();
	    		//location.href = 'index.php?r=tblMailingCode/create';
	    	}
	    	var val = ui.item.value;
	    	var valArray = val.split("-");
	    	ui.item.value = valArray[0];
	    }
	});
}
