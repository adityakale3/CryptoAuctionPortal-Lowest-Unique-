<?php
$page = "win";
session_start();
include('../config.php');
include('allfun.php');
if(!isset($_SESSION['admin'])){
echo "<script> window.location='logout.php' ; </script>";
}
if(isset($_GET['gameid'])){
$gameiid = $_GET['gameid'];
}else{
$gameiid = 	1;
}	
?>		

<!DOCTYPE html>
<html class="gr__salmen_website" lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Crypto Bids | Winner Create</title>
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
<select name="bidlive" class="form-control" style="width:40%">
<?php
$sele = "SELECT * FROM bids ORDER by ID" ;
$lgnsele=mysqli_query($conn,$sele);
$countsele = mysqli_num_rows($lgnsele);
	 if($countsele >= 1) {
		while($ertsele=mysqli_fetch_array($lgnsele))
		{
			$livebidid = $ertsele['bidid'];
echo "
<option value='$livebidid' ";
if($livebidid == $gameiid){echo "selected";} 
echo "> $livebidid </option>";			
		}
	 }
?>
</select>
<br>
<input type="submit" name="submit" value="View" class="btn btn-primary">
</form>  
<?php
if(isset($_POST['submit'])){
$bidtiview = $_POST['bidlive'];
echo "<script>window.location='crtwin.php?gameid=$bidtiview';</script>";	
}
?>

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
if(isset($_GET['gameid'])){
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




<h3>Create New Winner</h3>

<form method="post">
<input type="text" name="bidno" style="width:40%"  placeholder="Bid No" class="form-control" required>
<input type="text" name="username"  style="width:40%" placeholder="User Won"  class="form-control" required>
<input type="text" name="amountwon" style="width:40%"  placeholder="Amount Won" class="form-control" required>
<input type="text" name="status"  style="width:40%" placeholder="Status" class="form-control" required>
<input type="text" name="bidval" style="width:40%"  placeholder="Bidding value that won" class="form-control" required>
<input type="text" name="download" style="width:40%"  placeholder="Download" class="form-control" required>
<br>
<input type="submit" value="Create New Winner" name="submitwin" class="btn btn-success">
</form>


<?php

if(isset($_POST['submitwin'])){
$bidnov = mysqli_real_escape_string($conn, $_POST['bidno']);
$usernamev = mysqli_real_escape_string($conn, $_POST['username']);
$amountwonv = mysqli_real_escape_string($conn, $_POST['amountwon']);
$statusv = mysqli_real_escape_string($conn, $_POST['status']);
$bidvalv = mysqli_real_escape_string($conn, $_POST['bidval']);
$downloadv = mysqli_real_escape_string($conn, $_POST['download']);
$velv = time();
	
$todba = "INSERT INTO winners (bidno, username, amountwon,status,bidval,download)
VALUES ('$bidnov', '$usernamev','$amountwonv','$statusv','$bidvalv','$downloadv') " ;
if ($conn->query($todba) === TRUE) {
	echo "<script>window.location='win.php?a=ss' ; </script>";
} else {
//echo "Error: " . $sql . "<br>" . $conn->error;
	echo "<script>window.location='win.php?a=ee' ; </script>";
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