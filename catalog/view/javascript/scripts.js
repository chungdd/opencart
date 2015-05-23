$(function() {
	// configure how the popup window should look
	/*$("#shippingManager").dialog({ autoOpen: false, width: 835, height: 600, draggable: false, resizable: false, modal: true,
		closeOnEscape: false,
		// Scrollbar fix  for ie
		open: function(event, ui){$("body").css("overflow","hidden");$(".ui-widget-overlay").css("width","100%"); },
		close: function(event, ui){$("body").css("overflow","auto"); } 				
	});*/
    //console.log($('input[value="bpost.bpost"]').html());return;
});

function loadShippingManager() {
	// put the page that contains a form with all the data to be submitted to the Shipping Manager as src of the iframe in the popup
	//$("#shippingManager").find("iframe").attr("src", "./loadShippingManager.php");
    var logged = get_input_value('logged', 'name');
    if (logged) {
        var first_name = get_input_value('c_first_name', 'name'),
            last_name = get_input_value('c_last_name', 'name'),
            company = get_input_value('c_company', 'name'),
            address = get_input_value('c_address', 'name'),
            city = get_input_value('c_city', 'name'),
            email = get_input_value('c_email', 'name'),
            phone = get_input_value('c_phone', 'name');
    } else {
        var first_name = get_input_value('input-shipping-firstname'),
            last_name = get_input_value('input-shipping-lastname'),
            company = get_input_value('input-shipping-company'),
            address = get_input_value('input-shipping-address-1'),
            city = get_input_value('input-shipping-city'),
            email = get_input_value('input-payment-email'),
            phone = get_input_value('input-payment-telephone');
    }
    
    var params = '?';
    params += 'first_name=' + first_name;
    params += '&last_name=' + last_name;
    params += '&company=' + company;
    params += '&address=' + address;
    params += '&city=' + city;
    params += '&email=' + email;
    params += '&phone=' + phone;
    params += '&total_price=' + get_input_value('total_price', 'name');
    params += '&bpost_account_id=' + get_input_value('bpost_account_id', 'name');
    params += '&bpost_passphrase=' + get_input_value('bpost_passphrase', 'name');
    //params += '&prods=' + get_input_value('prods', 'name', 'textarea');
    
    
	$('#shippingManager').find('iframe').attr('src', 'loadShippingManager.php' + params);
	$('#result').remove();
    
	// open the popup
	$('#shippingManager').dialog({width: 835, height: 600, draggable: false, resizable: false});
    				
}

function get_input_value(elm, get_by, elm_type) {
    get_by = get_by || 'id';
    elm_type = elm_type || 'input';
    if (get_by != 'id') {
        var obj = elm_type + '[' + get_by + '="' + elm + '"]';
    } else {
        var obj = '#' + elm;
    }
    
    return $(obj).val() ? $(obj).val() : '';
}

function closeShippingManager(total_price, shipping_fee,orderReference) {
    $.ajax({
		url: 'index.php?route=checkout/shipping_method/update_ss',
		type: 'post',
		data: {total_price: total_price, shipping_fee: shipping_fee,reference: orderReference},
		//dataType: 'json',

		success: function() {
            alert('ok');
		},
        
        error: function() {
            alert('error');
        }
	});
	// close the popup
	$('#shippingManager').dialog('close');				
	$('#shippingManager').find('iframe').attr('src', '');
    //console.log($('input[name="orderTotalPrice"]').val() + '<br />');
    //console.log($('input[name="deliveryMethodPriceTotal"]').val());
	
	// do something useful, depending on the shop				
	//$("#loadButton").after("<div id=\"result\" style=\"margin-top: 15px;\">This is the result of the shipping manager</div>");
	//$("#showResult").show();
}