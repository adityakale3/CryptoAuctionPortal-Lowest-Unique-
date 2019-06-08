<?php
session_start();
include('config.php');
include('allfun.php');
if(isset($_POST['withdraw'])){
	
if($withbalance == 0){
echo "<script>window.location= 'bank.php?w=na' ;</script>";		
}else{



$withdra = "INSERT INTO withdraw (address, username, balance,email)
VALUES ('$address', '$username','$withbalance','$email') " ;
if ($conn->query($withdra) === TRUE) {
	echo "<script>window.location='bank.php?w=s' ; </script>";
} else {
	echo "<script>window.location='bank.php?w=e' ; </script>";
}




	
	
}	
	
}
?>