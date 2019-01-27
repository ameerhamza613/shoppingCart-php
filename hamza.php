<?php
session_start();
require('connect.php');
include('header.php');


$sq = "SELECT * FROM `products`;";
$result = mysqli_query($conn,$sq);

if(mysqli_num_rows($result)>0){

    	  
    echo "<table>";
	while($row =mysqli_fetch_assoc($result)) {

	$i=0;
	if($i%3==0){
	echo "<tr>";
               }


    echo "<img src='" . $row['image'] . "' height='300' width='300'> ";

    if($i%3==2){
	echo " </tr>";
              }
$i++;
echo "</table>";	

	}

}

?>
