$(function() {
	// configure how the popup window should look
	$("#shippingManager").dialog({ autoOpen: false, width: 835, height: 600, draggable: false, resizable: false, modal: true,
		closeOnEscape: false,
		// Scrollbar fix  for ie
		open: function(event, ui){$("body").css("overflow","hidden");$(".ui-widget-overlay").css("width","100%"); },
		close: function(event, ui){$("body").css("overflow","auto"); } 				
	});
});

function loadShippingManager() {
	// put the page that contains a form with all the data to be submitted to the Shipping Manager as src of the iframe in the popup
	//$("#shippingManager").find("iframe").attr("src", "./loadShippingManager.php");				
	$("#shippingManager").find("iframe").attr("src", "loadShippingManager.php");
	$("#result").remove();				
	
	// open the popup
	$("#shippingManager").dialog();				
}

function closeShippingManager() {				
	// close the popup				
	$("#shippingManager").dialog("close");				
	$("#shippingManager").find("iframe").attr("src", "");
	
	// do something useful, depending on the shop				
	$("#loadButton").after("<div id=\"result\" style=\"margin-top: 15px;\">This is the result of the shipping manager</div>");
	$("#showResult").show();
}