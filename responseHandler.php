<?php $msg = $_POST['msg'];
	  
	  /*$msg = "oeUH8FjGYwHABplcte0L7273UTU9G9u04W/uRgNj26vEfsMUSZqf4GMD7YugO2NRyEF9Z6k41197eJQTRuP3gNvWwxmhTCWRjSJb1LCY32VZbio7EdC1Y4NiQDiU/O3I4JqweNdyloxBp63MWB7izbZWsLeQzTMuXaJQlr6iABvqzxYmp0shaRA3KW21vi8wXjRD2supegQ2GC58IUkeX5iGWWNBG7lB+t4o5nrEheSv+G6/p4mKVOKIt6uBorefJMHlbbFUk5w2+P3HQj26jxR8L7SEzYRGbwegh41wNI8";*/


include("pg-utils.php");

$payload_with_sha = decodePayloadToPg($msg);

$hash = explode("=",explode("|",$payload_with_sha)[6])[1];

$response = explode("|",$payload_with_sha);

$response_string = "";
/* seprating hash from response */
for($i=0;$i<6;$i++){
	$response_string = ($response_string!="")?$response_string."|".$response[$i]:$response[$i];
}

/* created hash for response */
$hash_created = createHash($response_string);

/* Verifying the response */
if($hash_created == $hash){
	$txn_status = explode("=",$response[0])[1];
	$amount = explode("=",$response[1])[1];
	$merchant_transaction_ref = explode("=",$response[2])[1];
	$transaction_date = explode("=",$response[3])[1];
	$payment_gateway_merchant_reference = explode("=",$response[4])[1];
	$payment_gateway_transaction_reference = explode("=",$response[5])[1];
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Payment gateway response</title>
	</head>
	<body>
	<h1>Payment Successful</h1>
			<h3>Transaction status: <?php echo $txn_status; ?></h3><br>
			<h3>Amount: <?php echo $amount; ?></h3><br>
			<h3>Merchant transaction reference: <?php echo $merchant_transaction_ref; ?></h3><br>
			<h3>Transaction date : <?php echo $transaction_date; ?></h3><br>
			<h3>Payment gateway merchant reference : <?php echo $payment_gateway_merchant_reference; ?></h3><br>
			<h3>Payment gateway transaction reference : <?php echo $payment_gateway_transaction_reference; ?></h3>

	</body>
	</html>
<?php }
else{
	echo "Hash verification failed";
}
?>