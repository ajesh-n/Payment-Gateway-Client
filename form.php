<html> 
<head><title>Sample for Payment Gateway</title>
</head> 
<body>
<p><h1>Order Form</h1>
<form method="post" action="requestGenerator.php"> 
<p>bank_ifsc_code: <input type="text" name="bank_ifsc_code" value="ICIC0000001"></p>
<p>bank_account_number: <input type="text" name="bank_account_number" value="11111111"></p>
<p>amount: <input type="text" name="amount" value="10000.00"></p>
<p>merchant_transaction_ref: <input type="text" name="merchant_transaction_ref" value="txn001"></p>
<p>transaction_date: <input type="text" name="transaction_date" value="<?php echo date('Y-m-d'); ?>"></p>
<p>payment_gateway_merchant_reference: <input type="text" name="payment_gateway_merchant_reference" value="merc001"></p>  
<p><input type="submit" name="SubmitButton" value="Submit"/></form></p> 
</body>
</html>