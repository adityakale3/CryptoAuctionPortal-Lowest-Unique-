<style>
.adik:hover{
background-color:#4eae71;
color:#fff	
}
.adik1:hover{
background-color:#4eae71;
color:#fff	
}
.adik1:hover{
background-color:rgba(255,0,0,0.4);
color:#fff;	
}
.adik{
background-color:#fff;
color:	#4eae71
}
a:link {
    text-decoration: none;
	color: none;	
}
a:visited {
    text-decoration: none;
	color: none;	
}
a:hover {
    text-decoration: none;
	color: none;	
}
.current{
background-color:#4eae71;
color:#fff;
}
.card:hover {
   box-shadow: 0 8px 16px 8px rgba(78,174,113,0.8);
}

/* Add some padding inside the card container */
.containera {
    padding: 2px 16px;
}
.card {
    box-shadow: 0 4px 8px 4px rgba(78,174,113,0.5);
    transition: 0.3s;
    border-radius: 5px; /* 5px rounded corners */
}

</style>
<div class="well content <?php if($page == "home"){echo "current";}else {echo "adik" ;}?>">
<a href="home.php">
<table style="width:80%">
<tr>
<th><i class="material-icons" style="float:right;">&#xE88A;</i> </th>
<th> Home </th>
</tr>
</table>
</a>
</div>

<div class="well content  <?php if($page == "bank"){echo "current";}else {echo "adik" ;} ?>">
<a href="game.php">
<table style="width:80%">
<tr>
<th><i class="material-icons">&#xE850;</i> </th>
<th> Game </th>
</tr>
</table>
</a>
</div>

<div class="well content  <?php if($page == "win"){echo "current";}else {echo "adik" ;}?>">
<a href="win.php">
<table style="width:80%">
<tr>
<th><i class="material-icons">&#xE853;</i> </th>
<th> Winners </th>
</tr>
</table>
</a>
</div>

<div class="well content  <?php if($page == "deposit"){echo "current";}else {echo "adik" ;}?>">
<a href="deposit.php">
<table style="width:80%">
<tr>
<th><i class="material-icons">&#xE86D;</i> </th>
<th> Deposit </th>
</tr>
</table>
</a>
</div>

<div class="well content  <?php if($page == "cron"){echo "current";}else {echo "adik" ;}?>">
<a href="cron.php">
<table style="width:80%">
<tr>
<th><i class="material-icons">&#xE89A;</i> </th>
<th>Cron Job</th>
</tr>
</table>
</a>
</div>

<div class="well content adik1">
<a href="logout.php">
<table style="width:80%">
<tr>
<th><i class="material-icons">&#xE8AC;</i> </th>
<th> Logout </th>
</tr>
</table>
</a>
</div>