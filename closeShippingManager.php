<html>	<head>        <script src="catalog/view/javascript/jquery/jquery-2.1.1.min.js" type="text/javascript"></script>								<script type="text/javascript">			$(function() {												//window.opener.document.returnForm.orderReference.value = document.getElementById('response').value;				/*parent.document.returnForm.orderReference.value = document.response.orderReference.value;				parent.document.returnForm.costCenter.value = document.response.costCenter.value;				parent.document.returnForm.orderTotalPrice.value = document.response.orderTotalPrice.value;				parent.document.returnForm.customerFirstName.value = document.response.customerFirstName.value;				parent.document.returnForm.customerLastName.value = document.response.customerLastName.value;				parent.document.returnForm.customerMemberId.value = document.response.customerMemberId.value;parent.document.returnForm.customerStreet.value = document.response.customerStreet.value;				parent.document.returnForm.customerStreetNumber.value = document.response.customerStreetNumber.value;				parent.document.returnForm.customerBox.value = document.response.customerBox.value;				parent.document.returnForm.customerCity.value = document.response.customerCity.value;				parent.document.returnForm.customerPostalCode.value = document.response.customerPostalCode.value;				parent.document.returnForm.customerCountry.value = document.response.customerCountry.value;				parent.document.returnForm.customerEmail.value = document.response.customerEmail.value;				parent.document.returnForm.customerPostalLocation.value = document.response.customerPostalLocation.value;				parent.document.returnForm.customerRcCode.value = document.response.customerRcCode.value;				//parent.document.returnForm.orderLine.value = document.response.orderLine.value;				parent.document.returnForm.orderWeight.value = document.response.orderWeight.value;				//parent.document.returnForm.extra.value = document.response.extra.value;				//parent.document.returnForm.extraSecure.value = document.response.extraSecure.value;				parent.document.returnForm.deliveryMethod.value = document.response.deliveryMethod.value;				parent.document.returnForm.deliveryMethodPriceTotal.value = document.response.deliveryMethodPriceTotal.value;				*/				window.parent.closeShippingManager();				return false; 							});		</script>			</head>			<body>		Closing <br /><br />				<?php			/*			echo '<form name = "response" method=post action="">';				echo '<input type="hidden" name="orderReference" value="'.$_REQUEST['orderReference'].'"/>';				echo '<input type="hidden" name="orderTotalPrice" value="'.$_REQUEST['orderTotalPrice'].'"/>';				echo '<input type="hidden" name="costCenter" value="'.$_REQUEST['costCenter'].'"/>';				echo '<input type="hidden" name="customerFirstName" value="'.$_REQUEST['customerFirstName'].'"/>';				echo '<input type="hidden" name="customerLastName" value="'.$_REQUEST['customerLastName'].'"/>';				echo '<input type="hidden" name="customerMemberId" value="'.$_REQUEST['customerMemberId'].'"/>';				echo '<input type="hidden" name="customerStreet" value="'.$_REQUEST['customerStreet'].'"/>';				echo '<input type="hidden" name="customerStreetNumber" value="'.$_REQUEST['customerStreetNumber'].'"/>';				echo '<input type="hidden" name="customerBox" value="'.$_REQUEST['customerBox'].'"/>';				echo '<input type="hidden" name="customerCity" value="'.$_REQUEST['customerCity'].'"/>';				echo '<input type="hidden" name="customerPostalCode" value="'.$_REQUEST['customerPostalCode'].'"/>';				echo '<input type="hidden" name="customerCountry" value="'.$_REQUEST['customerCountry'].'"/>';				echo '<input type="hidden" name="customerEmail" value="'.$_REQUEST['customerEmail'].'"/>';				echo '<input type="hidden" name="customerPhoneNumber" value="'.$_REQUEST['customerPhoneNumber'].'"/>';				echo '<input type="hidden" name="customerPostalLocation" value="'.$_REQUEST['customerPostalLocation'].'"/>';				echo '<input type="hidden" name="customerRcCode" value="'.$_REQUEST['customerRcCode'].'"/>';				//echo '<input type="hidden" name="orderLine" value="'.$_REQUEST['orderLine'].'"/>';				echo '<input type="hidden" name="orderWeight" value="'.$_REQUEST['orderWeight'].'"/>';				echo '<input type="hidden" name="extra" value="'.$_REQUEST['extra'].'"/>';				echo '<input type="hidden" name="extraSecure" value="'.$_REQUEST['extraSecure'].'"/>';				echo '<input type="hidden" name="deliveryMethod" value="'.$_REQUEST['deliveryMethod'].'"/>';				echo '<input type="hidden" name="deliveryMethodPriceTotal" value="'.$_REQUEST['deliveryMethodPriceTotal'].'"/>';			echo '</form>';								echo 'Chosen delivery method: '.$_REQUEST['deliveryMethod'].'<br><br>';			if ($_REQUEST['deliveryMethod'] == 'Regular'){				$array = array("regularSignature","regularSignaturePlus","regularAutomaticSecondPresentation","regularAdditionalInsuranceInsuranceRange","regularInfoReminderLanguage","regularInfoReminderNotificationType","regularInfoReminderNotificationValue","regularInfoNextDayLanguage","regularInfoNextDayNotificationType","regularInfoNextDayNotificationValue","regularInfoDistributedLanguage","regularInfoDistributedNotificationType","regularInfoDistributedNotificationValue","regularBasicInsurance");			}elseif($_REQUEST['deliveryMethod'] == 'Pugo'){				$array = array("pugoAdditionalInsuranceInsuranceRange", "pugoInfoDistributedLanguage","pugoInfoDistributedNotificationType", "pugoInfoDistributedNotificationValue", "pugoKeepMeInformedViaLanguage","pugoKeepMeInformedViaNotificationType", "pugoKeepMeInformedViaNotificationValue", "pugoKeepMeInformedViaPickupPunt","pugoBasicInsurance");			}elseif($_REQUEST['deliveryMethod'] == 'Parcels depot'){				$array = array("depotSignature","depotAdditionalInsuranceInsuranceRange","depotInfoDistributedLanguage","depotInfoDistributedNotificationType","depotInfoDistributedNotificationValue","depotBasicInsurance");			}elseif($_REQUEST['deliveryMethod'] == 'bpack BUSINESS'){				$array = array("businessAdditionalInsuranceInsuranceRange","businessBasicInsurance");			}elseif($_REQUEST['deliveryMethod'] == 'bpack EXPRESS'){				$array = array("expressAdditionalInsuranceInsuranceRange","expressBasicInsurance");			}			foreach ($array as $field) {				if (isset($_REQUEST[$field])){					if ($_REQUEST[$field] != ""){						echo $field.': '.$_REQUEST[$field].'<br>';					}else{						echo $field.' was selected<br>';					}				}			}*/					?>	</body></html>