<?php
$page = "account";
session_start();
include('config.php');
include('allfun.php');
if(isset($_POST['deposit'])){
$amounttop = $_POST['amounttopup'];	
if(empty($amounttop)){
echo "<script>window.location='bank.php?a=ne' ; </script>";		
}else if($amounttop < 50000 || $amounttop > 10000000){
echo "<script>window.location='bank.php?a=iv' ; </script>";			
}else{
$finalamount = $amounttop;	
$orderidd = $_SESSION['username'].time();
}}else{
echo "<script>window.close(); </script>";				
}
?>		

<!DOCTYPE html>
<html class="gr__salmen_website" lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Crypto Bids | Payment</title>
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">	
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="assets/jquery.js"></script>
    <!-- Bootstrap -->
    <link href="assets/bootstrap.css" rel="stylesheet">
    <link href="assets/style.css" rel="stylesheet">
<script src='cryptobox.min.js' type='text/javascript'></script>
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
	
		
<div class="entry-content">
	<?php include('pay-per-product.php'); ?>						
<div style='width:100%;height:auto;line-height:50px;background-color:#f1f1f1;border-bottom:1px solid #ddd;color:#49abe9;font-size:18px;'></div>
<br><br>
<?php if (!$box->is_paid()) echo "<h2>Pay Now</h2>"; else echo "<br><br>";  ?>
<?php echo $box->display_cryptobox(true, 580, 230); ?>
<br>

<p style='color:#999'><?php echo $message; ?></p>
</div><br><br><br><br><br><br>
<div style='position:absolute;left:0;'><a target="_blank" href="http://validator.w3.org/check?uri=<?php echo "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>"><img src="https://gourl.io/images/w3c.png" alt="Valid HTML 4.01 Transitional"></a></div>
		
		
		
		
		</div> 
	  </div> 
	
	
	
	<div class="col-md-2">
       <?php include('menuright.php'); ?>
      </div>
	<?php include('footer.php'); ?>
  
    <script src="assets/bootstrap.js"></script>
    <script src="assets/api.js"></script>
 		
</body></html>