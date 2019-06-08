<?php
$page = "bank";
session_start();
include('config.php');
include('allfun.php');
?>
<!DOCTYPE html>
<html class="gr__salmen_website" lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
       <title>Crypto Bids | Wallet</title>
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">	
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="assets/bootstrap.css" rel="stylesheet">
    <link href="assets/style.css" rel="stylesheet">
	<script src="assets/jquery.js"></script>
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
<center><h3>Here You Can</h3></center>
<div class="row">
<div class="col-md-4">
		<a href="#deposit">
		<div class="card" style="background-color:green; color:#fff"><br>
		        <h5><b>Deposit</b></h5>
		 <br></div>
		 </a>
</div>
<div class="col-md-4">
		<a href="#withdraw">
		<div class="card" style="background-color:red; color:#fff"><br>
		        <h5><b>Withdraw</b></h5>
		 <br></div>
		 </a>
</div>
<div class="col-md-4">
		<a href="#buy">
		<div class="card" style="background-color:orange; color:#fff"><br>
		        <h5><b>View Transactions</b></h5>
		 <br></div>
		 </a>
</div>
</div>

<br><br>
<div id="#deposit">
		<div class="card" style="background-color:green; color:#fff"><br>
		        <h5><b>Deposit</b></h5>
		 <br></div> 
<br>

<div class="row">
<div class="col-md-7">
<div class="col-md-12">
</div>
					<center>
						<form method="post" action="payment.php" target="_blank">							
						<?php echo $msg; ?>
							<h5><strong><p>Enter Amount to Deposit</p></strong></h5>
							<p>Should be between 50,000 to 10,00,00,000 . Do not put decimals or payment will be canceled.</p>
							<p>A small amount will be added before making final payment to verify your payment.</p>
							<input type="number" name="amounttopup" placeholder="Amount to Top Up" min="50000" max="100000000" required value="50000">
							<input type="submit" name="deposit" value="Add Funds" class="btn btn-primary">
						</form>

					</center>
<br>					
</div>
<div class="col-md-5">
<div class="card">
  <img src="coins2.png" alt="Avatar" style="width:50%">
</div>
</div>


</div>
	  <br>
</center>		 
</div>







<br><br>
<div class="well">
<div id="#withdraw">
		<div class="card" style="background-color:red; color:#fff"><br>
<center>		        <h5><b>Withdraw</b></h5></center>
		 <br></div> 
<br>

<div class="row">
<div class="col-md-7">
<center>
<p>Your Withdrawal address is </p>

		<center>
			<input class="form-control" placeholder="Your Withdraw Address" name="address" value="<?php echo $address; ?>" style="width: 318px;" autofocus="" type="text" disabled>
		</center>

</center>
</div>
<?php 
if(isset($_GET['w'])){
$w = $_GET['w'];	
if($w == 's'){
$withmsg = '<div class="alert alert-success" role="alert"> Withdrawal Requested !!! </div>';	
}else if ($w == 'e'){
$withmsg = '<div class="alert alert-waring" role="alert"> Error , Try again after sometime. </div>';	
}else if($w == 'na'){	
$withmsg = '<div class="alert alert-danger" role="alert"> Minimum amount to withdraw is 1000 Satoshi </div>';	
}}else{
$withmsg = "";	
}

?>
<div class="col-md-5">
<br>
<div class="containera">
<br>
<center><form method="post" action="with.php"><button type="submit" name="withdraw" class="btn btn-success">Request Withdrawal</button></form></center>
<br>
</div>
</div>
</div>
<center>
<p>Avaliable balance to Withdraw : <b> <?php echo $withbalance ; ?> Satoshi</b> </p>
<br>
<?php echo $withmsg ; ?>
</center>
 
 
	  <br>

</div>		 
</div>	 
		 
		 
		 
		 
		 
		 

<br><br>
<div class="well">
<div id="#bidcoins">
		<div class="card" style="background-color:pink; color:#000"><br>
<center>		        <h5><b>Your Transactions</b></h5></center>
		 <br></div> 
<br>
<div class="table-responsive">

<table class="table table-hover">
 <thead>
	    <tr>
        <th>No.</th>
        <th>Amount Added</th>
        <th>On</th>
        <th>Status</th>
		<th>View Details</th>
	</tr>
 </thead>
 <tbody>
<?php 	
$ss = "SELECT * from crypto_payments WHERE userID = '$username' " ;
$lgn=mysqli_query($conn,$ss);
$sr = 1;
$count = mysqli_num_rows($lgn);
	 if($count >= 1) {
		while($ert=mysqli_fetch_array($lgn))
		{
			$paymentID = $ert['paymentID'];			
			$orderID = $ert['orderID'];
			$amount = $ert['amount'];
			$txConfirmed = $ert['txConfirmed'];			
			$txID = $ert['txID'];
			$recordCreated = $ert['recordCreated'];
if($txConfirmed == 1 ){$statcon = "Confirmed";}else{$statcon = "Pending";}
echo "
	   <tr>
        <td> ".$sr++ ."</td>
        <td>$amount</td>
        <td>$recordCreated</td>
        <td>$statcon</td>
        <td><button type='button' class='btn btn-info btn-sm' data-toggle='modal' data-target='#myModal".$paymentID." '>View Details</button></td>
      </tr>
";
	 
echo '	 
 <div class="modal fade" id="myModal'.$paymentID.'" role="dialog ">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <p class="modal-title"><b>Invoice No.  : '.$orderID.'  </b></p>
        </div>
        <div class="modal-body">
          <p>Tx ID : <a href="https://blockchain.info/tx/'.$txID.'" target="_blank">'.$txID.'</a></p>
          <p>Amount : '.$amount.' BTC</p>
          <p>Status : '.$statcon.'</p>
		  </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>	
	 
	 ';
	 
	 
	 
	 }}else{
echo "			
		<tr>
		<td colspan='4' style='text-align:center'>No Previous Transactions</td>
		</tr>	
	";		
		}

?>
 </tbody>
</table>
</div>







		  
		  
		</div>  
		  
 	  

    </div>
    </div>
    </div>
	
  <div class="col-md-2"> 
<?php include('menuright.php'); ?>
  </div>
    </div>	
	
	
    <?php include('footer.php'); ?>
    <script type="text/javascript" async="" src="assets/recaptcha__en.js"></script><script src="assets/jquery.js"></script>
    <script src="assets/bootstrap.js"></script>
    <script src="assets/api.js"></script>
  
</body></html>