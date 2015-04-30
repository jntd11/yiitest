/*$(function() {
	var obj = $("table").last().attr('style');
	if(obj != null && obj != "") {
		var res = obj.match(/top:[\- ]+([0-9]+)px/g);
		//alert(res);
		$("#bottommenu").attr("style","position: relative;"+res);
	}
});*/
var oldval;
function checkData(element,type,extra,extra1){
	if(type == 1){
		var val = element.value;
		if(val == "" || extra+" "+extra1 == val)
			return;
		var patt1 = /^[0-9][A-Z] *[a-z]+ [0-9]{1,4}[ SFsf][0-9]{1,4}[\-\.][0-9]{1,3}$/gi;
		var patt2 = /[\-\.]/gi;
		var patt3 = /^[0-9][A-Z]/gi;		
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
			//$("#earnotch").focus();
			return;
		}
		val = val.replace(".","-");
		$("#earnotch").val(val);
	}else if(type == 2){
		var val = element.value;
		val = val.replace(".","-");
	}
	checkDate(val,1);
}


$(document).ready(function(){
	  if(typeof($("#from_date")) != "undefined") {
			$("#from_date").datepicker({
		      changeMonth: true,
		      changeYear: true,
		      showOn: 'button',
		      defaultDate: '<?php echo date("m/d/Y"); ?>',
		      constrainInput:false,
		      buttonImage:'img/calendar.gif',
		    });
	  }
	  if(typeof($("#to_date")) != "undefined") {
		$("#to_date").datepicker({
	      changeMonth: true,
	      changeYear: true,
	      showOn: 'button',
	      defaultDate: '<?php echo date("m/d/Y"); ?>',
	      constrainInput:false,
	      buttonImage:'img/calendar.gif',
	    });
	  }
	   var el = $("input:text").get(0);
	    var elemLen = el.value.length;

	    el.selectionStart = elemLen;
	    el.selectionEnd = elemLen;
	    el.focus();
	    
	/*window.onbeforeunload = iamexiting;
	function iamexiting(e) {
		if($("#semen-orders-form").data("changed")) {
			   return 'You have unsaved changes. Do you want to continue';
			   // submit the form
		}
		return;
	}*/
	    $("#semen-orders-form  :input[type!='submit']").change(function() {
			   $("#semen-orders-form ").data("changed",true);
		});

		$("#semen-orders-form  :input[type=submit]").click(function() {
			   $("#semen-orders-form ").data("changed",false);
		});
		$("#TblCustomerEntry_first_name").focus();
		autoSuggestSearch();
		if($("#isnew").val() == "0") {
			$("#SemenOrders_doses").focus();
			window.scrollBy(100,100);
		}
		
	$("#button_committed").bind("click",function(){
		$.ajax({
			url: encodeURI('index.php?r=SemenOrders/getListBydays'),
			data: {days:$("#days").val()},
			type: "GET",
		}).done(function(data){
			alert(data);
			$("#div_committed_results").html(data);
			semenPopup();
		});
		
	});
});

function setDefault(val,obj){
	var id = $(obj).attr('id');
	var el = $("#"+id).get(0);
	 window.o=obj; 
	  if (o.setSelectionRange)     /* DOM */ 
	   setTimeout('o.setSelectionRange(o.value.length,o.value.length)',2); 
	  else if (o.createTextRange)     /* IE */ 
	  { 
	   var r=o.createTextRange(); 
	   r.moveStart('character',o.value.length); 
	   r.select(); 
	  } 
	if(obj.value == "")
		obj.value = val;
	
}
function autoSuggestSearch(){
	$("#semen-orders-form [name='TblCustomerEntry[first_name]']").autocomplete({
	    source: 'index.php?r=SemenOrders/autocompleteFirstName&isall=0',
	    select: function( event, ui ) {
	    	var valArray = ui.item.value.split("-");
	    	ui.item.value = valArray[1];
	    	$("#SemenOrders_customer_id").val(valArray[0]);
	    	$.ajax({
				url: encodeURI('index.php?r=SemenOrders/autocompleteFirstName'),
				type: "GET",
				data: {isall:1,term:valArray[0]}
			}).done(function(data){
				var Obj = JSON.parse(data);
				if(typeof Obj.customer_entry_id != "undefined") {
					$("#TblCustomerEntry_company_name").val(Obj.company_name);
					$("#TblCustomerEntry_first_name").val(Obj.first_name);
					$("#TblCustomerEntry_last_name").val(Obj.last_name);
					$("#TblCustomerEntry_address1").val(Obj.address1);
					$("#TblCustomerEntry_address2").val(Obj.address2);
					$("#TblCustomerEntry_city").val(Obj.city);
					$("#TblCustomerEntry_zip").val(Obj.zip);
					$("#TblCustomerEntry_phone_home").val(Obj.phone_home);
					$("#TblCustomerEntry_phone_business").val(Obj.phone_business);
					$("#TblCustomerEntry_phone_cell").val(Obj.phone_cell);
					$("#TblCustomerEntry_phone_other1").val(Obj.phone_other1);
					$("#TblCustomerEntry_phone_other2").val(Obj.phone_other2);
					$("#TblCustomerEntry_state").val(Obj.state);
					$("#TblCustomerEntry_country").val(Obj.country);
					$("#TblCustomerEntry_contact").val(Obj.contact);
					$("#TblCustomerEntry_county").val(Obj.county);
					$("#TblCustomerEntry_mailing_code").val(Obj.mailing_code);
					
					$("#TblCustomerEntry_ship_company_name").val(Obj.ship_company_name);
					$("#TblCustomerEntry_ship_name").val(Obj.ship_name);
					$("#TblCustomerEntry_ship_address1").val(Obj.ship_address1);
					$("#TblCustomerEntry_ship_address2").val(Obj.ship_address2);
					$("#TblCustomerEntry_ship_city").val(Obj.ship_city);
					$("#TblCustomerEntry_ship_state").val(Obj.ship_state);
					$("#TblCustomerEntry_ship_zip").val(Obj.ship_zip);
					$("#TblCustomerEntry_ship_country").val(Obj.ship_country);
					$("#TblCustomerEntry_ship_contact").val(Obj.ship_contact);
					$("#TblCustomerEntry_ship_phone").val(Obj.ship_phone);
					$("#TblCustomerEntry_ship_area").val(Obj.ship_area);
					
					
					$("#TblCustomerEntry_cc_brand").val(Obj.cc_brand);
					$("#TblCustomerEntry_cc_number").val(Obj.cc_number);
					$("#TblCustomerEntry_cc_expiration").val(Obj.cc_expiration);
					$("#TblCustomerEntry_cc_name").val(Obj.cc_name);
					$("#SemenOrders_payment_type").focus();
				}
			});
	    	//var data = this.name+"="+ui.item.value;
	    	
	    }
	});

	$("#semen-orders-form [name='TblCustomerEntry[first_name]']").autocomplete({
	    source: 'index.php?r=semenOrders/autocompleteFirstName&isall=0',
	    select: function( event, ui ) {
	    	var valArray = ui.item.value.split("-");
	    	ui.item.value = valArray[1];
	    	$("#SemenOrders_customer_id").val(valArray[0]);
	    	$.ajax({
				url: encodeURI('index.php?r=semenOrders/autocompleteFirstName'),
				type: "GET",
				data: {isall:1,term:valArray[0]}
			}).done(function(data){
				var Obj = JSON.parse(data);
				if(typeof Obj.customer_entry_id != "undefined") {
					$("#TblCustomerEntry_company_name").val(Obj.company_name);
					$("#TblCustomerEntry_first_name").val(Obj.first_name);
					$("#TblCustomerEntry_last_name").val(Obj.last_name);
					$("#TblCustomerEntry_address1").val(Obj.address1);
					$("#TblCustomerEntry_address2").val(Obj.address2);
					$("#TblCustomerEntry_city").val(Obj.city);
					$("#TblCustomerEntry_zip").val(Obj.zip);
					$("#TblCustomerEntry_phone_home").val(Obj.phone_home);
					$("#TblCustomerEntry_phone_business").val(Obj.phone_business);
					$("#TblCustomerEntry_phone_cell").val(Obj.phone_cell);
					$("#TblCustomerEntry_phone_other1").val(Obj.phone_other1);
					$("#TblCustomerEntry_phone_other2").val(Obj.phone_other2);
					$("#TblCustomerEntry_state").val(Obj.state);
					$("#TblCustomerEntry_country").val(Obj.country);
					$("#TblCustomerEntry_contact").val(Obj.contact);
					$("#TblCustomerEntry_county").val(Obj.county);
					$("#TblCustomerEntry_mailing_code").val(Obj.mailing_code);
					
					$("#TblCustomerEntry_ship_company_name").val(Obj.ship_company_name);
					$("#TblCustomerEntry_ship_name").val(Obj.ship_name);
					$("#TblCustomerEntry_ship_address1").val(Obj.ship_address1);
					$("#TblCustomerEntry_ship_address2").val(Obj.ship_address2);
					$("#TblCustomerEntry_ship_city").val(Obj.ship_city);
					$("#TblCustomerEntry_ship_state").val(Obj.ship_state);
					$("#TblCustomerEntry_ship_zip").val(Obj.ship_zip);
					$("#TblCustomerEntry_ship_country").val(Obj.ship_country);
					$("#TblCustomerEntry_ship_contact").val(Obj.ship_contact);
					$("#TblCustomerEntry_ship_phone").val(Obj.ship_phone);
					$("#TblCustomerEntry_ship_area").val(Obj.ship_area);
					
					
					$("#TblCustomerEntry_cc_brand").val(Obj.cc_brand);
					$("#TblCustomerEntry_cc_number").val(Obj.cc_number);
					$("#TblCustomerEntry_cc_expiration").val(Obj.cc_expiration);
					$("#TblCustomerEntry_cc_name").val(Obj.cc_name);
					$("#SemenOrders_payment_type").focus();
				}
			});
	    	//var data = this.name+"="+ui.item.value;
	    	
	    }
	});
	$("#semen-orders-form [name='TblCustomerEntry[company_name]']").autocomplete({
	    source: 'index.php?r=semenOrders/autocompleteCompanyName&isall=0',
	    select: function( event, ui ) {
	    	var valArray = ui.item.value.split("-");
	    	ui.item.value = valArray[1];
	    	$("#SemenOrders_customer_id").val(valArray[0]);
	    	$.ajax({
				url: encodeURI('index.php?r=semenOrders/autocompleteCompanyName'),
				type: "GET",
				data: {isall:1,term:valArray[0]}
			}).done(function(data){
				var Obj = JSON.parse(data);
				if(typeof Obj.customer_entry_id != "undefined") {
					$("#TblCustomerEntry_company_name").val(Obj.company_name);
					$("#TblCustomerEntry_first_name").val(Obj.first_name);
					$("#TblCustomerEntry_last_name").val(Obj.last_name);
					$("#TblCustomerEntry_address1").val(Obj.address1);
					$("#TblCustomerEntry_address2").val(Obj.address2);
					$("#TblCustomerEntry_city").val(Obj.city);
					$("#TblCustomerEntry_zip").val(Obj.zip);
					$("#TblCustomerEntry_phone_home").val(Obj.phone_home);
					$("#TblCustomerEntry_phone_business").val(Obj.phone_business);
					$("#TblCustomerEntry_phone_cell").val(Obj.phone_cell);
					$("#TblCustomerEntry_phone_other1").val(Obj.phone_other1);
					$("#TblCustomerEntry_phone_other2").val(Obj.phone_other2);
					$("#TblCustomerEntry_state").val(Obj.state);
					$("#TblCustomerEntry_country").val(Obj.country);
					$("#TblCustomerEntry_contact").val(Obj.contact);
					$("#TblCustomerEntry_county").val(Obj.county);
					$("#TblCustomerEntry_mailing_code").val(Obj.mailing_code);
					
					$("#TblCustomerEntry_ship_company_name").val(Obj.ship_company_name);
					$("#TblCustomerEntry_ship_name").val(Obj.ship_name);
					$("#TblCustomerEntry_ship_address1").val(Obj.ship_address1);
					$("#TblCustomerEntry_ship_address2").val(Obj.ship_address2);
					$("#TblCustomerEntry_ship_city").val(Obj.ship_city);
					$("#TblCustomerEntry_ship_state").val(Obj.ship_state);
					$("#TblCustomerEntry_ship_zip").val(Obj.ship_zip);
					$("#TblCustomerEntry_ship_country").val(Obj.ship_country);
					$("#TblCustomerEntry_ship_contact").val(Obj.ship_contact);
					$("#TblCustomerEntry_ship_phone").val(Obj.ship_phone);
					$("#TblCustomerEntry_ship_area").val(Obj.ship_area);
					
					
					$("#TblCustomerEntry_cc_brand").val(Obj.cc_brand);
					$("#TblCustomerEntry_cc_number").val(Obj.cc_number);
					$("#TblCustomerEntry_cc_expiration").val(Obj.cc_expiration);
					$("#TblCustomerEntry_cc_name").val(Obj.cc_name);
					$("#SemenOrders_payment_type").focus();
				}
			});
	    	//var data = this.name+"="+ui.item.value;
	    	
	    }
	});
	$("#semen-orders-form [name='TblCustomerEntry[last_name]']").autocomplete({
	    source: 'index.php?r=semenOrders/autocompleteLastName&isall=0',
	    select: function( event, ui ) {
	    	var valArray = ui.item.value.split("-");
	    	ui.item.value = valArray[1];
	    	$("#SemenOrders_customer_id").val(valArray[0]);
	    	$.ajax({
				url: encodeURI('index.php?r=semenOrders/autocompleteLastName'),
				type: "GET",
				data: {isall:1,term:valArray[0]}
			}).done(function(data){
				var Obj = JSON.parse(data);
				if(typeof Obj.customer_entry_id != "undefined") {
					$("#TblCustomerEntry_company_name").val(Obj.company_name);
					$("#TblCustomerEntry_first_name").val(Obj.first_name);
					$("#TblCustomerEntry_last_name").val(Obj.last_name);
					$("#TblCustomerEntry_address1").val(Obj.address1);
					$("#TblCustomerEntry_address2").val(Obj.address2);
					$("#TblCustomerEntry_city").val(Obj.city);
					$("#TblCustomerEntry_zip").val(Obj.zip);
					$("#TblCustomerEntry_phone_home").val(Obj.phone_home);
					$("#TblCustomerEntry_phone_business").val(Obj.phone_business);
					$("#TblCustomerEntry_phone_cell").val(Obj.phone_cell);
					$("#TblCustomerEntry_phone_other1").val(Obj.phone_other1);
					$("#TblCustomerEntry_phone_other2").val(Obj.phone_other2);
					$("#TblCustomerEntry_state").val(Obj.state);
					$("#TblCustomerEntry_country").val(Obj.country);
					$("#TblCustomerEntry_contact").val(Obj.contact);
					$("#TblCustomerEntry_county").val(Obj.county);
					$("#TblCustomerEntry_mailing_code").val(Obj.mailing_code);
					
					$("#TblCustomerEntry_ship_company_name").val(Obj.ship_company_name);
					$("#TblCustomerEntry_ship_name").val(Obj.ship_name);
					$("#TblCustomerEntry_ship_address1").val(Obj.ship_address1);
					$("#TblCustomerEntry_ship_address2").val(Obj.ship_address2);
					$("#TblCustomerEntry_ship_city").val(Obj.ship_city);
					$("#TblCustomerEntry_ship_state").val(Obj.ship_state);
					$("#TblCustomerEntry_ship_zip").val(Obj.ship_zip);
					$("#TblCustomerEntry_ship_country").val(Obj.ship_country);
					$("#TblCustomerEntry_ship_contact").val(Obj.ship_contact);
					$("#TblCustomerEntry_ship_phone").val(Obj.ship_phone);
					$("#TblCustomerEntry_ship_area").val(Obj.ship_area);
					
					
					$("#TblCustomerEntry_cc_brand").val(Obj.cc_brand);
					$("#TblCustomerEntry_cc_number").val(Obj.cc_number);
					$("#TblCustomerEntry_cc_expiration").val(Obj.cc_expiration);
					$("#TblCustomerEntry_cc_name").val(Obj.cc_name);
					$("#SemenOrders_payment_type").focus();
				}
			});
	    	//var data = this.name+"="+ui.item.value;
	    	
	    }
	});
	$("#semen-orders-form [name='ear_tag']").autocomplete({
	    source: 'index.php?r=semenOrders/AutocompleteEarTag',
	    select: function( event, ui ) {
	    	var valArray = ui.item.value.split("_");
	    	ui.item.value = valArray[0];
	    	var id = ui.item.id;
	    	$.ajax({
				url: encodeURI('index.php?r=semenOrders/GetEarNotch'),
				type: "GET",
				data: {id:id}
			}).done(function(data){
				var Obj = JSON.parse(data);
				if(typeof Obj.sow_boar_id != "undefined") {
					$("#SemenOrders_sow_boar_id").val(Obj.sow_boar_id);
					$("#sow_boar_name").html(Obj.sow_boar_name);
					$("#sow_boar_reg").html(Obj.registeration_no);
					$("#ear_notch").val(Obj.ear_notch);
				}
			});
	    	
	    }
	});
	$("#semen-orders-form [name='ear_tag']").bind('blur',function(){
		if($(this).val() != "") {
			var name = $(this).val();
			$.ajax({
				url: encodeURI('index.php?r=semenOrders/GetEarNotch'),
				type: "GET",
				data: {name:$(this).val()}
			}).done(function(data){
				if(data == "false") {
					alert("Not a valid ear tag");
					$("#ear_tag").focus();
				}else {
					var Obj = JSON.parse(data);
					if(typeof Obj.sow_boar_id != "undefined") {
						$("#SemenOrders_sow_boar_id").val(Obj.sow_boar_id);
						$("#sow_boar_name").html(Obj.sow_boar_name);
						$("#sow_boar_reg").html(Obj.registeration_no);
						$("#ear_notch").val(Obj.ear_notch);
						$("#SemenOrders_doses").focus();
						getComitStandbyDoses(Obj.sow_boar_id);
					}
				}
			});
			
		}
	});
	
	$("#ear_notch").bind('blur',function(){
		if($("#SemenOrders_sow_boar_id").val() != "") {
			getComitStandbyDoses($("#SemenOrders_sow_boar_id").val());
		}
	});
	$("#semen-orders-form [name='ear_notch']").autocomplete({
	    source: 'index.php?r=semenOrders/AutocompleteEarNotch',
	    select: function( event, ui ) {
	    	var valArray = ui.item.value.split("_");
	    	ui.item.value = valArray[1];
	    	var id = ui.item.id;
	    	$.ajax({
				url: encodeURI('index.php?r=semenOrders/GetEarNotch'),
				type: "GET",
				data: {id:id}
			}).done(function(data){
				var Obj = JSON.parse(data);
				if(typeof Obj.sow_boar_id != "undefined") {
					$("#SemenOrders_sow_boar_id").val(Obj.sow_boar_id);
					$("#sow_boar_name").html(Obj.sow_boar_name);
					$("#sow_boar_reg").html(Obj.registeration_no);
					$("#ear_tag").val(Obj.ear_tag);
					$("#SemenOrders_doses").focus();
					getComitStandbyDoses(Obj.sow_boar_id);
				}
			});
	    }
	});
	$("#semen-orders-form [name='SemenOrders[semen_type]']").autocomplete({
	    source: 'index.php?r=semenOrders/AutocompleteSemenType',
	    select: function( event, ui ) {
	    	$("#semen_id").val(ui.item.id);
	    	$("#SemenOrders_shipping_cost").focus();
	    }
	});
	
}
function checkSemenType(val){
	if($("#SemenOrders_semen_type").val() != ""){
		$.get(encodeURI('index.php?r=semenOrders/AutocompleteSemenType'), {term:$("#SemenOrders_semen_type").val(),isType:1}, function(data){
			obj = $.parseJSON(data);
			if(obj == "") {
				if(confirm("Do you want to add this new Semen Type?")) {
					$.ajax({
						url: encodeURI('index.php?r=semenOrders/insertSemenType'),
						type: "GET",
						data: {code:val}
					}).done(function(data){
						//alert("Inserted");
					});
				}else{
					//$("#SemenOrders_semen_type").val("");
					$("#SemenOrders_semen_type").focus();
				}
			}
		});
		
	}
	
}
function checkOption(obj){
	if(obj.value == 'COD'){
		$("#SemenOrders_cod_charges").removeAttr("disabled");
		$("#SemenOrders_cod_charges").focus();
	}else{
		$("#SemenOrders_cod_charges").attr("disabled","disabled");
	}
}
$(function() { 
	 window.onbeforeunload = iamexiting;
		function iamexiting(e) {
			if($("#semen-orders-form").data("changed")) {
				   return 'You have unsaved changes. Do you want to continue';
				   // submit the form
			}
			return;
		}
	 $(':text').focus(function() { 
	  if (this.setSelectionRange) /* DOM */ 
	  { 
		  /*setTimeout(function(t) {  hack for select delay 
			  console.log(t.value.length);
			  t.setSelectionRange(t.value.length,t.value.length,"backward"); 
		  },0,this); */
		  this.setSelectionRange(this.value.length,this.value.length);
	  } 
	  else if (this.createTextRange) /* IE */ 
	  { 
	   r=this.createTextRange(); 
	   r.collapse(false); 
	   r.select(); 
	  } 
	 });
	
}); 

var t = null;


$(function(){
    $(window).resize(function(){
    	//setwidth(1);
        //$("#elementToResize").css('height',(h < 768 || w < 1024) ? 500 : 400);
    });
    $(window).mouseover(function(){
    	//var w = $(window).width();
    	//console.log(w);
    	
        //$("#elementToResize").css('height',(h < 768 || w < 1024) ? 500 : 400);
    });
});
function validateDate(val){
	if(val == "")
		return true;
	var patt = /^(([0-1][0-2])|([0]*[0-9]))[\-\.\/][0-9][0-9]*[\-\.\/][0-9][0-9]([0-9][0-9])*$/;
	if(!patt.test(val)){
		alert("Date - Invalid date format");
		//$("#born").focus();
		return false;
	}
	return true;
}

var CLIPBOARD = "";
$(function(){
	/* Menu 1: init by passing an array of entries. */

	$(document).contextmenu({
		delegate: ".hasmenu",
		preventContextMenuForPopup: false,
		preventSelect: false,
		ignoreParentSelect: false,
		taphold: false,
		menu: [
		    {title: "New", cmd: "new", uiIcon: "ui-icon-copy"},
			{title: "Duplicate", cmd: "duplicate", uiIcon: "ui-icon-clipboard"},
			{title: "Update", cmd: "update", uiIcon: "ui-icon-scissors"},
			{title: "Standby", cmd: "standby", uiIcon: "ui-icon-scissors"},
			],
		// Handle menu selection to implement a fake-clipboard
		select: function(event, ui) {
			var $target = ui.target;
			var a = $(ui.target).parent();
			switch(ui.cmd){
			case "new":
				CLIPBOARD = $target.text();
				var a = $(ui.target).parent();
				var newrowid = a[0].id;
				var val = $("#"+newrowid+"_date").val();
				window.location = 'index.php?r=SemenOrders/create&d='+val;
				break;
			case "duplicate":
				CLIPBOARD = $target.text();
				var a = $(ui.target).parent();
				var newrowid = a[0].id;
				var val = $("#"+newrowid+"_id").val();
				window.location = 'index.php?r=SemenOrders/create&id='+val;
				
				break;
			case "update":
				CLIPBOARD = $target.text();
				var a = $(ui.target).parent();
				var newrowid = a[0].id;
				var val = $("#"+newrowid+"_id").val();
				window.location = 'index.php?r=SemenOrders/update&id='+val;
				break;
			case "standby":
				CLIPBOARD = "";
				$(document).contextmenu("setEntry", "standby", {title: "Remove Standby", cmd: "remove", uiIcon: "ui-icon-scissors"});
				var newrowid = a[0].id;
				var val = $("#"+newrowid+"_id").val();
				$.ajax({
					url: encodeURI('index.php?r=semenOrders/ChangeStatus'),
					type: "GET",
					data: {s:1,id:val}
				}).done(function(data){
					location.reload();
					//window.location = 'index.php?r=semenorders/report';
				});
				
				break;
			case "remove":
				CLIPBOARD = "";
				$(document).contextmenu("setEntry", "remove", {title: "Standby", cmd: "standby", uiIcon: "ui-icon-scissors"})
				var newrowid = a[0].id;
				var val = $("#"+newrowid+"_id").val();
				$.ajax({
					url: encodeURI('index.php?r=semenOrders/ChangeStatus'),
					type: "GET",
					data: {s:0,id:val}
				}).done(function(data){
					location.reload();
					//window.location = 'index.php?r=semenorders/report';
				});
				break;
			}
			//alert("select " + ui.cmd + " on " + $target.text());
			// Optionally return false, to prevent closing the menu now
		},
		focus: function(event, ui) {
			var menuId = ui.item.find(">a").attr("href");
			$("#info").text("focus " + menuId);
			console.log("focus", ui.item);
		},
		// Implement the beforeOpen callback to dynamically change the entries
		beforeOpen: function(event, ui) {
			var $menu = ui.menu,
				$target = ui.target,
				extraData = ui.extraData; // passed when menu was opened by call to open()
			// console.log("beforeOpen", event, ui, event.originalEvent.type);
			$(document)
//				.contextmenu("replaceMenu", [{title: "aaa"}, {title: "bbb"}])
//				.contextmenu("replaceMenu", "#options2")
//				.contextmenu("setEntry", "cut", {title: "Cuty", uiIcon: "ui-icon-heart", disabled: true})
				.contextmenu("setEntry", "copy", "Copy '" + $target.text() + "'")
				.contextmenu("setEntry", "paste", "Paste" + (CLIPBOARD ? " '" + CLIPBOARD + "'" : ""))
				.contextmenu("enableEntry", "paste", (CLIPBOARD !== ""));
			var a = $(ui.target).parent();
			
			var newrowid = a[0].id;
			
			if($("#"+newrowid+"_header").val() == 1) {
				$(document).contextmenu("setEntry", "standby", {title: "Remove Standby", disabled: true,cmd: "remove", uiIcon: "ui-icon-scissors"});
				$(document).contextmenu("setEntry", "remove", {title: "Standby", disabled: true,cmd: "standby", uiIcon: "ui-icon-scissors"});
				$(document).contextmenu("setEntry", "new",{title: "New", cmd: "new",disabled: false,  uiIcon: "ui-icon-copy"});
				$(document).contextmenu("setEntry", "duplicate",{title: "Duplicate", cmd: "duplicate",disabled: true,  uiIcon: "ui-icon-scissors"});
				$(document).contextmenu("setEntry", "update",{title: "Update", cmd: "update",disabled: true,  uiIcon: "ui-icon-scissors"});
				//$(document).contextmenu("setEntry", "remove",{title: "Remove Standby",disabled: true, cmd: "remove", uiIcon: "ui-icon-scissors"});
			}else{
				$(document).contextmenu("setEntry", "new",{title: "New", cmd: "new",disabled: false,  uiIcon: "ui-icon-copy"});
				$(document).contextmenu("setEntry", "duplicate",{title: "Duplicate", cmd: "duplicate",disabled: false,  uiIcon: "ui-icon-scissors"});
				$(document).contextmenu("setEntry", "update",{title: "Update", cmd: "update",disabled: false,  uiIcon: "ui-icon-scissors"});
				$(document).contextmenu("enableEntry", "duplicate", true);
				$(document).contextmenu("enableEntry", "update", true);
				$(document).contextmenu("enableEntry", "standby",true);
				//$(document).contextmenu("enableEntry", "remove",true);
			}
			 if($("#"+newrowid+"_standby").html() == "Y") {
					$(document).contextmenu("setEntry", "standby", {title: "Remove Standby", cmd: "remove", uiIcon: "ui-icon-scissors"});
					$(document).contextmenu("enableEntry", "standby",true);
			 }else{
					$(document).contextmenu("setEntry", "remove", {title: "Standby", cmd: "standby", uiIcon: "ui-icon-scissors"});
					$(document).contextmenu("enableEntry", "remove",true);
			 }
			
			// Optionally return false, to prevent opening the menu now
		}
	});

	/* Menu 2: init menu by passing an <ul> element. */

	

	/* Open and close an existing menu without programatically. */

	$("#triggerPopup").click(function(){
		// Trigger popup menu on the first target element
		$(document).contextmenu("open", $(".hasmenu:first"), {foo: "bar"});
		setTimeout(function(){
			$(document).contextmenu("close");
		}, 2000);
	});
});
function print(){
	/*$("#containerprint").dialog({
		autoOpen: true,
		width: 800,
		modal: true,
		closeOnEscape: true,
		buttons: [
			{
				text: "Print",
				click: function() {
					alert("Jai");
					window.print();
				}
			}
		]
	});*/
	var myWindow = window.open("index.php?r=autoChores/report","MsgWindow","width=600,height=800");
	myWindow.print();
}
function fillCode(val){
	if(val == '&lt;New&gt;'){ 
		openDialogMailing();
	}else {
		var valArray = val.split("-");
		$("#semen-orders-form [name='TblCustomerEntry[mailing_code]']").val($("#semen-orders-form [name='TblCustomerEntry[mailing_code]']").val()+valArray[0]);
	}
}
function checkDecimal(id){
	var val = $("#"+id).val();
	val = val.replace(/\.([0-9][0-9])[0-9]+/,".$1");
	$("#"+id).val(val);
}
function getComitStandbyDoses(id){
	$.ajax({
		url: encodeURI('index.php?r=semenOrders/GetComitStandbyDoses'),
		type: "GET",
		data: {id:id,dt:$("#ship_date").val()}
	}).done(function(data){
		var Obj = JSON.parse(data);
		$("#SemenOrders_committed").val(Obj.commited);
		$("#SemenOrders_standby").val(Obj.standby);
	});	
}
function semenPopup(){
	$("#div_committed").dialog({
		autoOpen: true,
		width: 400,
		modal: true,
		closeOnEscape: false,
		buttons: [
			{
				text: "Save",
				click: function() {
					$( this ).dialog( "close" );
				}
			},
			{
				text: "Cancel",
				click: function() {
					$("#eartag").val("");
					$( this ).dialog( "close" );
					$("#eartag").focus();
				}
			}
		]
	});
}