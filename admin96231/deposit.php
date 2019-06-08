<?php
$page = "deposit";
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
    <title>Crypto Bids | Game</title>
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
<center>
<?php echo "1FisJgHG737T7NEMo4f6G5oni8aU3TfD3t" ; ?>
<div class="table-responsive">
<table class="table table-hover"  border="0">
 <thead>
	    <tr>
			<th>Sr. No.</th>
			<th>Username</th>	
			<th>Order ID</th>	
			<th>Country | Amount | Coin</th>
			<th>Date</th>
			<th>Status</th>
			<th>Tx ID</th>
			<th>Unrecog ?</th>			
			<th>Add to U</th>			
		</tr>
 </thead>
 <tbody>
<?php
$sra = 1;
$windb = "SELECT * from crypto_payments ORDER by recordCreated" ;
$rlgin=mysqli_query($conn,$windb);
$countwonq = mysqli_num_rows($rlgin);
if($countwonq >= 1) {
		while($us=mysqli_fetch_array($rlgin))
		{
			$userID = $us['userID'];			
			$orderID = $us['orderID'];
			$countryID = $us['countryID'];
			$coinLabel = $us['coinLabel'];
			$amount = $us['amount'];
			$txID = $us['txID'];
			$recordCreated = $us['recordCreated'];
			$txConfirmed = $us['txConfirmed'];
			$unrecognised = $us['unrecognised'];
			$accountbaladd = $us['accountbaladd'];
			if($txConfirmed == 1){$txst = "Con";}else{$txst = "Pen";}
			if($unrecognised == 1){$unre = "Un Reco";}else{$unre = "Reco";}
			if($accountbaladd == 1){$amur = "Yes";}else{$amur = "No";}			
echo "
		<tr>
			<td> ".$sra++." </td>
			<td>$userID</td>
			<td>$orderID</td>	
			<td>$countryID | $amount $coinLabel</td>
			<td>$recordCreated</td>
			<td>$txst</td>
			<td><a href='https://blockchain.info/tx/".$txID."' target='_blank'>View</a></td>
			<td>$unre</td>
			<td>$amur</td>		
		</tr>
";
}
}else{
echo "<tr> <td colspan='9'> No Payments  Yet </td> </tr>";		
}
?>
		
 </tbody>
</table>
</div>
</center>
</div>
</div>
</center>
</div>  
</div>
	
	
		<div class="col-md-2">
		<?php include('menuright.php'); ?>
		</div>	
	

	
	
    <?php include('footer.php'); ?>
    <script type="text/javascript" async="" src="assets/recaptcha__en.js"></script><script src="assets/jquery.js"></script>
    <script src="assets/bootstrap.js"></script>
    <script src="assets/api.js"></script>
  
</body></html>