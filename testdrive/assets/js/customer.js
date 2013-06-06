$(document).ready(function(){
	$("#creditbutton").bind('click',function(){
		$("#creditinfo").toggle();
	});
	$("#shipbutton").bind('click',function(){
		$("#shipinfo").toggle();
	});	
	autoSuggestSearch();
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