<?php
$page = "bank";
session_start();
include('../config.php');
include('allfun.php');
if(!isset($_SESSION['admin'])){
echo "<script> window.location='logout.php' ; </script>";
}	

if(isset($_GET['a'])){
$a = $_GET['a'];
if($a == "s"){$msg = '<div class="alert alert-success" role="alert"> Updated successfully </div>';}	
else if($a == "e"){$msg = '<div class="alert alert-danger" role="alert"> Error Updating , try again later </div>';}	
else if($a == "ee"){$msg = '<div class="alert alert-danger" role="alert"> Error Creating New BID , try again later </div>';}	
else if($a == "ss"){$msg = '<div class="alert alert-success" role="alert"> Successfully Created new BID</div>';}	
}else{
$msg = "";	
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
<?php echo $msg ; ?>
<div class="table-responsive">
<table class="table table-hover"  border="0">
 <thead>
	    <tr>
			<th>Sr. No.</th>
			<th>BID No</th>	
			<th>Bid Amount</th>	
			<th>Bid Time</th>
			<th>Status</th>
			<th>Bid Value</th>
			<th>End Time</th>
			<th>Edit</th>			
		</tr>
 </thead>
 <tbody>
<?php
$sr = 1;
$windb = "SELECT * from bids ORDER by bidid" ;
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
			if($statusa == "live"){$clwin = "class='adik'";}else{$clwin = "";}

echo "
		<tr ".$clwin.">
			<td> ".$sr++." </td>
			<td>$bidida</td>
			<td>$bidamounta</td>	
			<td>".getTime($bidtimea)."</td>
			<td>$statusa</td>			
			<td>$bidvaluea</td>
			<td>".gmdate("Y-m-d\ i:s", $endtimea)."</td>
			<td><a href='edit.php?iid=$bidida'><input type='button' class='btn btn-primary' value='Edit'></a></td>			
		</tr>
";
}
}else{
echo "<tr> <td colspan='5'> No Bids  Yet </td> </tr>";		
}
?>
		
 </tbody>
</table>
</div>
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