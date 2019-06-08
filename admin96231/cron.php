<?php
$page = "cron";
session_start();
include('../config.php');
include('allfun.php');
if(!isset($_SESSION['admin'])){
echo "<script> window.location='logout.php' ; </script>";
}	
?>

<!DOCTYPE html>
<html class="gr__salmen_website" lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Crypto Bids | Win</title>
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">	
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="assets/bootstrap.css" rel="stylesheet">
    <link href="assets/style.css" rel="stylesheet">

 <style>
 body { 
        background: url('bg.jpg') no-repeat center center fixed; 
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
		font-family: 'Josefin Sans', sans-serif;
    } 
 </style>
  </head>
 <body data-gr-c-s-loaded="true" >
  <div id="demo" style="display:none;"></div>
   <center> <img src="logo.png" width="150px"></center>


      <div class="col-md-2 ">
<?php include ('menu.php') ; ?>
      </div>

    <div class="col-md-8">
        <div class="well content">
         

<center>
<div class="row">
<div class="col-md-12">
<h3>Adding Balance to Users</h3>

<?php
$ssadmin = "SELECT * from crypto_payments WHERE  txConfirmed = 1 AND accountbaladd = 0 LIMIT 1" ;
$lgnadmin=mysqli_query($conn,$ssadmin);
$countadmin = mysqli_num_rows($lgnadmin);
	 if($countadmin >= 1) {
		while($ertadmin=mysqli_fetch_array($lgnadmin))
		{
			$paymentIDadmin = $ertadmin['paymentID'];			
			$orderIDadmin = $ertadmin['orderID'];
			$amountadmin = $ertadmin['amount'];
			$txidadmin = $ertadmin['txID'];			
			$userIDadmin = $ertadmin['userID'];
			$accountbaladdadmin = $ertadmin['accountbaladd'];
if($accountbaladdadmin == 0){

$baonusadmin = "SELECT * FROM users WHERE username = '$userIDadmin'" ;
$raun_bonusadmin=mysqli_query($conn,$baonusadmin);
$caountbonusadmin = mysqli_num_rows($raun_bonusadmin);
if($caountbonusadmin >= 1 ){
		while($usrlaadmin=mysqli_fetch_array($raun_bonusadmin))
		{
			$asignupbonusadmin = $usrlaadmin['balance'];
}}



$amountaddadmin =  $amountadmin * 100000000;
echo "
<div class='table-responsive'>
<table class='table table-hover'  border='0'>
<tr>
<th>Amount To Add : </th>
<th> $amountadmin </th>
</tr>

<tr>
<th>Amount To Add in Satoshis : </th>
<th> $amountaddadmin </th>
</tr>

<tr>
<th>User ID : </th>
<th> $userIDadmin </th>
</tr>


<tr>
<th>Tx ID : </th>
<th> <a href='https://blockchain.info/tx/".$txidadmin."' target='_blank'> Blockchain </th>
</tr>



<tr>
<th>Payment ID : </th>
<th> $paymentIDadmin </th>
</tr>

<tr>
<th>Order ID</th>
<th>$orderIDadmin</th>
</tr>
";	




$todbaadmin = "UPDATE users SET balance = balance + $amountaddadmin WHERE username = '".$userIDadmin."'" ;
if ($conn->query($todbaadmin) === TRUE) {
$toadmin = "UPDATE crypto_payments SET accountbaladd = 1 WHERE paymentID = ".$paymentIDadmin;
if ($conn->query($toadmin) === TRUE) {
$bonusadmin = "SELECT * FROM users WHERE username = '$userIDadmin'" ;
$run_bonusadmin=mysqli_query($conn,$bonusadmin);
$countbonusadmin = mysqli_num_rows($run_bonusadmin);
if($countbonusadmin >= 1 ){
		while($usrladmin=mysqli_fetch_array($run_bonusadmin))
		{
			$signupbonusadmin = $usrladmin['balance'];
echo "
<tr>
<th>Old Balance : </th>
<th>$asignupbonusadmin</th>
</tr>

<tr>
<th>New Updated Bal</th>
<th>$signupbonusadmin Satoshis</th>
</tr>

";			
			
		}	

}
}
}}}}else{
echo "No record Remaining";		 
}
?>
</table>
</div>
</center>
<br>

<h3>Adding Referrals Incomes</h3>
<div class="table-responsive">
<table class="table table-hover"  border="0">
<tr>
<th>User</th>
<th>Referred By</th>
<th>Status</th>
</tr>
<?php
$onref = "SELECT * from onrefer WHERE status = 1";
$onrefsql = mysqli_query($conn,$onref);
		while($refg=mysqli_fetch_array($onrefsql))
		{
			$sattoaddref = $refg['amount'];
		}

$sdmin = "SELECT * from users WHERE refadd = 0 AND ref IS NOT NULL  LIMIT 1" ;

$ladmin=mysqli_query($conn,$sdmin);
$cotadmin = mysqli_num_rows($ladmin);
	 if($cotadmin >= 1) {
		while($erdmin=mysqli_fetch_array($ladmin))
		{
			$usernamerefa = $erdmin['username'];
			$refrefa = $erdmin['ref'];
			$idrefa = $erdmin['ID'];

echo "
<tr>
<td>$usernamerefa</td>
<td>$refrefa</td>
";			
			
$updaid = "UPDATE users SET  balance = balance + $sattoaddref WHERE username = '$refrefa'";
if ($conn->query($updaid) === TRUE) {
$updatebid = "UPDATE users SET  refadd = 1 WHERE ID = $idrefa ";
if ($conn->query($updatebid) === TRUE) {
echo "<td>Success</td></tr>";
}else{
echo "<td>Error</td></tr>";}	
}else{
echo "Error Updating";	
}				
}}	else{
echo "
<tr>
<td colspan='3'>No records to update</td>
</tr>	
	";
}		

?>

</table>
</div>
</div>
</div>
</div>
</div>

	
		<div class="col-md-2">
		<?php include('menuright.php'); ?>
		</div>	