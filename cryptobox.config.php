<?php
/**
 *  ... Please MODIFY this file ... 
 *
 *
 *  YOUR MYSQL DATABASE DETAILS
 *
 */

 $u = "root1";//"schozovd_cryptobids";
 $p = "BHATALI@34a";
 $db = "test";//"schozovd_cryptobids";


 
 define("DB_HOST", 	"localhost");				// hostname
 define("DB_USER", 	$u);					// database username
 define("DB_PASSWORD", $p);			// database password
 define("DB_NAME", 	$db);					// database name





/**
 *  ARRAY OF ALL YOUR CRYPTOBOX PRIVATE KEYS
 *  Place values from your gourl.io signup page
 *  array("your_privatekey_for_box1", "your_privatekey_for_box2 (otional), etc...");
 */
 
 $cryptobox_private_keys = array("19753AAKvQvqBitcoin77BTCPRVAv5aYzj6M8hDYX6jlI9nXnk");




 define("CRYPTOBOX_PRIVATE_KEYS", implode("^", $cryptobox_private_keys));
 unset($cryptobox_private_keys); 

?>