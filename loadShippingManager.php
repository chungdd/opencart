<html>
    <head>
        <script src="catalog/view/javascript/jquery/jquery-2.1.1.min.js" type="text/javascript"></script>
				
        <script type="text/javascript">
            $(function() {
                // immediately submit the form, containing all the parameters for the Shipping Manager
                passInputValue('customerFirstName', 'first_name');
                passInputValue('customerLastName', 'last_name');
                passInputValue('customerCompany', 'company');
                passInputValue('customerStreet', 'address');
                passInputValue('customerCity', 'city');
                passInputValue('customerEmail', 'email');
                passInputValue('customerPhoneNumber', 'phone');
                passInputValue('orderTotalPrice', 'total_price');
                
                //var a = getUrlParameter('prods');
                //var b = $.parseJSON((a.toString()));
                //console.log(b);return;
                
                $("#dataForm").submit();
    		});
            
            function passInputValue(elm_name, param_name) {
                $('input[name="' + elm_name + '"]').val(getUrlParameter(param_name));
            }
            
            function getUrlParameter(sParam) {
                var sPageURL = window.location.search.substring(1),
                    sURLVariables = sPageURL.split('&');
                for (var i = 0; i < sURLVariables.length; i++) {
                    var sParameterName = sURLVariables[i].split('=');
                    if (sParameterName[0] == sParam) {
                        var result = sParameterName[1].replace(/%20/g, ' ').replace(/%22/g, '\'');
                        return result;
                    }
                }
            }      
		</script>
	</head>
    	
	<body>
        <?php
        	$accountId      = '107413';
        	$passphrase     = 'DEMO_SHM';
        	$orderReference = date('YmdHi', time());
        	$returnURL      = 'http://localhost/opencart/closeShippingManager.php';
        	//$returnURL = 'http://localhost/opencart/index.php?route=checkout/checkout';
        ?>	
			
        <form style="display: none" id="dataForm" method="POST" action="https://shippingmanager.bpost.be/ShmFrontEnd/start">
            <input type="submit" value="Confirm button Shipping Manager" />
            <input type="hidden" name="lang" value="EN"/>
            <input type="hidden" name="accountId" value="<?php echo $accountId; ?>"/>
            <input type="hidden" name="action" value="START"/>
            <input type="hidden" name="orderReference" value="<?php echo $orderReference; ?>"/>
            <input type="hidden" name="orderTotalPrice" value=""/>
            <input type="hidden" name="customerFirstName" value=""/>
            <input type="hidden" id="orderWeight" name="orderWeight" value="4500" />
            <input type="hidden" id="confirmUrl" name="confirmUrl" value="<?php echo $returnURL; ?>" />
            <input type="hidden" id="cancelUrl" name="cancelUrl" value="<?php echo $returnURL; ?>" />
            <!--<input type="hidden" name="deliveryMethodOverrides" value="bpack BUSINESS|VISIBLE|0" />
            <input type="hidden" name="deliveryMethodOverrides" value="Parcels depot|VISIBLE" />
            <input type="hidden" name="deliveryMethodOverrides" value="Pugo|VISIBLE" />
            <input type="hidden" name="deliveryMethodOverrides" value="Regular|VISIBLE" />
            <input type="hidden" name="deliveryMethodOverrides" value="bpack BUSINESS|VISIBLE" />
            <input type="hidden" name="deliveryMethodOverrides" value="bpack EXPRESS|VISIBLE" />-->
            <input type="hidden" name="customerLastName" value=""/>
            <input type="hidden" name="customerCompany" value=""/>
            <input type="hidden" name="customerStreet" value=""/>
            <input type="hidden" name="customerStreetNumber" value=""/>
            <input type="hidden" name="orderLine" value="Some product info|1"/>
            <input type="hidden" name="orderLine" value="Some other product info|2"/>
            <input type="hidden" name="customerBox" value=""/>
            <input type="hidden" name="customerCity" value=""/>
            <input type="hidden" name="customerPostalCode" value=""/>
            <input type="hidden" name="customerEmail" value=""/>
            <input type="hidden" name="customerPhoneNumber" value=""/>
            <input type="hidden" name="customerCountry" value="BE"/>
		
		<?php
			$hash = hash("sha256", "accountId=".$accountId."&action=START&customerCountry=BE&orderReference=".$orderReference."&orderWeight=4500&".$passphrase);
		?>
		
            <input type="hidden" name="checksum" value="<?php echo $hash;?>"/>		
        </form>
	</body>
</html>