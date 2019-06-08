<?php
$page = "ref";
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
else if($a == "ee"){$msg = '<div class="alert alert-danger" role="alert"> Error Creating New Winner , try again later </div>';}	
else if($a == "ss"){$msg = '<div class="alert alert-success" role="alert"> Successfully Created new Winner</div>';}	
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
    <title>Crypto Bids | Ref</title>
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
<?php echo $msg ;?>
<div class="table-responsive">
<table class="table table-hover"  border="0">
 <thead>
	    <tr>
			<th>Sr. No.</th>
			<th>Username</th>	
			<th>Refrrels</th>	
			<th>Balance</th>
			<th>Ref to U</th>
			<th>Edit</th>
		</tr>
 </thead>
 <tbody>
<?php
$sra = 1;
$windb = "SELECT * from users ORDER by ref " ;
$rlgin=mysqli_query($conn,$windb);
$countwonq = mysqli_num_rows($rlgin);
if($countwonq >= 1) {
		while($us=mysqli_fetch_array($rlgin))
		{
			$usernamevid = $us['ID'];						
			$usernamev = $us['username'];			
			$refv = $us['ref'];
			$balancev = $us['balance'];
			$refaddv = $us['refadd'];			
if($refv == null || $refv == ""){$refkav = "NA"; $refaddkav = "NA";}else{$refkav = $refv; $refaddkav = $refaddv; }			
echo "
		<tr>
			<td> ".$sra++." </td>
			<td>$usernamev</td>
			<td>$refkav</td>	
			<td>$balancev</td>
			<td>$refaddkav</td>
			<th><a href='edituser.php?iid=$usernamevid'> <input type='button' class='btn btn-success' value='Edit User'></a></th>
		</tr>
";
}
}else{
echo "<tr> <td colspan='9'> No Payments  Yet </td> </tr>";		
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