$(function() {
	var obj = $("table").last().attr('style');
	if(obj != null && obj != "") {
		var res = obj.match(/top:[\- ]+([0-9]+)px/g);
		//alert(res);
		$("#bottommenu").attr("style","position: relative;"+res);
	}
});
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
	   var el = $("input:text").get(0);
	    var elemLen = el.value.length;

	    el.selectionStart = elemLen;
	    el.selectionEnd = elemLen;
	    el.focus();
	if($("#sow_boar_notch").val() != "undefined")
		$("#sow_boar_notch").focus();
	$("#sow-gilts-form :input[type!='submit']").change(function() {
		   $("#sow-gilts-form").data("changed",true);
	});
	autoSuggestSearch();
	$("#sow-gilts-form :input[type=submit]").click(function() {
		   $("#sow-gilts-form").data("changed",false);
	});
	$("#earnotch").autocomplete({
	    source: 'index.php?r=sowGilts/autocompleteEarNotch',
	    select: function( event, ui ) {
	    	var data = this.name+"="+ui.item.value;
	    	$("#earnotch").val(ui.item.value);
	    },
	});
	$("#sirenotch").autocomplete({
	    source: 'index.php?r=sowGilts/autocompletesirenotch',
	    select: function( event, ui ) {
	    	var data = this.name+"="+ui.item.value;
	    	$("#sirenotch").val(ui.item.value);
	    },
	});
	
	//CreateTree();
	//$(window).load(CreateTree());
	window.onbeforeunload = iamexiting;
	function iamexiting(e) {
		if($("#sow-gilts-form").data("changed")) {
			   return 'You have unsaved changes. Do you want to continue';
			   // submit the form
		}
		return;
	}
	if($("#sire_notch").val() != "" && $("#sire_notch").val() != undefined) 
		searchSireDam($('#sire_notch').val(),'sirename');
	if($("#dam_notch").val() != "" && $("#sire_notch").val() != undefined) 
		searchSireDam($("#dam_notch").val(),'damname');
	if($("#farrowed_date").val() != "undefined") {
		$("#farrowed_date").focus();
	}
});

function cancelSow(){
	window.location="index.php?r=sowGilts/admin";
}
function cancelLitter(){
	window.location="index.php?r=litters/admin";
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
	$("#sow-gilts-grid [name='SowGilts[sow_ear_notch]']").autocomplete({
		    source: 'index.php?r=sowGilts/autocompleteSow',
		    select: function( event, ui ) {
		    	var data = this.name+"="+ui.item.value;
		    	$('#sow-gilts-grid').yiiGridView('update', {data: data});
		    }
	});
	$("#sow-gilts-grid [name='SowGilts[date_bred]']").autocomplete({
	    source: 'index.php?r=sowGilts/autocompleteDateBred',
	    select: function( event, ui ) {
	    	var data = this.name+"="+ui.item.value;
	    	$('#sow-gilts-grid').yiiGridView('update', {data: data});
	    }
	});
	$("#sow-gilts-grid [name='SowGilts[sire_ear_notch]']").autocomplete({
	    source: 'index.php?r=sowGilts/autocompleteSire',
	    select: function( event, ui ) {
	    	var data = this.name+"="+ui.item.value;
	    	$('#sow-gilts-grid').yiiGridView('update', {data: data});
	    }
	});
	$("#sow-gilts-grid [name='SowGilts[service_type]']").autocomplete({
	    source: 'index.php?r=sowGilts/autocompleteService',
	    select: function( event, ui ) {
	    	var data = this.name+"="+ui.item.value;
	    	$('#sow-gilts-grid').yiiGridView('update', {data: data});
	    }
	});
	$("#sow-gilts-grid [name='SowGilts[comments]']").autocomplete({
	    source: 'index.php?r=sowGilts/autocompleteComments',
	    select: function( event, ui ) {
	    	var data = this.name+"="+ui.item.value;
	    	$('#sow-gilts-grid').yiiGridView('update', {data: data});
	    }
	});
	
	$("#sow-gilts-grid [name='SowGilts[passover_date]']").autocomplete({
	    source: 'index.php?r=sowGilts/autocompletePass',
	    select: function( event, ui ) {
	    	var data = this.name+"="+ui.item.value;
	    	$('#sow-gilts-grid').yiiGridView('update', {data: data});
	    }
	});
	
	$("#sow-gilts-grid [name='SowGilts[due_date]']").autocomplete({
	    source: 'index.php?r=sowGilts/autocompleteDue',
	    select: function( event, ui ) {
	    	var data = this.name+"="+ui.item.value;
	    	$('#sow-gilts-grid').yiiGridView('update', {data: data});
	    }
	});
	$("#sow-gilts-grid [name='SowGilts[days_between]']").autocomplete({
	    source: 'index.php?r=sowGilts/autocompleteDays',
	    select: function( event, ui ) {
	    	var data = this.name+"="+ui.item.value;
	    	$('#sow-gilts-grid').yiiGridView('update', {data: data});
	    }
	});	
	$('#sow-gilts-grid tbody > tr').on('click', function(id){
		//$(this).click();
		var link = $(this).find('a.update').attr('href');
		location.href = link;
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
function validateForm(){
	return validateDate($("#born").val());
}
function validateLitterForm(){
	return validateDate($("#farrowed_date").val());
}
function checkDate(val,type){
	if(val != "") {
		$.ajax({
			url: encodeURI('index.php?r=sowGilts/Checksolddate'),
			type: "GET",
			data: {s:val,type:type}
		}).done(function(data){
			if(data != "") {
				if(type == 2)
					$("#sirenotchwarning").html("This Sow has been sold");
				else
					$("#earnotchwarning").html("This Sow has been sold");
			}
			else{ 
				
				if(type == 2)
					$("#sirenotchwarning").html("");
				else
					$("#earnotchwarning").html("");
			}
		});
	}
	return;
}
function checkFarrow(id){
	var val = $("#Litters_sow_ear_notch").val();
	if(val != "") {
		$.ajax({
			url: encodeURI('index.php?r=sowGilts/CheckFarrowed'),
			type: "GET",
			data: {s:val,id:id}
		}).done(function(data){
			    var Obj = JSON.parse(data);
				$("#sow_parity").val(Obj.last_parity);
				if(typeof Obj.litters_id != "undefined") {
					$("#litters_id").val(Obj.litters_id);
					$("#farrowed_date").val(Obj.farrowed_date);
					$("#time_settle").val(Obj.time_settle);
					$("#herd_litter").val(Obj.herd_litter);
					$("#no_pigs").val(Obj.no_pigs);
					$("#no_born_alive").val(Obj.no_born_alive);
					$("#no_boars_alive").val(Obj.no_boars_alive);
					$("#gilts_alive").val(Obj.gilts_alive);
					$("#birth_wgt").val(Obj.birth_wgt);
				}
			}
		);
	}
}
function checkExistlitters(){
	$.ajax({
		url: encodeURI('index.php?r=sowGilts/Checkexist'),
		type: "GET",
		data: {earnotch:earnotch,born:born,isupd:isupd}
	}).done(function(data){
		if(isupd != 1) {
			if(data.match(/redirect/)){
				data = data.replace("redirect-","");
				window.location.href = "index.php?r=sowGilts/update&id="+data;
			}
		}
		if(data != "") {
			var Obj = JSON.parse(data);
			var myDate = new Date(born); 
			var myDateOrg= new Date(born);  
			myDate.setDate(myDate.getDate()+parseInt(Obj.passover_days));
			$("#SowGilts_passover_date").val($.datepicker.formatDate("mm/dd/yy", myDate));
			myDateOrg.setDate(myDateOrg.getDate()+parseInt(Obj.due_days));
			$("#SowGilts_due_date").val($.datepicker.formatDate("mm/dd/yy", myDateOrg));
		}
	});
}
function changeDate(){
	var farrowed = $("#farrowed_date").val();
	farrowed = farrowed.replace(/[\.\-]/g,"/");
	$("#farrowed_date").val(farrowed);
}
function checkExist(dates,isupd){
	
	var earnotch = $("#earnotch").val();
	if($("#born").val() == "") {
		$("#born").val(dates);
	} else {
		var born = $("#born").val();
		born = born.replace(/[\.\-]/g,"/");
		$("#born").val(born);
	}
	var born = $("#born").val();
	if(!validateDate(born)) {
		$("#born").val("");
		return false; 
	}
	
	if(earnotch != "" && born != "") {
		
			$.ajax({
				url: encodeURI('index.php?r=sowGilts/Checkexist'),
				type: "GET",
				data: {earnotch:earnotch,born:born,isupd:isupd}
			}).done(function(data){
				if(isupd != 1) {
					if(data.match(/redirect/)){
						data = data.replace("redirect-","");
						window.location.href = "index.php?r=sowGilts/update&id="+data;
					}
				}
				if(data != "") {
					var Obj = JSON.parse(data);
					var myDate = new Date(born); 
					var myDateOrg= new Date(born);  
					myDate.setDate(myDate.getDate()+parseInt(Obj.passover_days));
					$("#SowGilts_passover_date").val($.datepicker.formatDate("mm/dd/yy", myDate));
					myDateOrg.setDate(myDateOrg.getDate()+parseInt(Obj.due_days));
					$("#SowGilts_due_date").val($.datepicker.formatDate("mm/dd/yy", myDateOrg));
				}
			});
		if(isupd){
			var id = $("#sow_id").val();
		}
		$.ajax({
			url: encodeURI('index.php?r=sowGilts/getdaysbtw'),
			type: "GET",
			data: {earnotch:earnotch,born:born,id:id}
		}).done(function(data){
				$("#SowGilts_days_between").val(parseInt(data));
		});
	}
	return;
}
