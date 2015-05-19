<html>
	<head>
		<script src="catalog/view/javascript/jquery/jquery-2.1.1.min.js" type="text/javascript"></script>
				
		<script type="text/javascript">
			$(function() {
				// immediately submit the form, containing all the parameters for the Shipping Manager
				$("#dataForm").submit();
			});
		</script>
	</head>		
	<body>
			
		<?php
			
			$accountId = '107413';
			$passphrase = 'DEMO_SHM';
			$orderReference = rand(100,999);
			$returnURL = 'http://localhost/bpost/closeShippingManager.php';
			
		?>	
			
		<form style="display: none" id="dataForm" method="POST" action="https://shippingmanager.bpost.be/ShmFrontEnd/start">
			<input type="submit" value="Confirm button Shipping Manager" />
			<input type="hidden" name="lang" value="EN"/>
			<input type="hidden" name="accountId" value="<?php echo $accountId; ?>"/>
			<input type="hidden" name="action" value="START"/>
			<input type="hidden" name="orderReference" value="<?php echo $orderReference; ?>"/>
			<input type="hidden" name="orderTotalPrice" value="13500"/>
			<input type="hidden" name="customerFirstName" value="John"/>
			<input type="hidden" id="orderWeight" name="orderWeight" value="4500" />
			<input type="hidden" id="confirmUrl" name="confirmUrl" value="<?php echo $returnURL; ?>" />
			<!--<input type="hidden" name="deliveryMethodOverrides" value="bpack BUSINESS|VISIBLE|0" />
			<input type="hidden" name="deliveryMethodOverrides" value="Parcels depot|VISIBLE" />
			<input type="hidden" name="deliveryMethodOverrides" value="Pugo|VISIBLE" />
			<input type="hidden" name="deliveryMethodOverrides" value="Regular|VISIBLE" />
			<input type="hidden" name="deliveryMethodOverrides" value="bpack BUSINESS|VISIBLE" />
			<input type="hidden" name="deliveryMethodOverrides" value="bpack EXPRESS|VISIBLE" />-->
			<input type="hidden" name="customerLastName" value="Doe"/>
			<input type="hidden" name="customerStreet" value="Munt"/>
			<input type="hidden" name="customerStreetNumber" value="1"/>
			<input type="hidden" name="orderLine" value="Some product info|1"/>
			<input type="hidden" name="orderLine" value="Some other product info|2"/>
			<input type="hidden" name="customerBox" value=""/>
			<input type="hidden" name="customerCity" value="Brussel"/>
			<input type="hidden" name="customerPostalCode" value="1000"/>
			<input type="hidden" name="customerEmail" value="john.doe@mail.be"/>
			<input type="hidden" name="customerPhoneNumber" value="0032499123456"/>
			<input type="hidden" name="customerCountry" value="BE"/>
		
		<?php
			$hash = hash("sha256", "accountId=".$accountId."&action=START&customerCountry=BE&orderReference=".$orderReference."&orderWeight=4500&".$passphrase);
			//$hash = hash("sha256", "accountId=".$accountId."&action=START&customerCountry=BE&deliveryMethodOverrides=bpack BUSINESS|VISIBLE|0&orderReference=".$orderReference."&orderWeight=4500&".$passphrase);
			//$hash = hash("sha256", "accountId=".$accountId."&action=START&customerCountry=BE&deliveryMethodOverrides=Parcels depot|VISIBLE&deliveryMethodOverrides=Pugo|VISIBLE&deliveryMethodOverrides=Regular|VISIBLE&deliveryMethodOverrides=bpack BUSINESS|VISIBLE&deliveryMethodOverrides=bpack EXPRESS|VISIBLE&orderReference=".$orderReference."&orderWeight=45000&".$passphrase);
		?>
		
		<input type="hidden" name="checksum" value="<?php echo $hash;?>"/>		
		</form>
		
	</body>
</html>