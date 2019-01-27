<?php
include('header.php');

echo $upid =$_GET['id'];

include('connect.php');
$q = "SELECT `quantity` FROM `carti` WHERE `cid`='$upid';";
$result = mysqli_query($conn,$q);
if(mysqli_num_rows($result)>0){

$row = mysqli_fetch_assoc($result);

}

if(isset($_POST['submit'])){

$uid =$_GET['id'];
include('connect.php');
$newqu = $_POST['quantity'];
$w = "UPDATE `carti` SET `quantity`='$newqu' where `cid`='$uid';";

if(mysqli_query($conn,$w)){
	echo "updated";
	header('location:cart.php');
}else{
	echo "error updated";
}

}



?>




<!DOCTYPE html>

<html>

<head>
<style type="text/css">

form{
	border:1px solid black;
	width: 400px;
	margin: auto;
	margin-top: 100px;
	height: 200px;
	border-radius: 10px;
}
h3{
	background-color: seagreen;
	font-size: 16px;
	font-family: verdana;
	text-align: center;
	padding: 20px;
	margin: 0;
	color:white;
	border:1px solid seagreen;
	border-radius: 8px;
	padding-bottom: 14px;
}

.ed{
	
	padding: 20px 0px 0px 30px;
	margin-left: 60px;
}
.ed label{
display: block;
font-family: verdana;
font-size: 12px;
padding-bottom: 10px;

}
.ed input{
	width: 230px;
	height: 30px;
	border: 1px solid black;
	border-radius: 3px;
}

.bt{
	margin-left: 90px;
	margin-top: 20px;
}
.bt input{
	background-color: seagreen;
	border: 1px solid seagreen;
	border-radius: 2px;
	color: white;
	padding: 6px;
}



</style>

	<title> </title>
</head>

<body>

<form method="post" action="">
<h3>EDIT QUANTITY</h3>
<div class="ed">
<label> QUANTITY </label>
<input type="text" name="quantity" placeholder="<?php echo $row['quantity'] ?>">
</div>

<div class="bt">
<input type="submit" name="submit" value="Update">
</div>

</form>

</body>
</html>