$(document).ready(function(){
	$( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
      showOn: 'button',
      buttonImage:'img/calendar.gif',
//	  onClose: function(dateText, inst){
//		  if(dateText == ""){
//			  alert("Please Select a Date");
//			  
//		  }
//	  },
	  onSelect: function(dateText, inst){
					$.ajax({
						url: encodeURI('index.php?r=user/user/test'),
						type: "GET",
						data: {d:dateText,s:''}
					}).done(function(data){
							$("#currdate").html(dateText);
							//alert("Finished");
					});

		  	    }
    });
	if(($("#currdate").html() == "" && $("#islogged").val() != "1") || $("#activitypage").val() == 1) {
		if($("#activitypage").val() == 1)
			$("#datepicker").val($("#currdate").html());
		$("#dialog").dialog({
			autoOpen: true,
			width: 400,
			modal: true,
			closeOnEscape: false,
			buttons: [
				{
					text: "Ok",
					click: function() {
						if($("#datepicker").val() == "") 
							alert("Enter Valid Date");
						else
							$(this).dialog("close");
					}
				}
			]
		});
	}else{
		$("#dialog").remove();
	}
	var arr = [ "TblCustomerEntry_last_letter_sent", "TblCustomerEntry_entry_date", "TblCustomerEntry_att_sale", "John" ];
	$(document).keydown(function(event) {
		  var activeId = this.activeElement.id;
		  if($.inArray(activeId,arr) > -1){
			switch(event.which) {
				case 187:
				case 61:
					$.ajax({
						url: encodeURI('index.php?r=user/user/test'),
						type: "GET",
						data: {d:$("#"+activeId).val(),s:'N'}
					}).done(function(data){
						$("#"+activeId).val(data);
					});
					break;
				case 189:
				case 173:
					$.ajax({
						url: encodeURI('index.php?r=user/user/test'),
						type: "GET",
						data: {d:$("#"+activeId).val(),s:'P'}
					}).done(function(data){
							$("#"+activeId).val(data);
					});
					break;
				case 84:

					$.ajax({
						url: encodeURI('index.php?r=user/user/test'),
						type: "GET",
						data: {d:$("#"+activeId).val(),s:'T'}
					}).done(function(data){
							$("#"+activeId).val(data);
					});
					break;		  
				}
		  }else{
			  switch(event.which) {
				case 187:
				case 61:
					$.ajax({
						url: encodeURI('index.php?r=user/user/test'),
						type: "GET",
						data: {d:$("#currdate").html(),s:'N'}
					}).done(function(data){
						$("#currdate").html(data);
					});
					break;
				case 189:
				case 173:
					$.ajax({
						url: encodeURI('index.php?r=user/user/test'),
						type: "GET",
						data: {d:$("#currdate").html(),s:'P'}
					}).done(function(data){
							$("#currdate").html(data);
					});
					break;
				case 84:
					$.ajax({
						url: encodeURI('index.php?r=user/user/test'),
						type: "GET",
						data: {d:$("#currdate").html(),s:'T'}
					}).done(function(data){
							$("#currdate").html(data);
					});
					break;		  
				}
		  }
		  var msg = "Handler for .keypress() called " + event.which + " time(s).";
	});
	//$("input").unbind('keydown');
	//$('input').keydown(function(event) {console.log("india"); event.stopPropagation(); event.preventDefault();});
	$("#submitactivitydate").bind('click',function(){
		location.reload();
	});
	
});

function openDialog(){
	$("#currdate").html("");
	$("#dialog").dialog({
		autoOpen: true,
		width: 400,
		modal: true,
		closeOnEscape: false,
		buttons: [
			{
				text: "Ok",
				click: function() {
					if($("#datepicker").val() == "") 
						alert("Enter Valid Date");
					else
						$( this ).dialog( "close" );
				}
			}
		]
	});
}
function openDialogMailing(){
	$("#mailingcodedialog").dialog({
		autoOpen: true,
		width: 600,
		modal: true,
		data: 1,
		closeOnEscape: true,
	});
}
function caps(element){
	element.value = element.value.toUpperCase();
}
function isInteger(event){
			var charCode = (event.which) ? event.which : event.keyCode
	         if (charCode > 31 && (charCode < 48 || charCode > 57))
	            return false;

	         return true;
}

function dateReplace(event){
	var charCode = (event.which) ? event.which : event.keyCode
	alert(charCode);
}

function validateDatePicker(fieldId){
	
	var val = $("#"+fieldId).val();
	if(val == "" || (fieldId == 'bred_date' && val == 'BOAR'))
		return true;
	val = val.replace(/[\.\-]/g,"/");
	$("#"+fieldId).val(val);
	var patt = /^(([0-1][0-2])|([0]*[0-9]))[\-\.\/][0-9][0-9]*[\-\.\/][0-9][0-9]([0-9][0-9])*$/;
	if(!patt.test(val)){
		alert("Date - Invalid date format");
		$("#"+fieldId).val("");
		$("#"+fieldId).focus();
		return false;
	}
	return true;
}
function nextHerd(isNext,url){
	$.ajax({
		url: encodeURI('index.php?r=TblHerdSetup/next'),
		type: "GET",
		data: {isNext:isNext,url:url}
	}).done(function(data){
		  if(data) {
			  patt1=new RegExp("[a-zA-Z]+\/update");
			  if(patt1.test(url)) {
				  url = url.replace(/updatelitter/,"admin1");
				  url = url.replace(/update/,"admin");
				  location.href= 'index.php?'+url;
			  }else{
				  var x = location.origin;
				  var path = location.pathname;
				  //window.location.href= x+path+'?'+url;
				 window.location.href= 'index.php?'+url;
				  $("#redisplay").click();
			  }
		  }
	});
}
function nextDate(){
	$.ajax({
		url: encodeURI('index.php?r=user/user/test'),
		type: "GET",
		data: {d:$("#currdate").html(),s:'N'}
	}).done(function(data){
		$("#currdate").html(data);
	});
}
function prevDate(){
	$.ajax({
		url: encodeURI('index.php?r=user/user/test'),
		type: "GET",
		data: {d:$("#currdate").html(),s:'P'}
	}).done(function(data){
			$("#currdate").html(data);
	});
	
}
function dottodash(element){
	element.value = element.value.replace(".","-")
}

function getEarnotch(obj,id,next){
	val = obj.value;
	if(val != "") {
		$.ajax({
			url: encodeURI('index.php?r=sowBoar/getEarNotch'),
			type: "GET",
			data: {val:val}
		}).done(function(data){
			if(data != 0) {
				$("#"+id).val(data);
				if(next != ''){
					$("#"+next).focus();
				}
			}else{
				$("#"+id).focus();
			}
			
		});
	}
	$("#"+next).focus();
}