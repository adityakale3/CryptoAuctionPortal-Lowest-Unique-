<?php
require_once( "cryptobox.class.php" );
require_once( "cryptobox.class.php" );




$userID 		= "adik9623";				// place your registered userID or md5(userID) here (user1, user7, uo43DC, etc).
										// you don't need to use userID for unregistered website visitors
										// if userID is empty, system will autogenerate userID and save in cookies
	$userFormat		= "COOKIE";			// save userID in cookies (or you can use IPADDRESS, SESSION)
	$orderID 		= "invoiceaa231";	// invoice number - 000383
	$amountUSD		= 7;				// invoice amount - 2.21 USD
	$period			= "NOEXPIRY";		// one time payment, not expiry
	$def_language	= "en";				// default Payment Box Language
	$public_key		= "19753AAKvQvqBitcoin77BTCPUBqdmqqacsmEtgruMc6Xx3BQL"; // from gourl.io
	$private_key	= "19753AAKvQvqBitcoin77BTCPRVAv5aYzj6M8hDYX6jlI9nXnk";// from gourl.io
	
	$options = array(
			"public_key"  => $public_key, 	// your public key from gourl.io
			"private_key" => $private_key, 	// your private key from gourl.io
			"webdev_key"  => "", 		// optional, gourl affiliate key
			"orderID"     => $orderID, 		// order id or product name
			"userID"      => $userID, 		// unique identifier for every user
			"userFormat"  => $userFormat, 	// save userID in COOKIE, IPADDRESS or SESSION
			"amount"   	  => 0,				// product price in coins OR in USD below
			"amountUSD"   => $amountUSD,	// we use product price in USD
			"period"      => $period, 		// payment valid period
			"language"	  => $def_language  // text on EN - english, FR - french, etc
	);

	// Initialise Payment Class
	$box = new Cryptobox ($options);
	
	// coin name
	$coinName = $box->coin_name(); 
	
	// Successful Cryptocoin Payment received


	$adik = payment_history("","",$userID,"","","");
//	echo '<pre>'; print_r($adik[0]); echo '</pre>';

$status = $adik[0]->txConfirmed;

if($status == 1){$t = "Completed";}else{$t = "Pending";}
echo 	"<center><h3>";
echo 	"Amount : ".$adik[0]->amount;
echo 	"<br>Invoice : ".$adik[0]->orderID;
echo 	"<br> User Id : ".$adik[0]->userID;
echo 	"<br> Trx Status : ".$t;
echo 	"<br> Country : ".$adik[0]->countryID;
echo 	"</center></h3>";
?>