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
		var patt1 = /^[0-9][A-Z] *[a-z]+ *[0-9]{1,2}[ SFsf][0-9]{1,4}[\-\.][0-9]{1,3}$/gi;
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
	if($("#ishogtag").val() == "T")	
		$("#eartag").focus();
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
			data: {s:1}
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
	
	//CreateTree();
	//$(window).load(CreateTree());
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
	$("input[name='SowBoar[ear_notch]']").live("keyup",function(event){dottodash(this);})
});

function cancelSow(){
	$("#earnotch").val("");
	$("#SowBoar_sow_boar_name").focus();
	window.location="index.php?r=sowBoar/admin";
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
	$('#sow-boar-grid tbody > tr').on('click', function(id){
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

function CreateTree() {
	t = new ECOTree('t','sample2');						
	t.config.iRootOrientation = ECOTree.RO_LEFT;
	t.config.defaultNodeWidth = 112;
	t.config.defaultNodeHeight = 20;
	t.config.iSubtreeSeparation = 20;
	t.config.iSiblingSeparation = 10;										
	t.config.linkType = 'B';
	t.config.useTarget = false;
	t.config.nodeFill = ECOTree.NF_GRADIENT;
	t.config.colorStyle = ECOTree.CS_LEVEL;
	t.config.levelColors = ["#966E00","#BC9400","#D9B100","#FFD700"];
	t.config.levelBorderColors = ["#FFD700","#D9B100","#BC9400","#966E00"];
	t.config.nodeColor = "#FFD700";
	t.config.nodeBorderColor = "#FFD700";
	t.config.linkColor = "#FFD700";
	t.add(1,-1,'species',null,null,"#F08080");
	t.add(2,1,'plants');
	t.add(3,1,'fungi');
	t.add(4,1,'lichens');
	t.add(5,1,'animals');
	t.add(6,2,'mosses');
	t.add(7,2,'ferns');
	t.add(8,2,'<a href="">gymnosperms</a>');
	t.add(9,2,'dicotyledons');
	t.add(10,2,'monocotyledons');
	t.add(11,5,'invertebrates');
	t.add(12,5,'vertebrates');
	t.add(13,11,'insects');
	t.add(14,11,'molluscs');
	t.add(15,11,'crustaceans');		
	t.add(16,11,'others');								
	t.add(17,12,'fish');
	t.add(18,12,'amphibians');
	t.add(19,12,'reptiles');		
	t.add(20,12,'birds');								
	t.add(21,12,'mammals');												
	t.UpdateTree();
}
//$("body").load(CreateTree());
function gerTree(id){
	window.location="index.php?r=sowBoar/pedigree&id="+id+"&p="+id;
}

function parentSow(id){
	if(id != "")
		window.location="index.php?r=sowBoar/update&id="+id;
}
function level1Sow(type){
	if(type == 1){
		window.location="index.php?r=sowBoar/update&id="+$("#level0").val();
	}
	else if(type == 2){
		if($("#sire").val() == "" || $("#sire").val() == 0){
			alert("No Sire Details found");
			return;
		}
		window.location="index.php?r=sowBoar/pedigree&id="+$("#sire").val();
	}
	else if(type == 3){
		if($("#dam").val() == "" || $("#dam").val() == 0) {
			alert("No Dam Details found");
			return;
		}
		window.location="index.php?r=sowBoar/pedigree&id="+$("#dam").val();
	}
}
function levelIncDec(id,type){
	var currId = parseInt($("#currenlevel").val());
	var incId = currId+1;
	var decId = currId-1;
	if((type == 1 && incId == 7) || (type == 2 && decId == 1))
		return;
	if(type == 1)
		window.location="index.php?r=sowBoar/pedigree&id="+id+"&l="+incId;
	else if(type == 2)
		window.location="index.php?r=sowBoar/pedigree&id="+id+"&l="+decId;

}
function setwidth(type) {
	if(type == 1){
		var h = $(window).height();
        var w = $(window).width();
        
        var width;
        if(w > 1340 || width > 140)
        	width = 140;
        else {
        	width = w - 1187;
        	width++;
        }
        $(".hr1").css('width', width);
        console.log(w+'='+width);
	}
}
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
	//var patt = /^(([0-1][0-2])|([0-9]))[\-\.\/][0-9][0-9]*[\-\.\/][0-9][0-9]([0-9][0-9])*$/;
	var patt = /^(([0-1][0-2])|([0]*[0-9]))[\-\.\/][0-9][0-9]*[\-\.\/][0-9][0-9]([0-9][0-9])*$/;
	if(!patt.test(val)){
		alert("Date - Invalid date format");
		$("#born").focus();
		return false;
	}
	return true;
}
function validateForm(){
	return validateDate($("#born").val());
}
function checkeartag(val,id){
	$.ajax({
		url: encodeURI('index.php?r=sowBoar/checkEarTag'),
		type: "GET",
		data: {id:id,tag:val}
	}).done(function(data){
		if(data != 0 && data != $("#earnotch").val()) {
			$("#alertdialog").dialog({
				autoOpen: true,
				width: 400,
				modal: true,
				closeOnEscape: false,
				buttons: [
					{
						text: "Re-associate",
						click: function() {
							$( this ).dialog( "close" );
						}
					},
					{
						text: "New Tag",
						click: function() {
							$("#eartag").val("");
							$( this ).dialog( "close" );
							$("#eartag").focus();
						}
					}
				]
			});
			
		}
		$("#SowBoar_sow_boar_name").focus();
	});
	
	
}