<?php
$page = "ref";
session_start();
include('../config.php');
include('allfun.php');
if(!isset($_SESSION['admin'])){
echo "<script> window.location='logout.php' ; </script>";		
}	
if(isset($_GET['iid'])){
$iid = $_GET['iid'];
}else{
echo "<script> window.location='ref.php' ; </script>";		
}	
?>		

<!DOCTYPE html>
<html class="gr__salmen_website" lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Crypto Bids | Edit User</title>
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
<form method="post">
<div class="table-responsive">
<table class="table table-hover"  border="0">
 <thead>
	    <tr>
			<th>Username</th>			
			<th>Email</th>	
			<th>BTC Address</th>
			<th>Balance</th>
			<th>Status</th>
			<th>Withdraw Balance</th>
			<th>Refered By</th>		
			<th>Ref Amo + @Ref</th>			
		</tr>
 </thead>
 <tbody>
<?php

$windb = "SELECT * from users WHERE ID = $iid" ;
$rlgin=mysqli_query($conn,$windb);
$countwonq = mysqli_num_rows($rlgin);
if($countwonq >= 1) {
		while($us=mysqli_fetch_array($rlgin))
		{
			$usernameedit = $us['username'];			
			$emailedit = $us['email'];
			$btcedit = $us['btc'];
			$balanceedit = $us['balance'];
			$statusedit = $us['status'];
			$withbalanceedit = $us['withbalance'];
			$refedit = $us['ref'];
			$refaddedit = $us['refadd'];			
}
}
?>
		<tr>
			<td><input type="text" name="username" class="form-control" value="<?php echo $usernameedit ; ?>"></td>			
			<td><input type="text" name="email"  class="form-control" value="<?php echo $emailedit ; ?>"></td>
			<td><input type="text" name="btc"  class="form-control" value="<?php echo $btcedit ; ?>"></td>
			<td><input type="text" name="balance"  class="form-control" value="<?php echo $balanceedit ; ?>"></td>
			<td><input type="text" name="status"  class="form-control" value="<?php echo $statusedit ; ?>"></td>
			<td><input type="text" name="withbal"  class="form-control" value="<?php echo $withbalanceedit ; ?>"></td>
			<td><input type="text" name="ref"  class="form-control" value="<?php echo $refedit ; ?>"></td>	
			<td><input type="text" name="refadd"  class="form-control" value="<?php echo $refaddedit ; ?>"></td>
		</tr>


		
 </tbody>
</table>
<input type="submit" name="submit" value="Update" class="btn btn-success">

<?php
if(isset($_POST['submit'])){

$usernameupa = $_POST['username'];	
$emailupa = $_POST['email'];	
$btcupa = $_POST['btc'];	
$balanceupa = $_POST['balance'];	
$statusupa = $_POST['status'];		
$withbalupa = $_POST['withbal'];	
$refupa = $_POST['ref'];	
$refaddupa = $_POST['refadd'];		

$updatebid = "UPDATE users SET  username = '$usernameupa' , email = '$emailupa' , btc = '$btcupa' , balance = '$balanceupa' , status = '$statusupa' , withbalance = '$withbalupa' , ref = '$refupa' , refadd = $refaddupa WHERE ID = '$iid'";
if ($conn->query($updatebid) === TRUE) {
echo "<script>window.location='ref.php?a=s' ; </script>";
}else{
echo "<script>window.location='ref.php?a=e' ; </script>";	
}	
}


?>

</div>
</form>
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