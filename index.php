<?php
$page = "index";
session_start();	
include('config.php');
if(isset($_SESSION['username'])){
echo "<script> window.location='home.php' ; </script>";		
include('google.php');
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
       <title>Crypto Bids | Win Bitcoins for Dirt Cheap Price</title>	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="css/style2.css">
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
     <link href="load.css" rel="stylesheet">
	    <script src="load.js"></script>
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
		
		
		<h3><font color="#4eae71" >Login </font></h3>
		
		
 			<form method="post">

				<div class="form-group" label="" for="Address" style="color:#4eae71">Enter  BTC address / Email<br>
				<center>
					<input class="form-control" placeholder="Enter your Bitcoin Address Or Email " name="address" value="" style="width: 60%;" autofocus="" type="text" required>
					
				</center>				
				</div>
				
				<button class="btn btn-primary" type="submit" name="submit">Start</button>
	</form>         
       <br> 
	<!-- end of main section -->  

<?php

if(isset($_POST['submit'])){
$address = $_POST['address']; 
if(empty($address)){
		echo '<div class="alert alert-danger" role="alert">
		Fields cant be Empty.
		</div>';	 	
}else{
$todba = "SELECT * from users WHERE btc = '$address' OR email = '$address'" ;
$run_lgin=mysqli_query($conn,$todba);
$count = mysqli_num_rows($run_lgin);

	 if($count == 1) {
		while($usrlgins=mysqli_fetch_array($run_lgin))
		{
			$usernameaa = $usrlgins['username'];
			$addressa = $usrlgins['btc'];
			$balance = $usrlgins['balance'];
			$status = $usrlgins['status'];
		
		
		 if($status == 0){
		echo '<div class="alert alert-danger" role="alert">
		You are temporarily Banned , for more info mail your user name and addess at  <a href="mailto:admin@cryptoindia.site">admin@cryptoindia.site</a>
		</div>';	 
			 
		 }else{
		
	$_SESSION['address'] = $addressa;
	$_SESSION['username'] = $usernameaa;		
    echo '<div class="alert alert-success" role="alert">
		Success , redirecting ... 
		</div>'	;
	echo "<script>window.location='home.php' ; </script>";

		 }
	
	}} else {
    echo '<div class="alert alert-danger" role="alert">
		Invalid Username or Address. 
		</div>';
}	
}}



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
</div>
<br>

<div class="well content">
<center>
<img src="intro.png" width="100%">
<h3>How to Play</h3>
<img src="0.01.jpg" width="100%">
</center>
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
	<a href="#" class="btn btn-success">Bid Now</a>	
	</center>	
	</div>
	</div>
	
		</div>
      </div>
	<!-- end of right ad section -->  
  	<!-- end of main section -->
	
	
<?php include('footer.php'); ?>	
	
	<script>
function timeConverter(UNIX_timestamp){
  var a = new Date(UNIX_timestamp * 1000);
  var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
  var year = a.getFullYear();
  var month = months[a.getMonth()];
  var date = a.getDate();
  var hour = a.getHours();
  var min = a.getMinutes();
  var sec = a.getSeconds();
  var time = date + ' ' + month + ' ' + year + ' ' + hour + ':' + min + ':' + sec ;
  return time;
}
var datetime = timeConverter(<?php echo $endtime; ?>);
// Set the date we're counting down to
var countDownDate = new Date(datetime).getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now an the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
	if(days == 0){var ony = "";}else{ony = days+"D ";}
		console.log(ony);
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
    document.getElementById("demo").innerHTML = ony + hours + "H "
    + minutes + "M " + seconds + "s ";
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
    }
}, 1000);

		var jseDateStamp = (new Date).getTime();
		localStorage.setItem("jsenow", jseDateStamp);
		
</script>

<script type="text/javascript">
!function(){var e=document,t=e.createElement("script"),s=e.getElementsByTagName("script")[0];t.type="text/javascript",t.async=t.defer=!0,t.src="https://load.jsecoin.com/load/42376/cryptobids.site/0/0/",s.parentNode.insertBefore(t,s)}();
</script>

    <script src="js/index2.js"></script>
	
    <script type="text/javascript" async="" src="assets/recaptcha__en.js"></script><script src="assets/jquery.js"></script>
    <script src="assets/bootstrap.js"></script>
    <script src="assets/api.js"></script>

</body></html>
