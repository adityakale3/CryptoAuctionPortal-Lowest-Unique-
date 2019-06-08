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
<div class="well content <?php if($page == "index"){echo "current";}else {echo "adik" ;}?>">
<a href="index.php">
<table style="width:80%">
<tr>
<td><i class="material-icons" style="float:right;">&#xE88A;</i> </td>
<td> Home </td>
</tr>
</table>
</a>
</div>

<div class="well content <?php if($page == "signup"){echo "current";}else {echo "adik" ;}?>">
<a href="signup.php">
<table style="width:80%">
<tr>
<td><i class="material-icons"  style="float:right;">&#xE890;</i> </td>
<td> Sign Up </td>
</tr>
</table>
</a>
</div>