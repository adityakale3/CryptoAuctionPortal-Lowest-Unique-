<?php
if(!isset($_SESSION['username'])){
	echo "<script>window.location='logout.php' ; </script>";	
}

$address = $_SESSION['address'];
$username = $_SESSION['username'];

$todba = "SELECT * from users WHERE btc = '$address' and username = '$username'" ;
$run_lgin=mysqli_query($conn,$todba);
		while($usrlgins=mysqli_fetch_array($run_lgin))
		{
			$balance = $usrlgins['balance'];
			$withbalance = $usrlgins['withbalance'];
			$email = $usrlgins['email'];			
		}

$ea = "SELECT * from onrefer WHERE status = 1" ;
$rea=mysqli_query($conn,$ea);
		while($uea=mysqli_fetch_array($rea))
		{
			$onrefamo = $uea['amount'];
		}		
		
		
$toyu = "SELECT * from bids WHERE status = 'live' " ;
$run_lginyu=mysqli_query($conn,$toyu);
		while($usrl=mysqli_fetch_array($run_lginyu))
		{
			$bidid = $usrl['bidid'];
			$bidvalue = $usrl['bidvalue'];
			$bidamount = $usrl['bidamount'];
			$bidtime = $usrl['bidtime'];
			$endtime = $usrl['endtime'];
		}		
$timesbid = floor($balance / $bidvalue);	
if ($timesbid == 0){
$bal = 'Your balance is Low to bid';	
}else{
$bal = 'You can Bid '.$timesbid.' more times';		
}
	

$ssql = "SELECT bidid,username , bidamount AS bid FROM bidgame WHERE bidid = '".$bidid."' GROUP BY bidamount HAVING COUNT(*) = 1 ORDER BY bidamount LIMIT 1 ";
$todbaq = "SELECT * from bidgame WHERE bidid = '".$bidid."'" ;
$run_lginq=mysqli_query($conn,$ssql);
$count = mysqli_num_rows($run_lginq);
if($count == 1) {
		while($usrlginsq=mysqli_fetch_array($run_lginq))
		{
			$winner = $usrlginsq['username'];
			}
}else {
$winner = "No Current Winner";	
}


if(isset($_GET['valbid'])){
$errorbid = $_GET['valbid'];	
}
if(isset($_GET['a'])){
$a = $_GET['a'];
if($a == 's'){
$msg = '<div class="alert alert-success" role="alert"> Bid Placed successfully </div>';	
}else if ($a == 'e'){
$msg = '<div class="alert alert-waring" role="alert"> Error Placing Bid , Try again after sometime. </div>';	
}else if($a == 'i'){	
$msg = '<div class="alert alert-danger" role="alert"> Bid Amount is Not Valid . It should be between 0.01 to 99.99 , and you bidded on '. $errorbid .'</div>';	
}else if($a == 'lb'){	
$msg = '<div class="alert alert-danger" role="alert"> Cant Place Bid Due to Low balance . Minimum Balance required is '.$bidvalue.' Rs </div>';	
}else
	
if($a == 'ne'){
$msg = '<div class="alert alert-danger" role="alert"> Amount Cant be empty </div>';	
}else if ($a == 'iv'){
$msg = '<div class="alert alert-waring" role="alert"> Invalid amount . Amount has to b between 50,000 to 10,00,00,000 Satoshis </div>';	
}else if($a == 'sa'){	
$msg = '<div class="alert alert-success" role="alert"> Funds are added to your account </div>';	
}else if($a == 'nu'){	
$msg = '<div class="alert alert-warning" role="alert"> Funds are added but might take time to show up . Wait for 1 Hour. </div>';	
}}else{
$msg = "";	
}


$countuserstat = "SELECT * from bidgame WHERE username = '$username' " ;
$userstat=mysqli_query($conn,$countuserstat);
$userstat = mysqli_num_rows($userstat);


		
function getTime($t_time){
	$pt = time() - $t_time;
	if ($pt>=86400)
		$p = date("F j, Y",$t_time);
	elseif ($pt>=3600)
		$p = (floor($pt/3600))." Hours ago";
	elseif ($pt>=60)
		$p = (floor($pt/60))." Minutes ago";
	else
		$p = $pt." Seconds ago";
	return $p;
}	
?>