<?php include("pg-utils.php"); 


// $bank_ifsc_code = "ICIC0000001";
// $bank_account_number = "11111111";
// $amount = "10000.00";
// $merchant_transaction_ref = "txn001";
// $transaction_date = "2014-11-14";
// $payment_gateway_merchant_reference = "merc001";

$bank_ifsc_code = $_POST['bank_ifsc_code'];
$bank_account_number = $_POST['bank_account_number'];
$amount =  $_POST['amount'];
$merchant_transaction_ref = $_POST['merchant_transaction_ref'];
$transaction_date = $_POST['transaction_date'];
$payment_gateway_merchant_reference = $_POST['payment_gateway_merchant_reference'];

//TODO  Validation check for values

$payload_step1 = makeString( $bank_ifsc_code,$bank_account_number,$amount,$merchant_transaction_ref,$transaction_date,$payment_gateway_merchant_reference );


$hash = createHash($payload_step1);

$payload_with_sha = $payload_step1."|hash=".$hash;

$payload_to_pg = createPayloadToPg($payload_with_sha);

//print_r($payload_to_pg);
?>
<html><body><form name="pg_transaction" method="post" action="responseHandler.php">
Please wait
Processing... 
<input type="hidden" name="msg" value="<?php echo $payload_to_pg; ?>">   
<input type="submit" name="SubmitButton" value="Submit" style="visibility: hidden;" /></form>
<script type="text/javascript">
	window.onload = function(){
  document.forms['pg_transaction'].submit()

}
</script>
</body></html>
