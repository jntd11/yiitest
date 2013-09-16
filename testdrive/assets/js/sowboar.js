$(function() {
$( document ).tooltip({
position: {
my: "center bottom-20",
at: "center top",
using: function( position, feedback ) {
$( this ).css( position );
$( "<div>" )
.addClass( "arrow" )
.addClass( feedback.vertical )
.addClass( feedback.horizontal )
.appendTo( this );
}
}
});
});
var oldval;
function checkData(element,type,extra,extra1){
	if(type == 1){
		var val = element.value;
		if(val == "" || extra+" "+extra1 == val)
			return;
		var patt1 = /^[0-9][A-Z] [a-z]+ [0-9]{1,2}[ SFsf][0-9]{1,3}[\-\.][0-9]{1,2}$/gi;
		var patt2 = /[\-\.]/gi;
		var patt3 = /^[0-9][A-Z] /gi;		
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
			$("#earnotch").focus();
			return;
		}
		val = val.replace(".","-");
		$("#earnotch").val(val);
	}else if(type == 2){
		var val = element.value;
		val = val.replace(".","-");
	}
}
function searchSireDam(txtObj,type){
	var search1 = txtObj;
	if(type == 'sirename')
		$("#sire_notch").val(search1.replace(".","-"));
	if(type == 'damname')
		$("#dam_notch").val(search1.replace(".","-"));
	if(search1 != "") {
		var search1 = search1.replace(/\./,"-");
		$.ajax({
			url: encodeURI('index.php?r=sowBoar/search'),
			type: "GET",
			data: {s:search1}
		}).done(function(data){
			if(data != "[]"){
				var obj = $.parseJSON(data);
				$("#"+type).html(obj);
			}
		});
	}
}
function gerSireDam(type){
	if(type == 1){
		var search = $("#sire_notch").val();
	}else if(type == 2){
		var search = $("#dam_notch").val();
	}
	
	if(search != "") {
		search = search.replace(".","-");
		$.ajax({
			url: encodeURI('index.php?r=sowBoar/search'),
			type: "GET",
			data: {s:search}
		}).done(function(data){
			var obj = $.parseJSON(data);
			if(obj != "") {
				if(type == 1){
					window.location="index.php?r=sowBoar/siredam&val="+$("#sire_notch").val();
				}else if(type == 2){
					window.location="index.php?r=sowBoar/siredam&val="+$("#dam_notch").val();
				}
			}
		});
	}
}
$(document).ready(function(){
	   var el = $("input:text").get(0);
	    var elemLen = el.value.length;

	    el.selectionStart = elemLen;
	    el.selectionEnd = elemLen;
	    el.focus();
	$("#sow_boar_notch").focus();
	$("#sow-boar-form :input[type!='submit']").change(function() {
		   $("#sow-boar-form").data("changed",true);
	});
	autoSuggestSearch();
	$("#sow-boar-form :input[type=submit]").click(function() {
		   $("#sow-boar-form").data("changed",false);
	});
	
	
	window.onbeforeunload = iamexiting;
	function iamexiting(e) {
		if($("#sow-boar-form").data("changed")) {
			   return 'You have unsaved changes. Do you want to continue';
			   // submit the form
		}
		return;
	}
	if($("#sire_notch").val() != "" && $("#sire_notch").val() != undefined) 
		searchSireDam($('#sire_notch').val(),'sirename');
	if($("#dam_notch").val() != "" && $("#sire_notch").val() != undefined) 
		searchSireDam($("#dam_notch").val(),'damname');
});

function cancelSow(){
	$("#earnotch").val("");
	$("#SowBoar_sow_boar_name").focus();
	window.location="index.php?r=sowBoar/index";
}

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
	$("#sow-boar-grid [name='SowBoar[ear_notch]']").autocomplete({
		    source: 'index.php?r=sowBoar/autocompleteEarNotch',
		    select: function( event, ui ) {
		    	var data = this.name+"="+ui.item.value;
		    	$('#sow-boar-grid').yiiGridView('update', {data: data});
		    }
	});
	$("#sow-boar-grid [name='SowBoar[sow_boar_name]']").autocomplete({
	    source: 'index.php?r=sowBoar/autocompleteName',
	    select: function( event, ui ) {
	    	var data = this.name+"="+ui.item.value;
	    	$('#sow-boar-grid').yiiGridView('update', {data: data});
	    }
	});
	$("#sow-boar-grid [name='SowBoar[registeration_no]']").autocomplete({
	    source: 'index.php?r=sowBoar/autocompleteRegister',
	    select: function( event, ui ) {
	    	var data = this.name+"="+ui.item.value;
	    	$('#sow-boar-grid').yiiGridView('update', {data: data});
	    }
	});
	$("#sow-boar-grid [name='SowBoar[born]']").autocomplete({
	    source: 'index.php?r=sowBoar/autocompleteBorn',
	    select: function( event, ui ) {
	    	var data = this.name+"="+ui.item.value;
	    	$('#sow-boar-grid').yiiGridView('update', {data: data});
	    }
	});
	$("#sow-boar-grid [name='SowBoar[no_pigs]']").autocomplete({
	    source: 'index.php?r=sowBoar/autocompletePigs',
	    select: function( event, ui ) {
	    	var data = this.name+"="+ui.item.value;
	    	$('#sow-boar-grid').yiiGridView('update', {data: data});
	    }
	});
}
$(function() { 
	 $(':text').focus(function() { 
	  if (this.setSelectionRange) /* DOM */ 
	  { 
	   setTimeout(function(t) { /* hack for select delay */ 
	    t.setSelectionRange(t.value.length,t.value.length); 
	   },0,this); 
	  } 
	  else if (this.createTextRange) /* IE */ 
	  { 
	   r=this.createTextRange(); 
	   r.collapse(false); 
	   r.select(); 
	  } 
	 }); 
}); 