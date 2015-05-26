<html>
    <head>
        <script src="catalog/view/javascript/jquery/jquery-2.1.1.min.js" type="text/javascript"></script>
				
        <script type="text/javascript">
            $(function() {
                $("#dataForm").submit();
    		});
		</script>
	</head>
    	
	<body>
        <?php
            $order_reference = date('YmdHi', time());
            $hash            = hash("sha256", "accountId=".$bpost_account_id."&action=START&customerCountry=BE&orderReference=".$order_reference."&orderWeight=".$weight."&".$bpost_passphrase);
        ?>	
        <form style="display: none" id="dataForm" method="POST" action="https://shippingmanager.bpost.be/ShmFrontEnd/start">
            <input type="submit" value="Confirm button Shipping Manager" />
            <input type="hidden" name="lang" value="EN" />
            <input type="hidden" name="accountId" value="<?php echo $bpost_account_id; ?>" />
            <input type="hidden" name="action" value="START"/>
            <input type="hidden" name="orderReference" value="<?php echo $order_reference; ?>" />
            <input type="hidden" name="orderTotalPrice" value="<?php echo $total_price; ?>" />
            <input type="hidden" name="customerFirstName" value="<?php echo $first_name; ?>"/>
            <input type="hidden" name="customerLastName" value="<?php echo $last_name; ?>" />
            <input type="hidden" id="orderWeight" name="orderWeight" value="<?php echo $weight; ?>" />
            <input type="hidden" id="confirmUrl" name="confirmUrl" value="<?php echo $return_url; ?>" />
            <input type="hidden" id="cancelUrl" name="cancelUrl" value="<?php echo $return_url; ?>" />
            <input type="hidden" name="customerCompany" value="<?php echo $company; ?>" />
            <input type="hidden" name="customerStreet" value="<?php echo $address; ?>" />
            <input type="hidden" name="customerStreetNumber" value="" />
            <input type="hidden" name="customerBox" value="" />
            <input type="hidden" name="customerCity" value="<?php echo $city; ?>" />
            <input type="hidden" name="customerPostalCode" value="" />
            <input type="hidden" name="customerEmail" value="<?php echo $email; ?>" />
            <input type="hidden" name="customerPhoneNumber" value="<?php echo $phone; ?>" />
            <input type="hidden" name="customerCountry" value="BE" />
            <input type="hidden" name="checksum" value="<?php echo $hash;?>" />		
        </form>
	</body>
</html>