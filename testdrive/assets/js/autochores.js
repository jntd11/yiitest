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

var CLIPBOARD = "";
$(function(){
	/* Menu 1: init by passing an array of entries. */

	$(document).contextmenu({
		delegate: ".hasmenu",
		preventContextMenuForPopup: true,
		preventSelect: true,
		ignoreParentSelect: false,
		taphold: true,
		menu: [
		    {title: "Insert", cmd: "insert", uiIcon: "ui-icon-copy"},
			{title: "Duplicate", cmd: "duplicate", uiIcon: "ui-icon-clipboard"},
			{title: "Set to Disabled", cmd: "disabled", uiIcon: "ui-icon-scissors"},
			],
		// Handle menu selection to implement a fake-clipboard
		select: function(event, ui) {
			var $target = ui.target;
			var a = $(ui.target).parent();
			switch(ui.cmd){
			case "insert":
				CLIPBOARD = $target.text();
				
				var insert = $("#insertrow").html();
				$("#insertrow").remove();
				$("#"+a[0].id).before('<tr class="odd" id="insertrow">'+insert+'</tr>');
				break;
			case "duplicate":
				CLIPBOARD = $target.text();
				var a = $(ui.target).parent();
				var newrowid = a[0].id;
				var insert = $("#insertrow").html();
				$("#insertrow").remove();
				$("#"+a[0].id).after('<tr class="odd" id="insertrow">'+insert+'</tr>');
				$("#AutoChores_description").val($("#"+newrowid+"_desc").html());
				$("#AutoChores_times_occur").val($("#"+newrowid+"_times").html());
				$("#AutoChores_days_between").val($("#"+newrowid+"_days").html());
				$("#AutoChores_generated_by").val($("#"+newrowid+"_generated").html());
				$("#AutoChores_date_asof").val($("#"+newrowid+"_date").html());
				$("#AutoChores_days_after").val($("#"+newrowid+"_days").html());
				$("#AutoChores_farm_herd").val($("#"+newrowid+"_farm").html());
				break;
			case "disabled":
				CLIPBOARD = "";
				$(document).contextmenu("setEntry", "disabled", {title: "Set to Enabled", cmd: "enabled", uiIcon: "ui-icon-scissors"});
				$.ajax({
					url: encodeURI('index.php?r=autoChores/ChangeStatus'),
					type: "GET",
					data: {s:1,id:a[0].id}
				}).done(function(data){
					window.location = 'index.php?r=autoChores/create';
				});
				
				break;
			case "enabled":
				CLIPBOARD = "";
				$(document).contextmenu("setEntry", "enabled", {title: "Set to Disabled", cmd: "disabled", uiIcon: "ui-icon-scissors"})
				$.ajax({
					url: encodeURI('index.php?r=autoChores/changeStatus'),
					type: "GET",
					data: {s:0,id:a[0].id}
				}).done(function(data){
					window.location = 'index.php?r=autoChores/create';
				});
				break;
			}
			//alert("select " + ui.cmd + " on " + $target.text());
			// Optionally return false, to prevent closing the menu now
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
			if($("#"+newrowid+"_disabled").html() == "Disabled") 
				$(document).contextmenu("setEntry", "disabled", {title: "Set to Enabled", cmd: "enabled", uiIcon: "ui-icon-scissors"});
			else
				$(document).contextmenu("setEntry", "enabled", {title: "Set to Disabled", cmd: "disabled", uiIcon: "ui-icon-scissors"});
			// Optionally return false, to prevent opening the menu now
		}
	});

	/* Menu 2: init menu by passing an <ul> element. */

	$("#container").contextmenu({
		delegate: ".hasmenu2",
		menu: "#options",
//        position: {my: "left top", at: "left bottom"},
		position: function(event, ui){
			return {my: "left top", at: "left bottom", of: ui.target};
		},
		preventSelect: true,
		taphold: true,
		show: { effect: "fold", duration: "slow"},
		hide: { effect: "explode", duration: "slow" },
		focus: function(event, ui) {
			var menuId = ui.item.find(">a").attr("href");
			$("#info").text("focus " + menuId);
			console.log("focus", ui.item);
		},
		blur: function(event, ui) {
			$("#info").text("");
			console.log("blur", ui.item);
		},
		beforeOpen: function(event, ui) {
//			$("#container").contextmenu("replaceMenu", "#options2");
//			$("#container").contextmenu("replaceMenu", [{title: "aaa"}, {title: "bbb"}]);
		},
		open: function(event, ui) {
//          alert("open on " + ui.target.text());
		},
		select: function(event, ui) {
			alert("select " + ui.cmd + " on " + ui.target.text());
		}
	});

	/* Open and close an existing menu without programatically. */

	$("#triggerPopup").click(function(){
		// Trigger popup menu on the first target element
		$(document).contextmenu("open", $(".hasmenu:first"), {foo: "bar"});
		setTimeout(function(){
			$(document).contextmenu("close");
		}, 2000);
	});
});