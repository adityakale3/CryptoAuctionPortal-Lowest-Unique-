<?php
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
$username = $_SESSION['admin'];		
$ss = "SELECT SUM(amount) AS sato FROM crypto_payments WHERE txConfirmed = 1" ;
$lgn=mysqli_query($conn,$ss);
$count = mysqli_num_rows($lgn);
	 if($count >= 1) {
		while($ert=mysqli_fetch_array($lgn))
		{
			$sato = $ert['sato'];			
		}
	 }		
$ssql = "SELECT ID,bidid,username , bidamount AS bid FROM bidgame WHERE bidid = '".$bidid."' GROUP BY bidamount HAVING COUNT(*) = 1 ORDER BY bidamount LIMIT 1 ";
$todbaq = "SELECT * from bidgame WHERE bidid = '".$bidid."'" ;
$run_lginq=mysqli_query($conn,$ssql);
$count1 = mysqli_num_rows($run_lginq);
if($count1 == 1) {
		while($usrlginsq=mysqli_fetch_array($run_lginq))
		{
			$winneriid = $usrlginsq['ID'];			
			$winner = $usrlginsq['username'];
			$bidamo = $usrlginsq['bid'];
			}
}else {
$winner = "No Current Winner";	
$bidamo = "NA";
$winneriid = "1";
}
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
