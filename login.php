<?php
session_start();
include('header.php');


if(isset($_POST['register'])){
include('connect.php');

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];

$q = "INSERT INTO `register`(`firstname`,`lastname`,`email`,`password`) VALUES ('$firstname','$lastname','$email','$password');";
if(mysqli_query($conn,$q)){
	//echo 'successful register';
}else{
	echo 'error register';
}

mysqli_close($conn);

}


if(isset($_POST['login'])){

include('connect.php');
$email = $_POST['email'];
$password = $_POST['password'];


$a = "SELECT * FROM `register` WHERE `email`='$email' AND `password`='$password';";

$result = mysqli_query($conn,$a);

if(mysqli_num_rows($result)>0){
	while($row = mysqli_fetch_assoc($result)){
$_SESSION['id']=$row['id'];
$_SESSION['email']=$row['email'];
header('location:index.php');
							}

}else{
	echo "email and password are invalid";
}

mysqli_close($conn);
}






?>



<!DOCTYPE html>

<html>
<head>
<style type="text/css">



form{
	border: 1px solid black;
	width: 500px;
	margin:auto;
	margin-top: 80px;
	border-radius: 4px;
	height: 250px;
}

#rg{
 text-align: center;
 font-size: 16px;
 color: white;
 background-color: green;
 padding: 20px;
 margin:0px;
}

.zarb{
	padding: 0px 0px 0px 100px;
	margin: 25px 0px 0px 0px;

}
.zarb label{
display: block;
font-family: verdana;
font-size: 11px;
font-style: bold;
}
.zarb input{
width: 300px;
border: 1px solid black;
border-radius: 5px;
height: 35px;
font-size: 16px;
padding-left: 3px;
}

.btn{
	
	margin-left:100px;
	margin-top:10px;
	
}

.btn input{
	padding: 4px 12px 4px 12px;
	border:1px solid seagreen;
	color: white;
	border-radius: 2px;
	background-color: seagreen;
}




</style>
<title>REGISTER </title>
</head>

<body>

<form method="post" action="">
<h3 id="rg">Login Here</h3>


<div class="zarb">
<label>EMAIL</label>
<input type="text" name="email">
</div>

<div class="zarb">
<label>PASSWORD</label>
<input type="password" name="password">
</div>

<div class="btn">
<input type="submit" name="login" value="Login">
</div>


</form>



</body>

</html>