<?php
$page = "bank";
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
   <center> <img src="logo.png" width="150px"></center>


      <div class="col-md-2 ">
<?php include ('menu.php') ; ?>
      </div>

      <div class="col-md-8">
        <div class="well content">
         

<center>
<div class="row">
<div class="col-md-4">
<h4><b>Bid Data : </b>Live Bid No <?php echo $bidid; ?> </h4>
<div class="card">
  <div class="containera">
	<center>
    <h3>Prize : <?php echo $bidamount ; ?> </h3>
    <span><b> Time remaining <p id="demo"></p> </b></span>
<a href="#" class="btn btn-success"><?php echo $winner." | ".$bidamo ;?> </a>	
	</center>	
  </div>
<br>
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
 <br> 
</div> 
<br><br>
<a href="list.php"><input type="button" value="List / Edit all Games" class="btn btn-success"></a>
<br><br>
<a href="crt.php"><input type="button" value="Create New Game" class="btn btn-success"></a>

	 
</div>


<?php
if(isset($_POST['submit'])){
$bidtiview = $_POST['bidlive'];
echo "<script>window.location='game.php?gameid=$bidtiview';</script>";	
}



?>



<div class="col-md-8">
<h4><b>Current Bids <?php echo $gameiid; ?></b></h4><br>

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
$windb = "SELECT * from bidgame WHERE bidid = '$gameiid' ORDER by username" ;
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