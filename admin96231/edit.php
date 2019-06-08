<?php
$page = "bank";
session_start();
include('../config.php');
include('allfun.php');
if(!isset($_SESSION['admin'])){
echo "<script> window.location='logout.php' ; </script>";		
}	
if(isset($_GET['iid'])){
$iid = $_GET['iid'];
}else{
echo "<script> window.location='crt.php' ; </script>";		
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
<form method="post">
<div class="table-responsive">
<table class="table table-hover"  border="0">
 <thead>
	    <tr>

			<th>BID No</th>	
			<th>Bid Time</th>			
			<th>Bid Amount</th>	
			<th>Status</th>
			<th>Bid Value</th>
			<th>End Time</th>
		</tr>
 </thead>
 <tbody>
<?php

$windb = "SELECT * from bids WHERE bidid = '$iid'" ;
$rlgin=mysqli_query($conn,$windb);
$countwonq = mysqli_num_rows($rlgin);
if($countwonq >= 1) {
		while($us=mysqli_fetch_array($rlgin))
		{
			$bidida = $us['bidid'];			
			$bidamounta = $us['bidamount'];
			$bidtimea = $us['bidtime'];
			$statusa = $us['status'];
			$bidvaluea = $us['bidvalue'];
			$endtimea = $us['endtime'];
}
}else{
echo "<tr> <td colspan='5'> No Bids  Yet </td> </tr>";		
}
?>
		<tr>
			<td><input type="text" class="form-control" value="<?php echo $bidida ; ?>" style="width:50%" readonly></td>
			<td><input type="text" class="form-control" value="<?php echo getTime($bidtimea) ; ?>" style="width:110%"  readonly></td>			
			<td><input type="text" name="bidamo"  class="form-control" value="<?php echo $bidamounta ; ?>"></td>
			<td><input type="text" name="bidsta"  class="form-control" value="<?php echo $statusa ; ?>"></td>
			<td><input type="text" name="bidval"  class="form-control" value="<?php echo $bidvaluea ; ?>"></td>
			<td><input type="text" name="bidend"  class="form-control" value="<?php echo $endtimea ; ?>"></td>
		</tr>
<tr>
<td colspan="5"></td>
<td><?php echo gmdate("Y-m-d\ i:s", $endtimea) ; ?> </td>
</tr>

		
 </tbody>
</table>
<br><a href="https://www.unixtimestamp.com/" target="_blank"><input type="button" class="btn btn-warning" value="Get unix time"></a><br>
<input type="submit" name="submit" value="Update" class="btn btn-success">

<?php
if(isset($_POST['submit'])){
$bidamoq = $_POST['bidamo'];	
$bidstaq = $_POST['bidsta'];	
$bidvalq = $_POST['bidval'];	
$bidendq = $_POST['bidend'];		

$updatebid = "UPDATE bids SET bidamount = '$bidamoq' , status = '$bidstaq' , bidvalue = '$bidvalq' , endtime = '$bidendq' WHERE bidid = '$iid'";
if ($conn->query($updatebid) === TRUE) {
echo "<script>window.location='list.php?a=s' ; </script>";
}else{
echo "<script>window.location='list.php?a=e' ; </script>";	
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