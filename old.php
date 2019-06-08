<?php
$page = "old";
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
       <title>Crypto Bids | Previous Winners</title>
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
<center>
<div class="table-responsive">
		  <table class="table" style="text-align: center; width: 100%;" cellspacing="2" cellpadding="2" border="0">
	  <thead>
	    <tr>
	      <th>Bid ID </th>
	      <th>Prize</th>
	      <th>Winner</th>
	      <th>Bid Amount</th>	
	      <th>Status</th>
	      <th>All bids</th>		  
	      <th>On</th>		  
		</tr>
	  </thead>
		<tbody>

<?php 	
$ss = "SELECT * from winners order by vel DESC" ;
$lgn=mysqli_query($conn,$ss);
$sr = 1;
$countwin = mysqli_num_rows($lgn);
	 if($countwin >= 1) {
		while($ert=mysqli_fetch_array($lgn))
		{
			$bidnowin = $ert['bidno'];			
			$usernamewin = $ert['username'];
			$amountwonwin = $ert['amountwon'];
			$statuswin = $ert['status'];			
			$velwin = $ert['vel'];
			$bidvalwin = $ert['bidval'];
			$downloadwin = $ert['download'];			
echo "
	   <tr>
        <td> ".$sr++ ."</td>
        <td>$bidnowin</td>
        <td>$amountwon</td>
        <td>$username</td>
        <td>$bidvalwin</td>
        <td>$statuswin</td>
        <td>$downloadwin</td>
        <td>$velwin</td>		
      </tr>
";
	 }}else{
echo "			
		<tr>
		<td colspan='8' style='text-align:center'>No Winners Yet</td>
		</tr>	
	";		
		}

?>		
		
		
		</tbody>
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