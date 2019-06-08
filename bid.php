<?php
session_start();
include('config.php');
if(isset($_POST['submit'])){
$username = $_POST['user'];
$fs = $_POST['firstval'];
$sc = $_POST['secondval'];
//echo "First value : ".$fs ."<br> Strelenghth : ".strlen($fs)."<br>";
if(empty($fs)){
//echo "Fs Empty <br>";
$afas = "00" ;	
}else if(strlen((string)$fs) == 1){
//echo "Entered loop <br>";
$afas = "0$fs" ;	
}else{
//echo "No loop <br>";	
$afas = $fs;	
}


if(strlen((string)$sc) == 1){
//echo "Entered loop <br>";
$asas = $sc."0" ;	
}else{
//echo "No loop <br>";	
$asas = $sc;	
}



//echo "fas val : ".$afas."<br>";

$bidamount = $afas.".".$asas;
$bid = $_POST['bid'];
$bidvalue = $_POST['bidval'];

//echo "BidAmount : ".$bidamount."<br>";

$todbaw = "SELECT * from users WHERE username = '$username'" ;
$run_lginw=mysqli_query($conn,$todbaw);
		while($usrlginsw=mysqli_fetch_array($run_lginw))
		{
			$balancew = $usrlginsw['balance'];
		}

$bidbal = floor($balancew / $bidvalue);
if($bidbal >= 1) {



if ($bidamount > 0 && preg_match('/^(?=.*[0-9])\d{0,2}(?:\.\d{0,2})?$/', $bidamount)) {
$todba = "INSERT INTO bidgame (bidid,bidamount, username,vel) VALUES ('$bid', '$bidamount' ,'$username','".time()."') " ;

if ($conn->query($todba) === TRUE) {
	
	
$todb = "update users set balance = balance - $bidvalue where username = '".$username."'";
if ($conn->query($todb) === TRUE) {   
//echo "Success";
echo "<script>window.location= 'bids.php?a=s&valbid=$bidamount' ;</script>";		
}	
} else {
//echo "Insert error bidamount";	
echo "<script>window.location= 'bids.php?a=e&valbid=$bidamount' ;</script>";		
}	
} else {
//echo "Bid amount not proper";	
echo "<script>window.location= 'bids.php?a=i&valbid=$bidamount' ;</script>";		
}
}else{
//echo "Low Balance";	
echo "<script>window.location= 'bids.php?a=lb' ;</script>";
}
}
?>

 