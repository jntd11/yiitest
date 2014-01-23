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
	if($("#TblCustomerEntry_entry_date").val() == "")
		$("#TblCustomerEntry_entry_date").val($("#currdate").html());
	$("#tbl-customer-entry-form :input[type!='submit']").change(function() {
		   $("#tbl-customer-entry-form").data("changed",true);
	});

	$("#tbl-customer-entry-form :input[type=submit]").click(function() {
		   $("#tbl-customer-entry-form").data("changed",false);
	});
	
	$("#tbl-mailing-code-form :input[type=submit]").click(function() {
		$("#tbl-customer-entry-form").data("changed",false);
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
	$("#Tbl-customer-entry-grid [name='TblCustomerEntry[first_name]']").autocomplete({
		    source: 'index.php?r=tblCustomerEntry/autocompleteFirstName',
		    select: function( event, ui ) {
		    	var data = this.name+"="+ui.item.value;
		    	$('#Tbl-customer-entry-grid').yiiGridView('update', {data: data});
		    }
	});
	
	$("#Tbl-customer-entry-grid [name='TblCustomerEntry[last_name]']").autocomplete({
	    	  source: 'index.php?r=tblCustomerEntry/autocompleteLastName',
	  		    select: function( event, ui ) {
			    	var data = this.name+"="+ui.item.value;
			    	$('#Tbl-customer-entry-grid').yiiGridView('update', {data: data});
			    }
	});
	$("#Tbl-customer-entry-grid [name='TblCustomerEntry[company_name]']").autocomplete({
		  source: 'index.php?r=tblCustomerEntry/autocompleteCompanyName',
		    select: function( event, ui ) {
		    	var data = this.name+"="+ui.item.value;
		    	$('#Tbl-customer-entry-grid').yiiGridView('update', {data: data});
		    }
	});
	$("#Tbl-customer-entry-grid [name='TblCustomerEntry[phone_home]']").autocomplete({
		  source: 'index.php?r=tblCustomerEntry/autocompletePhoneHome',
			    select: function( event, ui ) {
			    	var data = this.name+"="+ui.item.value;
			    	$('#Tbl-customer-entry-grid').yiiGridView('update', {data: data});
			    }
	});
	$("#Tbl-customer-entry-grid [name='TblCustomerEntry[phone_business]']").autocomplete({
		  source: 'index.php?r=tblCustomerEntry/autocompletePhoneBusiness',
			    select: function( event, ui ) {
			    	var data = this.name+"="+ui.item.value;
			    	$('#Tbl-customer-entry-grid').yiiGridView('update', {data: data});
			    }
	});
	$("#Tbl-customer-entry-grid [name='TblCustomerEntry[phone_cell]']").autocomplete({
		  source: 'index.php?r=tblCustomerEntry/autocompletePhoneCell',
			    select: function( event, ui ) {
			    	var data = this.name+"="+ui.item.value;
			    	$('#Tbl-customer-entry-grid').yiiGridView('update', {data: data});
			    }
	});
	$("#Tbl-customer-entry-grid [name='TblCustomerEntry[phone_other1]']").autocomplete({
		  source: 'index.php?r=tblCustomerEntry/autocompletePhoneOther1',
			    select: function( event, ui ) {
			    	var data = this.name+"="+ui.item.value;
			    	$('#Tbl-customer-entry-grid').yiiGridView('update', {data: data});
			    }
	});
	$("#Tbl-customer-entry-grid [name='TblCustomerEntry[phone_other2]']").autocomplete({
		  source: 'index.php?r=tblCustomerEntry/autocompletePhoneOther2',
			    select: function( event, ui ) {
			    	var data = this.name+"="+ui.item.value;
			    	$('#Tbl-customer-entry-grid').yiiGridView('update', {data: data});
			    }
	});
	$('#Tbl-customer-entry-grid tbody > tr').on('click', function(id){
		//$(this).click();
		var link = $(this).find('a.update').attr('href');
		location.href = link;
	});

	/*
	 * $("#tbl-customer-entry-form [name='TblCustomerEntry[mailing_code]']").autocomplete({
	    source: 'index.php?r=tblCustomerEntry/autocompleteMailingCode',
	    select: function( event, ui ) {
	    	var data = this.name+"="+ui.item.value;
	    	if(ui.item.value == "<New>"){
	    		ui.item.value = "";
	    		this.value = this.value.replace(/\<n*e*w*>*\/,"");
	    		var terms = split(this.value);
		    	// remove the current input
	    		openDialogMailing();
	    		//location.href = 'index.php?r=tblMailingCode/create';
	    	}else{
	    		var terms = split( this.value );
		    	// remove the current input
		        terms.pop();
		    	var val = ui.item.value;
		    	var valArray = val.split("-");
		    	//ui.item.value = valArray[0];
		    	terms.push( valArray[0] );
		    	//terms.push( val );
		          // add placeholder to get the comma-and-space at the end
	    	}
	        terms.push( "" );
	        this.value = terms.join( "" );	    	
	        return false;
	    }
	});*/
}
function split( val ) {
    //return val.split( /,\s*/ );
	return val.split("");
 }

function fillCode(val){
	if(val == '&lt;New&gt;'){ 
		openDialogMailing();
	}else {
		var valArray = val.split("-");
		$("#tbl-customer-entry-form [name='TblCustomerEntry[mailing_code]']").val($("#tbl-customer-entry-form [name='TblCustomerEntry[mailing_code]']").val()+valArray[0]);
	}
}

function successPopup(data){
	$("#dropmenu1").append("<li><a href='javascript: void(0)' onClick='fillCode($(this).html())'>"+$("#mailing_code_label").val()+"-"+$("#mailing_code_desc").val()+"</a></li>");
}