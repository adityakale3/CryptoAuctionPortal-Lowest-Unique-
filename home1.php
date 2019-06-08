<?php
$page = "home";
?>
<!DOCTYPE html>
<html class="gr__salmen_website" lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bitcoin Faucet</title>

    <!-- Bootstrap -->
    <link href="assets/bootstrap.css" rel="stylesheet">
    <link href="assets/style.css" rel="stylesheet">

 <style>
 .current{color:#5be549;}
 </style>
  </head>
  <body data-gr-c-s-loaded="true">
    <nav class="navbar navbar-default">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Bitcoin Faucet</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
			<?php include('menu.php'); ?>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <div class="container">
      <div id="containertop">
        <div class="row">
          <div class="col-md-6 col-md-offset-3"></div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="col-md-2">
        <div id="advertising">
          
        </div>
      </div>
      <div class="col-md-8">
        <div class="well content">
          <blockquote><h5><b>Home</b></h5></blockquote>
<br>
<center>
<h4><b>Active Bids : </b> Bid No. 01</h4>
<div class="row">

<div class="col-md-4"></div>

<div class="col-md-4">
<div class="card">
  <img src="netflix.png" alt="Avatar" style="width:100%">
  <div class="containera">
	<center>
    <b>Prize : 1,00,000 Satoshis </b><br>
    <p>Time remaining 
	24:05:00</p>
<a href="bids.php" class="btn btn-success">Bid Now</a>	
	</center>	
  </div>
</div> 	 
</div>


<div class="col-md-4"></div>
</div>

	  <br><br><br><br>


</center>

<!-- alternative 		  
		  <div class="row">		  
			<div class="col-md-6">
				<h3></h3>
				<p>0.00000000 BTC</p>
			</div>			  
			<div class="col-md-6">
				<h3></h3>
				<p>0 BidCoins</p>
			</div>  		  
		  </div>
		  
		  <div class="row">		  
			<div class="col-md-6">
				<h3><a href="#" class="btn btn-success">Deposit</a></h3>
			</div>			  
			<div class="col-md-6">
				<h3><a href="#" class="btn btn-success">Shop BidCoins</a></h3>
			</div>  		  
		  </div>
-->


<h3>Previous Bid Winners</h3>
<br><br><br>
<table class="table table-hover">
 <thead>
	    <tr>
			<th>Bid No.</th>
			<th>Winner</th>	
			<th>Amount Won</th>	
			<th>USD / INR</th>				
		</tr>
 </thead>
 <tbody>
		<tr>
			<td>01</td>
			<td><?php echo $userid ; ?></td>
			<td>0.001 btc</td>
			<td>$7.49 / 488.68 &#x20b9;</td>
		</tr>
		<tr>
			<td>02</td>
			<td><?php echo $userid ; ?></td>
			<td>0.01 btc</td>
			<td>$75 / 4892.13 &#x20b9;</td>
		</tr>
		<tr>
			<td>03</td>
			<td><?php echo $userid ; ?></td>
			<td>0.101 btc</td>
			<td>$756.69 / 49410.49 &#x20b9;</td>
		</tr>		
 </tbody>
</table>








		  
		  
		</div>  
		  
      <div class="col-md-2">
        <div id="advertising">
          
        </div>
      </div>
	  
	  

    </div>
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <hr>
            <span style="color: grey;">© 2016 Bitcoin Faucet</span>
          </div>
        </div>
      </div>
    </footer>
    <script type="text/javascript" async="" src="assets/recaptcha__en.js"></script><script src="assets/jquery.js"></script>
    <script src="assets/bootstrap.js"></script>
    <script src="assets/api.js"></script>
  
</body></html>