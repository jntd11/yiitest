$(document).ready(function(){
	$("#creditbutton").bind('click',function(){
		$("#creditinfo").toggle();
	});
	$("#shipbutton").bind('click',function(){
		$("#shipinfo").toggle();
	});	
	var availableTags = [
	                     "ActionScript",
	                     "AppleScript",
	                     "Asp",
	                     "BASIC",
	                     "C",
	                     "C++",
	                     "Clojure",
	                     "COBOL",
	                     "ColdFusion",
	                     "Erlang",
	                     "Fortran",
	                     "Groovy",
	                     "Haskell",
	                     "Java",
	                     "JavaScript",
	                     "Lisp",
	                     "Perl",
	                     "PHP",
	                     "Python",
	                     "Ruby",
	                     "Scala",
	                     "Scheme"
	                   ];
	$("#tbl-customer-entry-grid [name='TblCustomerEntry[first_name]']").autocomplete({
	      source: 'index.php?r=tblCustomerEntry/autocompleteTest'
	});
});