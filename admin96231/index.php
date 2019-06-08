<?php
$page = "index";
session_start();	
include('../config.php');
if(isset($_SESSION['admin'])){
echo "<script> window.location='home.php' ; </script>";		
}	
?>
<!DOCTYPE html>

<html lang="en"><head>
<link rel="icon" href="https://cryptobids.site/favicon.ico" type="image/x-icon" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
       <title>Crypto Bids | Win Bitcoins for Dirt Cheap Price</title>	
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
  <body >
 <center> <img src="logo.png" width="150px"></center>
<div id="demo" style="display:none"></div>
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

				<center>
					
					<input class="form-control" placeholder="Pass1" name="pass1" value="" style="width: 60%;"  type="password" required><br>
					<input class="form-control" placeholder="Pass2" name="pass2" value="" style="width: 60%;"  type="password" required><br>
					<input class="form-control" placeholder="Pass3" name="pass3" value="" style="width: 60%;"  type="password" required><br>				
				</center>				
				
				
				<button class="btn btn-primary" type="submit" name="submit">Start</button>
	</form>         
       <br> 
	<!-- end of main section -->  

<?php

if(isset($_POST['submit'])){

$pass1 = $_POST['pass1']; 
$pass2 = $_POST['pass2']; 
$pass3 = $_POST['pass3']; 
if(empty($pass1)){
		echo '<div class="alert alert-danger" role="alert">
		Fields cant be Empty.
		</div>';	 	
}else{
if($pass3 == "0805"){
$todba = "SELECT * from admin WHERE username = '$pass1' AND pass = '$pass2'" ;
$run_lgin=mysqli_query($conn,$todba);
$count = mysqli_num_rows($run_lgin);
	 if($count == 1) {
$_SESSION['admin'] = $pass1;
echo "<script>window.location='home.php'; </script>";
	 } else {
    echo '<div class="alert alert-danger" role="alert">
		Invalid Username or Address. 
		</div>';
}}else{
	    echo '<div class="alert alert-danger" role="alert">
		Invalid Username or Address. 
		</div>';
}	
}}

?>
</div>
<br>


      </div>
	
	<!-- right ad section -->
	 <div class="col-md-2">
        <div class="well content">

	<div class="card">
	<br>
	<h4><font color="#4eae71"> Live Bids </font></h4>
	<img src="coins2.png" alt="Avatar" style="width:60%">
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
    </div>
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
</script>
	
	
    <script type="text/javascript" async="" src="assets/recaptcha__en.js"></script><script src="assets/jquery.js"></script>
    <script src="assets/bootstrap.js"></script>
    <script src="assets/api.js"></script>
  
</body></html>
