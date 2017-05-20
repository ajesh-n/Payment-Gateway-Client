<?php

// Given Key 
	define('KEY', 'Q9fbkBF8au24C9wshGRW9ut8ecYpyXye5vhFLtHFdGjRg3a4HxPYRfQaKutZx5N4');	
	  //$key = "Q9fbkBF8au24C9wshGRW9ut8ecYpyXye5vhFLtHFdGjRg3a4HxPYRfQaKutZx5N4";

//Initialization vector	
	define('IV', 'HxPYRfQaKutZx5N4');	
	 // $iv = "HxPYRfQaKutZx5N4"; // Last 16 bit

/* Step 1*/
function makeString( $bank_ifsc_code,$bank_account_number,$amount,$merchant_transaction_ref,$transaction_date,$payment_gateway_merchant_reference ){
	$payload_step1 = "bank_ifsc_code=".$bank_ifsc_code."|bank_account_number=".$bank_account_number."|amount=".$amount."|merchant_transaction_ref=".$merchant_transaction_ref."|transaction_date=".$transaction_date."|payment_gateway_merchant_reference=".$payment_gateway_merchant_reference;
	return $payload_step1;
}


/* To create SHA1 step 2*/
function createHash($payload_step1) {		
		$stringToHash = $payload_step1;
		return sha1($stringToHash);
	}

/* Step 3 Encrypting */
function createPayloadToPg($payload_with_sha){
	return base64_encode(openssl_encrypt($payload_with_sha, 'AES-128-CBC', KEY, OPENSSL_RAW_DATA, IV));
}

/* Decrypting response AES128CBC */
function decodePayloadToPg($msg){
	$payload_to_pg = base64_decode($msg);
	return openssl_decrypt($payload_to_pg, 'AES-128-CBC', KEY, OPENSSL_RAW_DATA, IV);
}

?>