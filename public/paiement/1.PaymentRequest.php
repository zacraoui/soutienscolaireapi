<html>

<head>

<title>3D PAY HOSTING</title>

<meta http-equiv="Content-Language" content="tr">


<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-9">


<meta http-equiv="Pragma" content="no-cache">


<meta http-equiv="Expires" content="now">


</head>


<body>

	<?php
	
		$orgClientId  = "600002165";
  		$orgAmount = "10.25";
  		$orgOkUrl =  "http://localhost/cmi/Ok-Fail.php";
  		$orgFailUrl = "http://localhost/cmi/Ok-Fail.php";
  		$shopurl = "http://localhost/cmi";
  		$orgTransactionType = "PreAuth";
  		$orgRnd =  microtime();
  		$orgCallbackUrl = "http://localhost/cmi/callback.php";
  		$orgCurrency = "504";
		
	?>


	<center>

		<form method="post" action="2.SendData.php">
			<table>
				<tr>

					<td align="center" colspan="2"><input type="submit"
						value="Complete Payment" /></td>
				</tr>

			</table>

				<input type="hidden" name="clientid" value="<?php echo $orgClientId ?>"> 
				Montant : <input  name="amount" value="<?php echo $orgAmount ?>"> <br>
				<input type="hidden" name="okUrl" value="<?php echo $orgOkUrl ?>">
				<input type="hidden" name="failUrl" value="<?php echo $orgFailUrl ?>">
				<input type="hidden" name="TranType" value="<?php echo $orgTransactionType ?>">
				<input type="hidden" name="callbackUrl" value="<?php echo $orgCallbackUrl ?>">
				<input type="hidden" name="shopurl" value="<?php echo $shopurl ?>">
				<input type="hidden" name="currency" value="<?php echo $orgCurrency ?>">
				<input type="hidden" name="rnd" value="<?php echo $orgRnd ?>">
				<input type="hidden" name="storetype" value="3D_PAY_HOSTING">
				<input type="hidden" name="hashAlgorithm" value="ver3">
				<input type="hidden" name="lang" value="fr">
				<input type="hidden" name="refreshtime" value="5">
				Nom : <input name="BillToName" value="name"><br>
				<input type="hidden" name="BillToCompany" value="billToCompany">
				Adresse : <input name="BillToStreet1" value="100 rue adress"><br>
				Ville : <input name="BillToCity" value="casablanca"><br>
				<input type="hidden" name="BillToStateProv" value="Maarif Casablanca">
				Code postale : <input name="BillToPostalCode" value="20230"><br>
				<input type="hidden" name="BillToCountry" value="504">
				Email : <input name="email" value="email@domaine.com"><br>
				Tel : <input name="tel" value="0021201020304"><br>
				<input type="hidden" name="encoding" value="UTF-8">
				<input type="hidden" name="oid" value="1234ABC"> <!-- La valeur du paramètre oid doit être unique par transaction -->
				
		</form>

	</center>

</body>

</html>
