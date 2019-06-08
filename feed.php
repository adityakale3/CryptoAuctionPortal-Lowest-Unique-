<?php
session_start();
include('config.php');
include('allfun.php');
if(isset($_POST['feedback'])){


$sub = mysqli_real_escape_string($conn, $_POST['sub']);
$msg = mysqli_real_escape_string($conn, $_POST['msg']);

if(empty($sub) || empty($msg))
    {
echo "<script>window.location='contact.php?feed=ep' ; </script>";
  
    }else{
$feeduser = "INSERT INTO contact (username, subject, msg ,email)
VALUES ('$username', '$sub','$msg','$email') " ;
if ($conn->query($feeduser) === TRUE) {
	echo "<script>window.location='contact.php?feed=s' ; </script>";
} else {
	echo "<script>window.location='contact.php?feed=tr' ; </script>";
}	
		
		
		
		
		

}
}
?>