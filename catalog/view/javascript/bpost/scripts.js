function loadShippingManager() {
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
    
    var params = '';
    params += '&first_name=' + first_name;
    params += '&last_name=' + last_name;
    params += '&company=' + company;
    params += '&address=' + address;
    params += '&city=' + city;
    params += '&email=' + email;
    params += '&phone=' + phone;
    params += '&total_price=' + get_input_value('total_price', 'name');
    params += '&bpost_account_id=' + get_input_value('bpost_account_id', 'name');
    params += '&bpost_passphrase=' + get_input_value('bpost_passphrase', 'name');
    params += '&weight=' + get_input_value('weight', 'name');
    console.log(get_input_value('weight', 'name'));
    
	$('#shippingManager').find('iframe').attr('src', 'index.php?route=checkout/bpost/load_shipping_manager' + params);
	$('#result').remove();
    
	// open the popup
	$('#shippingManager').dialog({
        width: 835,
        height: 600,
        draggable: false,
        resizable: false,
        close: function( event, ui ) {
            $("input[value='bpost.bpost']").prop('checked', false);
        }
    });
    				
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

function closeShippingManager(total_price, shipping_fee, order_id) {
    if (order_id == 0) {
        $("input[value='bpost.bpost']").prop('checked', false);
    }
    else{
        $.ajax({
            url: 'index.php?route=checkout/bpost/update_ss',
            type: 'post',
            data: {total_price: total_price, shipping_fee: shipping_fee, reference: order_id},

            success: function() {
                $("input[value='bpost.bpost']").parent().append(' - $' + (shipping_fee / 100));
                $("input[value='bpost.bpost']").prop('checked', true);
            },

            error: function() {
                $("input[value='bpost.bpost']").prop('checked', false);
            }
        });
    }
	// close the popup
	$('#shippingManager').dialog('close');
	$('#shippingManager').find('iframe').attr('src', '');
}