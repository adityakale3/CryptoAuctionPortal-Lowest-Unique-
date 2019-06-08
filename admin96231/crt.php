<?php
$page = "bank";
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

<h3>Create New Game</h3>

<form method="post">
<input type="text" name="bidid" style="width:40%"  placeholder="BID ID" class="form-control" required>
<input type="text" name="bidamount"  style="width:40%" placeholder="BID WIN PRIZE"  class="form-control" required>
<input type="text" name="status" style="width:40%"  placeholder="BID STATUS" class="form-control" required>
<input type="text" name="bidvalue"  style="width:40%" placeholder="BID Value deducted" class="form-control" required>
<input type="text" name="endtime" style="width:40%"  placeholder="end Time in unix" class="form-control" required>

<br><a href="https://www.unixtimestamp.com/" target="_blank"><input type="button" class="btn btn-warning" value="Get unix time"></a><br>
<br>
<input type="submit" value="Create New Bid" name="submit" class="btn btn-success">
</form>


<?php

if(isset($_POST['submit'])){
$bididn = mysqli_real_escape_string($conn, $_POST['bidid']);
$bidamountn = mysqli_real_escape_string($conn, $_POST['bidamount']);
$statusn = mysqli_real_escape_string($conn, $_POST['status']);
$bidvaluen = mysqli_real_escape_string($conn, $_POST['bidvalue']);
$endtimen = mysqli_real_escape_string($conn, $_POST['endtime']);
$bidtimen = time();
	
$todba = "INSERT INTO bids (bidid, bidamount, bidtime,status,bidvalue,endtime)
VALUES ('$bididn', '$bidamountn','$bidtimen','$statusn','$bidvaluen','$endtimen') " ;
if ($conn->query($todba) === TRUE) {
	echo "<script>window.location='list.php?a=ss' ; </script>";
} else {
	echo "<script>window.location='list.php?a=ee' ; </script>";
}	
}
?>


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