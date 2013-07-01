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

	window.onbeforeunload = iamexiting;
	function iamexiting(e) {
		if($("#tbl-customer-entry-form").data("changed")) {
			   return 'You have unsaved changes. Do you want to continue';
			   // submit the form
		}
	}
});

function autoSuggestSearch(){
	$("#tbl-customer-entry-grid [name='TblCustomerEntry[first_name]']").autocomplete({
		      source: 'index.php?r=tblCustomerEntry/autocompleteFirstName'
	});
	$("#tbl-customer-entry-grid [name='TblCustomerEntry[last_name]']").autocomplete({
	    	  source: 'index.php?r=tblCustomerEntry/autocompleteLastName'
	});
	$("#tbl-customer-entry-grid [name='TblCustomerEntry[company_name]']").autocomplete({
		  source: 'index.php?r=tblCustomerEntry/autocompleteCompanyName'
	});
	$("#tbl-customer-entry-grid [name='TblCustomerEntry[phone_home]']").autocomplete({
		  source: 'index.php?r=tblCustomerEntry/autocompletePhoneHome'
	});
	$("#tbl-customer-entry-grid [name='TblCustomerEntry[phone_business]']").autocomplete({
		  source: 'index.php?r=tblCustomerEntry/autocompletePhoneBusiness'
	});
	$("#tbl-customer-entry-grid [name='TblCustomerEntry[phone_cell]']").autocomplete({
		  source: 'index.php?r=tblCustomerEntry/autocompletePhoneCell'
	});
	$("#tbl-customer-entry-grid [name='TblCustomerEntry[phone_other1]']").autocomplete({
		  source: 'index.php?r=tblCustomerEntry/autocompletePhoneOther1'
	});
	$("#tbl-customer-entry-grid [name='TblCustomerEntry[phone_other2]']").autocomplete({
		  source: 'index.php?r=tblCustomerEntry/autocompletePhoneOther2'
	});
}
