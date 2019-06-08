<?php
session_start();
include('config.php');
$sssd = "SELECT * from crypto_payments WHERE  txConfirmed = 1 AND accountbaladd = 0 LIMIT 1" ;
$lgnsd=mysqli_query($conn,$sssd);
$countsd = mysqli_num_rows($lgnsd);
	 if($countsd >= 1) {
		while($ertsd=mysqli_fetch_array($lgnsd))
		{
			$paymentID = $ertsd['paymentID'];			
			$orderID = $ertsd['orderID'];
			$amount = $ertsd['amount'];
			$txid = $ertsd['txID'];			
			$userID = $ertsd['userID'];
			$accountbaladd = $ertsd['accountbaladd'];
if($accountbaladd == 0){

$baonus = "SELECT * FROM users WHERE username = '$userID'" ;
$raun_bonus=mysqli_query($conn,$baonus);
$caountbonus = mysqli_num_rows($raun_bonus);
if($caountbonus >= 1 ){
		while($usrla=mysqli_fetch_array($raun_bonus))
		{
			$asignupbonus = $usrla['balance'];
}}



$amountadd =  $amount * 100000000;
echo "
<center>
<table>
<tr>
<th>Amount To Add : </th>
<th> $amount </th>
</tr>

<tr>
<th>Amount To Add in Satoshis : </th>
<th> $amountadd </th>
</tr>

<tr>
<th>User ID : </th>
<th> $userID </th>
</tr>


<tr>
<th>Tx ID : </th>
<th> <a href='https://blockchain.info/tx/".$txid."' target='_blank'> Blockchain </th>
</tr>



<tr>
<th>Payment ID : </th>
<th> $paymentID </th>
</tr>

<tr>
<th>Order ID</th>
<th>$orderID</th>
</tr>
";	




$todba = "UPDATE users SET balance = balance + $amountadd WHERE username = '".$userID."'" ;
if ($conn->query($todba) === TRUE) {
$to = "UPDATE crypto_payments SET accountbaladd = 1 WHERE paymentID = ".$paymentID;
if ($conn->query($to) === TRUE) {
$bonus = "SELECT * FROM users WHERE username = '$userID'" ;
$run_bonus=mysqli_query($conn,$bonus);
$countbonus = mysqli_num_rows($run_bonus);
if($countbonus >= 1 ){
		while($usrl=mysqli_fetch_array($run_bonus))
		{
			$signupbonus = $usrl['balance'];
echo "
<tr>
<th>Old Balance : </th>
<th>$asignupbonus</th>
</tr>

<tr>
<th>New Updated Bal</th>
<th>$signupbonus Satoshis</th>
</tr>
</table>
</center>
";			
			
		}	

}
}
}}}}else{
echo "No record Remaining";		 
}
?>