<?php
/**
 * @category    Example1 - Pay-Per-Product (single crypto currency in payment box)
 * @package     GoUrl Cryptocurrency Payment API 
 * copyright 	(c) 2014-2017 Delta Consultants
 * @crypto      Supported Cryptocoins -	Bitcoin, BitcoinCash, Litecoin, Dash, Dogecoin, Speedcoin, Reddcoin, Potcoin, Feathercoin, Vertcoin, Peercoin, MonetaryUnit
 * @website     https://gourl.io/bitcoin-payment-gateway-api.html#p1
 * @live_demo   https://gourl.io/lib/examples/pay-per-product.php
 */ 
	
	require_once( "cryptobox.class.php" );

	
	/**** CONFIGURATION VARIABLES ****/ 
	
	$userID 		= $username;				// place your registered userID or md5(userID) here (user1, user7, uo43DC, etc).
										// you don't need to use userID for unregistered website visitors
										// if userID is empty, system will autogenerate userID and save in cookies
	$userFormat		= "COOKIE";			// save userID in cookies (or you can use IPADDRESS, SESSION)
	$orderID 		= $orderidd;	// invoice number - 000383
	$amountUSD		= 0;				// invoice amount - 2.21 USD
	$period			= "NOEXPIRY";		// one time payment, not expiry
	$def_language	= "en";				// default Payment Box Language
	$public_key		= "19753AAKvQvqBitcoin77BTCPUBqdmqqacsmEtgruMc6Xx3BQL"; // from gourl.io
	$private_key	= "19753AAKvQvqBitcoin77BTCPRVAv5aYzj6M8hDYX6jlI9nXnk";// from gourl.io

	// IMPORTANT: Please read description of options here - https://gourl.io/api-php.html#options  
	
	// *** For convert Euro/GBP/etc. to USD/Bitcoin, use function convert_currency_live() with Google Finance
	// *** examples: convert_currency_live("EUR", "BTC", 22.37) - convert 22.37 Euro to Bitcoin
	// *** convert_currency_live("EUR", "USD", 22.37) - convert 22.37 Euro to USD

	/********************************/


	
	$sat = $finalamount / 100000000;
	
	
	/** PAYMENT BOX **/
	$options = array(
			"public_key"  => $public_key, 	// your public key from gourl.io
			"private_key" => $private_key, 	// your private key from gourl.io
			"webdev_key"  => "", 		// optional, gourl affiliate key
			"orderID"     => $orderID, 		// order id or product name
			"userID"      => $userID, 		// unique identifier for every user
			"userFormat"  => $userFormat, 	// save userID in COOKIE, IPADDRESS or SESSION
			"amount"   	  => $sat,				// product price in coins OR in USD below
			"amountUSD"   => $amountUSD,	// we use product price in USD
			"period"      => $period, 		// payment valid period
			"language"	  => $def_language  // text on EN - english, FR - french, etc
	);

	// Initialise Payment Class
	$box = new Cryptobox ($options);
	
	// coin name
	$coinName = $box->coin_name(); 
	
	// Successful Cryptocoin Payment received
	if ($box->is_paid()) 
	{
		if (!$box->is_confirmed()) {
			$message =  "Thank you for order (order #".$orderID.", payment #".$box->payment_id()."). Awaiting transaction/payment confirmation";
		}											
		else 
		{ // payment confirmed (6+ confirmations)

			// one time action
			if (!$box->is_processed())
			{
				// One time action after payment has been made/confirmed
				// !!For update db records, please use function cryptobox_new_payment()!!
				 
				$message = "Thank you for order (order #".$orderID.", payment #".$box->payment_id()."). Payment Confirmed. <br>"; 
				
				// Set Payment Status to Processed
				$box->set_status_processed();  
			}
			else $message = "Thank you for order (order #".$orderID.", payment #".$box->payment_id()."). Payment Confirmed. <br>"; // General message
		}
	}
	else $message = "Status : This invoice has not been paid yet";
	
	
	// Optional - Language selection list for payment box (html code)
	$languages_list = display_language_box($def_language);





	// ...
	// Also you need to use IPN function cryptobox_new_payment($paymentID = 0, $payment_details = array(), $box_status = "") 
	// for send confirmation email, update database, update user membership, etc.
	// You need to modify file - cryptobox.newpayment.php, read more - https://gourl.io/api-php.html#ipn
	// ...
		
	
	
?>


