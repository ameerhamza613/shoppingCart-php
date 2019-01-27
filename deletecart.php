<?php

echo $did = $_GET['id'];

include('connect.php');
$r = "DELETE FROM `carti` WHERE `cid`='$did';";
if(mysqli_query($conn,$r)){
	echo "record deleted successfully";
	header('location:cart.php');
}else{
	echo "error in deleting record";
}



?>