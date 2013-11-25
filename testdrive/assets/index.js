$(document).ready(function(){
	$( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
//	  onClose: function(dateText, inst){
//		  if(dateText == ""){
//			  alert("Please Select a Date");
//			  
//		  }
//	  },
	  onSelect: function(dateText, inst){
					$.ajax({
						url: encodeURI('index.php?r=user/test'),
						type: "GET",
						data: {d:dateText,s:''}
					}).done(function(data){
							$("#currdate").html(dateText);
							//alert("Finished");
					});

		  	    }
    });
	if($("#currdate").html() == "" || $("#activitypage").val() == 1) {
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
						url: encodeURI('index.php?r=user/test'),
						type: "GET",
						data: {d:$("#"+activeId).val(),s:'N'}
					}).done(function(data){
						$("#"+activeId).val(data);
					});
					break;
				case 189:
				case 173:
					$.ajax({
						url: encodeURI('index.php?r=user/test'),
						type: "GET",
						data: {d:$("#"+activeId).val(),s:'P'}
					}).done(function(data){
							$("#"+activeId).val(data);
					});
					break;
				case 84:

					$.ajax({
						url: encodeURI('index.php?r=user/test'),
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
						url: encodeURI('index.php?r=user/test'),
						type: "GET",
						data: {d:$("#currdate").html(),s:'N'}
					}).done(function(data){
						$("#currdate").html(data);
					});
					break;
				case 189:
				case 173:
					$.ajax({
						url: encodeURI('index.php?r=user/test'),
						type: "GET",
						data: {d:$("#currdate").html(),s:'P'}
					}).done(function(data){
							$("#currdate").html(data);
					});
					break;
				case 84:
					$.ajax({
						url: encodeURI('index.php?r=user/test'),
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
	tinymce.init({
	    selector: "textarea"
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
