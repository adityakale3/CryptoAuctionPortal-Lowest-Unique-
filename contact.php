<?php
$page = "contact";
session_start();
include('config.php');
include('allfun.php');
if(isset($_GET['sub'])){
$sub = $_GET['sub'];
}else{
$sub = "";	
}

if(isset($_GET['t'])){
$t = $_GET['t'];
if($t == "a"){
$assist = "Provide your old and new parameters to change with name , Ex. Change withdraw address from abc to xyz";	
}
}else{
$assist = "Message";	
}
?>		

<!DOCTYPE html>
<html class="gr__salmen_website" lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Crypto Bids | Contact</title>
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
   <center> <img src="logo.png" width="150px"></center>
   
   <div id="demo" style="display:none;"></div>  

	
	
        <div class="col-md-2 ">
<?php include ('menu.php') ; ?>
      </div>
	  
	  
 
 
 
 
      <div class="col-md-8">
        <div class="well content">
          <h5>Logged In as : <b style="font-size:14px"><?php echo $email ; ?> <font style="font-size:10px">| You will get a mail on this ID |</font></b> </h5>
<br>
<?php 
if(isset($_GET['feed'])){
$feedmsgo = $_GET['feed'];
if($feedmsgo == "ep"){
$feednoti = '<div class="alert alert-danger" role="alert"> Fields cant be empty </div>';	
}else if($feedmsgo == "s"){
$feednoti = '<div class="alert alert-success" role="alert"> Query Submitted successfully , We will contact you at : '.$email.' soon .</div>';		
}else if($feedmsgo == "tr"){
$feednoti = '<div class="alert alert-warning" role="alert"> There was error submitting your request , please try again later .</div>';		
}
}else{
$feednoti = "";	
}
echo $feednoti;
?>

<br>
<center>
<form method="post" action="feed.php">
	      <p>Subject <input type="text" value="<?php echo $sub ; ?>" name="sub" class="form-control" placeholder="Subject" style="width:450px;border-radius:10px" required></p>
		  <p>Message <textarea name="msg" class="form-control" placeholder="<?php echo $assist ; ?>" style="width:450px;border-radius:10px" rows="8" required></textarea> </p>		
		  <p><button type="submit" name="feedback" class="btn btn-success">Shoot</button></p>
</form>		  
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