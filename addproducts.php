<?php

include('header.php');









?>

<html>

<head>
<link rel="stylesheet" type="text/css" href="style.css">
<title> ADD PRODUCTS </title>

</head>

<body>

<form method="post" action="index.php" enctype="multipart/form-data">
<h3 id="rg">ADD PRODUCTS</h3>

<div class="zarb">
<label><b>PRODUCT NAME :</b></label>
<input type="text" name="pname">
</div>

<div class="zarb">
<label><b>PRODUCT PRICE</b></label>
<input type="text" name="pprice">
</div> 
<div class="zarb">
<label><b>PRODUCT IMAGE</b></label>
<input type="file" name="uploadfile">
</div>

<div class="btn">
<input type="submit" name="add" value="add">
</div>

</form>



</body>


</html>