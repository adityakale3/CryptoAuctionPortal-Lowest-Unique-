<?php
$page = "win";
session_start();
include('../config.php');
include('allfun.php');
if(!isset($_SESSION['admin'])){
echo "<script> window.location='logout.php' ; </script>";		
}	
if(isset($_GET['iid'])){
$iid = $_GET['iid'];
$gameiid = $_GET['iid'];
}else{
echo "<script> window.location='win.php' ; </script>";		
}	
?>		

<!DOCTYPE html>
<html class="gr__salmen_website" lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Crypto Bids | Edit Win</title>
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

<h4><b>Current Bids <?php echo $gameiid; ?></b></h4><br>

<div class="table-responsive">
<table class="table table-hover"  border="0">
 <thead>
	    <tr>
			<th>User</th>	
			<th>Bid Value</th>	
			<th>Bid ID</th>				
		</tr>
 </thead>
 <tbody>
<?php
if(isset($_GET['iid'])){
$ssqld = "SELECT ID,bidid,username , bidamount AS bid FROM bidgame WHERE bidid = '".$gameiid."' GROUP BY bidamount HAVING COUNT(*) = 1 ORDER BY bidamount LIMIT 1 ";
$run_lginqd=mysqli_query($conn,$ssqld);
$count1d = mysqli_num_rows($run_lginqd);
if($count1d >= 1) {
		while($usrlginsqd=mysqli_fetch_array($run_lginqd))
		{
			$winneriid = $usrlginsqd['bidid'];			
			$winnerd = $usrlginsqd['username'];
			$bidamod = $usrlginsqd['bid'];
			}
}else {
$winnerd = "No Current Winner";	
$bidamod = "NA";
$winneriid = $gameiid;
}
}else{
$winnerd = "No Current Winner";	
$bidamod = "NA";
$winneriid = "NA";	
}
?>
	    <tr>
			<td><?php echo $winnerd ; ?></td>	
			<td><?php echo $bidamod ; ?></td>	
			<td><?php echo $winneriid ; ?></td>	
		</tr>		
 </tbody>
</table>
</div>





<div class="row">
<div class="col-md-12">
<center>
<form method="post">
<div class="table-responsive">
<table class="table table-hover"  border="0">
 <thead>
	    <tr>


			<th>Amount Won</th>			
			<th>Username</th>	
			<th>Status</th>
			<th>Bid Value</th>
			<th>Download</th>
		</tr>
 </thead>
 <tbody>
<?php

$windb = "SELECT * from winners WHERE bidno = '$iid'" ;
$rlgin=mysqli_query($conn,$windb);
$countwonq = mysqli_num_rows($rlgin);
if($countwonq >= 1) {
		while($us=mysqli_fetch_array($rlgin))
		{
			$bidida = $us['bidno'];			
			$bidamounta = $us['username'];
			$bidtimea = $us['amountwon'];
			$statusa = $us['status'];
			$bidvaluea = $us['bidval'];
			$endtimea = $us['download'];
}
}else{
echo "<tr> <td colspan='5'> No Bids  Yet </td> </tr>";		
}
?>
		<tr>
			<td><input type="text" name="amountwon" class="form-control" value="<?php echo $bidtimea ; ?>"></td>			
			<td><input type="text" name="username"  class="form-control" value="<?php echo $bidamounta ; ?>"></td>
			<td><input type="text" name="statuswon"  class="form-control" value="<?php echo $statusa ; ?>"></td>
			<td><input type="text" name="bidval"  class="form-control" value="<?php echo $bidvaluea ; ?>"></td>
			<td><input type="text" name="download"  class="form-control" value="<?php echo $endtimea ; ?>"></td>
		</tr>


		
 </tbody>
</table>
<input type="submit" name="submit" value="Update" class="btn btn-success">

<?php
if(isset($_POST['submit'])){

$amountwonx = $_POST['amountwon'];	
$usernamex = $_POST['username'];	
$statuswonx = $_POST['statuswon'];	
$bidvalx = $_POST['bidval'];	
$downloadx = $_POST['download'];		

$updatebid = "UPDATE winners SET  username = '$usernamex' , amountwon = '$amountwonx' , status = '$statuswonx' , bidval = '$bidvalx' , download = '$downloadx' WHERE bidno = '$bidida'";
if ($conn->query($updatebid) === TRUE) {
echo "<script>window.location='win.php?a=s' ; </script>";
}else{
echo "<script>window.location='win.php?a=e' ; </script>";	
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