<?php
$page = "account";
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
     <title>Crypto Bids | Account</title>
		<script src="assets/jquery.js"></script> 
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
   <center> <img src="logo.png" width="150px"></center>
   
   <div id="demo" style="display:none;"></div>  

	
	
        <div class="col-md-2 ">
<?php include ('menu.php') ; ?>
      </div>
	  
	  
 
 
 
 
      <div class="col-md-8">
        <div class="well content">
          <h5>Logged In as : <b style="font-size:14px"><?php echo $address ; ?></b> </h5>
<br>
<center>
<div class="table-responsive">

		  <table class="table" style="text-align: center; width: 500px;" cellspacing="2" cellpadding="2" border="0">
	  <thead>
	    <tr>
	      <td><b>Balance </b></td>
	      <td><?php echo $balance ?> Satoshis</td>
		</tr>
		<tr>
		<td><b>Email</b></td>
		<td><?php echo $email; ?></td>
		</tr>		
		<tr>
		<td><b>User Name</b></td>
		<td><?php echo $username; ?></td>
		</tr>		
		<tr>
		<td><b>Withdrawal Address</b></td>
		<td><?php echo $address; ?></td>
		</tr>
		
	    </thead>
		<tbody>
		<tr>
		<td colspan="2"><a href="contact.php?sub=Request Edit of Account Details&t=a" class="btn btn-warning">Request Edit</a></td>
		  </tr>
		</tbody>
		</table>
</div>		
</center>

		  

		  <div class="row">
		  
		  
		  <div class="col-md-6">
		<h4>2 Factor Authentication</h4>
		<p><a href="#" class="btn btn-danger" disabled>Disabled</a></p>
		<p style="font-size:9px">Click to Enable </p>
		  </div>

		  <div class="col-md-6">
		<h4>Email Subscription / Notifications</h4>
		<p><a href="#" class="btn btn-success">Enabled</a></p>

		  </div>		  
		  
		  
		  </div>
		  
		   
		  
  <center> 
	<h3>Stats</h3>
<div class="table-responsive">	
	  <table class="table" style="text-align: center; width:100%;" cellspacing="2" cellpadding="2" border="0">
	  <thead>
	    <tr>
	      <td><b>Total Bets </b></td>
	      <td><?php echo $userstat ?> </td>
		</tr>
		
	    </thead>
		</table>
</div>		
	  </center>
    </div>
</div> 
	
	
	
	
	<div class="col-md-2">
       <?php include('menuright.php'); ?>
      </div>
	<?php include('footer.php'); ?>
  
    <script src="assets/bootstrap.js"></script>
    <script src="assets/api.js"></script>
 		
</body></html>