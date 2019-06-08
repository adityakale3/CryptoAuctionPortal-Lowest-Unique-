<?php
$page = "home";
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
    <title>Crypto Bids | Home</title>
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


      <div class="col-md-2 ">
<?php include ('menu.php') ; ?>
      </div>

      <div class="col-md-8">
        <div class="well content">
         

<center>
<div class="row">
<div class="col-md-4">
<h4><b>Live Bids : </b> Bid No <?php echo $bidid; ?> </h4>
<div class="card">
  <img src="coins2.png" alt="Avatar" style="width:40%">
  <div class="containera">
	<center>
    <h3>Prize : <?php echo $bidamount ; ?> </h3>
    <span><b> Time remaining <p id="demo"></p> </b></span>
<a href="#" class="btn btn-success"><?php echo $winner." | ".$bidamo ;?> </a>	
	</center>	
  </div>
</div> 	 

<?php
$sb = "SELECT * from signup WHERE ID = 1 " ;
$rsb=mysqli_query($conn,$sb);
		while($ssbb=mysqli_fetch_array($rsb))
		{
			$sgnboo = $ssbb['signupbonus'];
		}

$refbi = "SELECT * from onrefer WHERE ID = 1 " ;
$rfu=mysqli_query($conn,$refbi);
		while($lref=mysqli_fetch_array($rfu))
		{
			$refboo = $lref['amount'];
		}
?>

<h2>Set Sign Up Bonus</h2>
<form method="post">
<input type="text" name="signupbonus" class="form-control" value="<?php echo $sgnboo; ?>" >
<input type="submit" class="btn btn-success" name="signbo">
</form>
<?php
if(isset($_POST['signbo'])){
$bono = $_POST['signupbonus'];	
$updabono ="UPDATE signup SET signupbonus = '$bono' WHERE ID = 1";
if ($conn->query($updabono) === TRUE) {
echo '<div class="alert alert-success" role="alert"> Updated successfully </div>';
}else{
echo '<div class="alert alert-danger" role="alert"> Error Updating Signup Bonus </div>';
}}
?>



<h2>Set Refral Income</h2>
<form method="post">
<input type="text" name="refbonus" class="form-control" value="<?php echo $refboo; ?>">
<input type="submit" class="btn btn-success" name="refbo">
</form>
<?php
if(isset($_POST['refbo'])){
$rebono = $_POST['refbonus'];	
$updarefbono ="UPDATE onrefer SET amount = '$rebono' WHERE ID = 1";
if ($conn->query($updarefbono) === TRUE) {
echo '<div class="alert alert-success" role="alert"> Updated Refral successfully </div>';
}else{
echo '<div class="alert alert-danger" role="alert"> Error Updating Refral Bonus </div>';
}}
?>
</div>




<div class="col-md-8">
<h4><b>Current Bids</b></h4><br>

<div class="table-responsive">
<table class="table table-hover"  border="0">
 <thead>
	    <tr>
			<th>Sr. No.</th>
			<th>User</th>	
			<th>Bid Value</th>	
			<th>Vel</th>				
			<th>Bid ID</th>				
		</tr>
 </thead>
 <tbody>
<?php
$sr = 1;
$windb = "SELECT * from bidgame WHERE bidid = '$bidid' ORDER by username" ;
$rlgin=mysqli_query($conn,$windb);
$countwonq = mysqli_num_rows($rlgin);
if($countwonq >= 1) {
		while($us=mysqli_fetch_array($rlgin))
		{
			$winbidnoid = $us['ID'];			
			$winbidno = $us['bidid'];
			$winusername = $us['username'];
			$winamountwon = $us['vel'];
			$winstatus = $us['bidamount'];
if($winbidnoid == $winneriid){$clwin = "class='adik'";}else{$clwin = "";}
echo "
		<tr ".$clwin.">
			<td> ".$sr++." </td>
			<td>$winusername</td>
			<td>$winstatus</td>
			<td>".getTime($winamountwon)."</td>
			<td>$winbidno</td>			
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



</div>

</div>

	  <br><br>
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