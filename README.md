# Payment-Gateway-Client

A payment gateway client collect data , encrypt it and send to server. Get encrypted response from server decrypt the data.
-------------------------------------------------------------------
parameters- 

 1.   bank_ifsc_code
 2.   bank_account_number 
 3.   amount
 4.   merchant_transaction_ref 
 5.   transaction_date: 
 6.   payment_gateway_merchant_reference
 
 ---------------------------------------------------------------------
Encryption Steps - 
 
Step 1 - 
Create a payload of user data like -
 
bank_ifsc_code=ASDF1012202|bank_account_number=6523258962|amount=100000|merchant_transaction_ref=TXN1021|transaction_date=24-06-2017|payment_gateway_merchant_reference=MRCH1025
 
Step 2 -  
Creates SHA1 hash of payload

Step 3 - 
Concatenate SHA1 hash of with payload and encrypt it using open ssl AES-128-CBC algoritham  
	
 
