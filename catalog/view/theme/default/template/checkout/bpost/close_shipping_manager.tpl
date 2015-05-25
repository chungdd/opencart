<html>
	<head>
        <script src="catalog/view/javascript/jquery/jquery-2.1.1.min.js" type="text/javascript"></script>
						
		<script type="text/javascript">
			$(function () {				
				window.parent.closeShippingManager(<?php echo $total_price; ?>, <?php echo $shipping_fee; ?>, <?php echo $order_id; ?>);
				return false; 
				
			});
		</script>		
	</head>		
	<body>
		
	</body>
</html>
