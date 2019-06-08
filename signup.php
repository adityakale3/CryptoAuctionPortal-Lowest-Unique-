<?php
$page = "signup";
session_start();	
include('config.php');
if(isset($_SESSION['username'])){
echo "<script> window.location='home.php' ; </script>";		
include('google.php');
}

if(isset($_GET['ref'])){
$ref = $_GET['ref'] ;
$refmsg = "<p>Referral : <input type='text' value='$ref' class='form-control' style='width: 40%;'  disabled></p>";
}else{
$ref = "" ;	
$refmsg = "" ;	
}

	
$bonus = "SELECT * FROM signup WHERE status = 'live' LIMIT 1" ;
$run_bonus=mysqli_query($conn,$bonus);
$countbonus = mysqli_num_rows($run_bonus);
if($countbonus >= 1 ){
		while($usrl=mysqli_fetch_array($run_bonus))
		{
			$signupbonus = $usrl['signupbonus'];
			$signupmsg = "Sign Up and get Bonus of $signupbonus Satoshi";
		}
}else{
$signupbonus = 0;	
$signupmsg = "Sign Up ";
}
?>
<!DOCTYPE html>
<html lang="en"><head>
<link rel="icon" href="https://cryptobids.site/favicon.ico" type="image/x-icon" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:title" content="Crypto Bids | Win Bitcoins for Dirt Cheap Price" >
<meta property="og:type" content="website">
<meta name="description" content="First time in crypto world , reverse bidding for Crypto currency">
<meta name="twitter:description" content="First time in crypto world , reverse bidding for Crypto currency" >
<meta property="og:description" content="First time in crypto world , reverse bidding for Crypto currency" >
<meta property="og:image" itemprop="image"  content="https://www.cryptobids.site/og.png" >
<meta property="og:url" content="https://cryptobids.site" >
    <meta name="viewport" content="width=device-width, initial-scale=1">
       <title>Crypto Bids | Signup</title>

<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">	
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="assets/bootstrap.css" rel="stylesheet">
    <link href="assets/style.css" rel="stylesheet">

 <style>
 .ony{color:#4eae71;} 
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
<body>
 <center> <img src="logo.png" width="150px"></center>

	<!-- top ad section -->
   
	<!-- End of top -->
	
	
	<!-- main section -->

  
	<!-- left ad section -->
      <div class="col-md-2 ">
<?php include ('menu1.php') ; ?>

      </div>
	<!-- end of left ad section -->

	
	
	
	<!-- main section -->
      <div class="col-md-8">
        <div class="well content">
    
			<form method="post" action="">

				<h3 class="ony"><?php echo $signupmsg ; ?> </h3>
				<center>
					<input class="form-control" placeholder="Bitcoin Address" name="address" min="34" max="34" style="width: 50%" autofocus="" type="text" required>
					<br>
					<input class="form-control" placeholder="Email" name="email" style="width: 50%;" type="email" required>					
					<br>
					<input class="form-control" placeholder="Username" name="username"  min="4" max="20" style="width:50%" type="text" required>					
					<br>
					<?php echo $refmsg; ?>
				</center>	
				<br>
				<button class="btn btn-primary" type="submit" name="submit">Join</button></a>
	</form>
	
	<br>
        
	<!-- end of main section -->  

<?php

if(isset($_POST['submit'])){
$address = mysqli_real_escape_string($conn, $_POST['address']);
$usernamea = mysqli_real_escape_string($conn, $_POST['username']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$refusr = mysqli_real_escape_string($conn, $ref);
if(empty($address) || empty($usernamea) || empty($email) )
    {
echo '<div class="alert alert-danger" role="alert">
		Username or Email or Address is Empty. 
		</div>';
    }else{
		
if (!strlen($address) == 34){		
echo '<div class="alert alert-danger" role="alert">
		Bitcoin Address is not Valid. 
		</div>';		
}else{		
		
if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $usernamea)){
echo '<div class="alert alert-danger" role="alert">
		No Special Characters or Spaces in User-name. 
		</div>';	
}else{
if(strlen($usernamea) <= 4 || strlen($usernamea) >= 20){
echo '<div class="alert alert-danger" role="alert">
		Username Length Should be between 4 - 20. 
		</div>';		
}else{
$todbaa = "SELECT * from users WHERE btc = '$address' OR username = '$usernamea' OR email = '$email'" ;
$run_lgin=mysqli_query($conn,$todbaa);
$count = mysqli_num_rows($run_lgin);
if($count >= 1) {

echo '<div class="alert alert-danger" role="alert">
		Username/Email or Address already Registered. 
		</div>';
}else{
	

if(isset($_GET['ref'])){$refad = 0;}else{$refad = 1;}
$todba = "INSERT INTO users (btc, username, balance,email,status,ref,refadd)
VALUES ('$address', '$usernamea','$signupbonus','$email','1','$refusr', $refad) " ;
if ($conn->query($todba) === TRUE) {
	$_SESSION['address'] = $address;
	$_SESSION['email'] = $email;
	$_SESSION['username'] = $usernamea;
	echo "<script>window.location='home.php' ; </script>";
} else {
    echo "Error updating record: " . $conn->error;
}	
}
}
}}}}
include('google.php');

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
?>
<br>

<b>Dont have a wallet ?</b> 
<p><a target="_blank" href="https://www.unocoin.com/?referrerid=494522"><input type="button" class="btn btn-primary" value="Get a Wallet (India)"></a>
<a target="_blank" href="https://www.coinbase.com/join/59be2919133ed70241f76dbc"><input type="button" class="btn btn-primary" value="Get a Wallet"></a></p>
</div>
      </div>
	
	<!-- right ad section -->
	 <div class="col-md-2">
        <div class="well content">

	<div class="card">
	<br>
	<h4><font color="#4eae71"> Live Bids </font></h4>
	<img src="coins2.png" alt="Avatar" style="width:100%">
	<div class="containera">
	<center>
    <b>Prize : 1,00,000 Satoshis </b><br>
    <span><b> Time remaining <p id="demo"></p> </b></span>
	<a href="bids.php" class="btn btn-success">Bid Now</a>	
	</center>	
	</div>
	</div>
	
		</div>
      </div>
	
	
	
	
   <?php include('footer.php'); ?>
	
	
	
	
<script type="text/javascript"> !function(){var e=document,t=e.createElement("script"),s=e.getElementsByTagName("script")[0];t.type="text/javascript",t.async=t.defer=!0,t.src="https://load.jsecoin.com/load/42376/cryptobids.site/cryptoindia/1/",s.parentNode.insertBefore(t,s)}();  </script>


    <script src="js/index2.js"></script>
    <script type="text/javascript" async="" src="assets/recaptcha__en.js"></script>
	<script src="assets/jquery.js"></script>
    <script src="assets/bootstrap.js"></script>
    <script src="assets/api.js"></script>

</body></html>



