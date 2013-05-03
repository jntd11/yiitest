$(document).ready(function(){
	$( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
	  onSelect: function(dateText, inst){
					alert(dateText);
					$.ajax({
						url: encode('index.php?r=site/testdate'),
						type: "GET",
						data: dateText
					}).done(function(data){
							alert("Finished");
					});

		  	    }
    });

	$("#dialog").dialog({
		autoOpen: true,
		width: 400,
		modal: true,
		closeOnEscape: false,
		buttons: [
			{
				text: "Ok",
				click: function() {
					$( this ).dialog( "close" );
				}
			}
		]
	});
});

