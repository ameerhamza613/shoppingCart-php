<?php

include('header.php');



?>

<!DOCTYPE html>

<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<title>REGISTER </title>
</head>

<body>

<form method="post" action="login.php">
<h3 id="rg">Register Here</h3>

<div class="zarb">
<label>FIRST NAME</label>
<input type="text" name="firstname">
</div>

<div class="zarb">
<label>LAST NAME</label>
<input type="text" name="lastname">
</div>

<div class="zarb">
<label>EMAIL</label>
<input type="text" name="email">
</div>

<div class="zarb">
<label>PASSWORD</label>
<input type="password" name="password">
</div>

<div class="btn">
<input type="submit" name="register" value="Register">
</div>


</form>



</body>

</html>