$(document).ready(function(){
	$( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
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
	if($("#currdate").html() == "") {
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
	}else{
		$("#dialog").remove();
	}
	$(document).keydown(function(event) {
		  switch(event.which) {
		  	case 187:
				$.ajax({
					url: encodeURI('index.php?r=user/test'),
					type: "GET",
					data: {d:$("#currdate").html(),s:'N'}
				}).done(function(data){
						$("#currdate").html(data);
				});
		  		break;
		  	case 189:
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
		  		break;		  }
		  var msg = "Handler for .keypress() called " + event.which + " time(s).";
		  console.log(msg);
	});
	//$("input").unbind('keydown');
	//$('input').keydown(function(event) {console.log("india"); event.stopPropagation(); event.preventDefault();});
});


