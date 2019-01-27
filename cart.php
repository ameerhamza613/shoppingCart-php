<?php


require('connect.php');
include('header.php');


?>


<!DOCTYPE html>
<html>

<head>
<style type="text/css">

table{

	width: 800px;
	margin: auto;
	margin-top: 100px;
	background-color: lightblue;


}
table,th,tr{
border: 1px solid black;
border-collapse: collapse;
text-align: center;
font-family: verdana;

	
}
th,td{
	padding: 10px;
}

th{
    
	background-color: green;
	color: white;
	font-size: 20px;
	
}
th:hover{
	background-color: seagreen;
}
tr{
	
	font-size: 25px;
	padding: 3px;
}

tr:nth-child(even){

background-color: seagreen;
}

#edit a{
background-color: blue;
font-size: 15px;
padding: 5px 8px 5px 8px;
border:1px solid black;
border-radius: 4px;
}

#edit a:link,a:visited,a:active{
	text-decoration: none;
	color: white;
}
#edit a:hover{
	background-color: lightblue;
}


#del a:link,a:visited,a:active{
	text-decoration: none;
	color: white;
}

#del a{
background-color: blue;
font-size: 15px;
padding: 5px 8px 5px 8px;
border:1px solid black;
border-radius: 5px;
}
#del a:hover{
	background-color: lightblue;
}

.total{
	background-color: seagreen;
	width:240px;
	height: 130px;
	border:1px solid black;
	margin: 50px 0px 0px 10px;
	padding: 0px 0px 10px 0px;
	position: absolute;
	left: 0;
	bottom: 0;
}
.total h3{
	font-family: verdana;
	font-size: 15px;
	text-align: center;
	background-color: green;
	padding: 10px;
	margin: 0;
	
	
}


</style>

<title> CART</title>
</head>

<body>

<table>

<tr>
<th>Name</th>
<th>Price</th>

<th>Quantity</th>
<th>pid</th>
<th colspan="2">ACTION</th>
</tr>

<?php

include('connect.php');

$q = "SELECT * FROM `carti`;";
$result = mysqli_query($conn,$q);
if(mysqli_num_rows($result)>0){


while ($row = mysqli_fetch_assoc($result)) {
	
	?>

<tr>
<td><?php echo $row['name'] ?></td>
<td><?php echo $row['price'] ?></td>
<td><?php echo $row['quantity'] ?></td>
<td><?php echo $row['id']?></td>
<td id="edit"><a href="editcart.php?id=<?php echo $row['cid'] ?>">EDIT</a></td>
<td id="del"><a href="deletecart.php?id=<?php echo $row['cid'] ?>">DELETE</a></td>

</tr>


<?php
	 $count=0;
	 $price=0;
	 $quant=0;

$oneprice = $row['quantity'] * $row['price'];
$price = $price + $oneprice;
$count++;
}

}
?>

</table>
<?php

//global $count;
//global $price;

?>

<div class="total">
<h3>YOUR BILL</h3>

<h5>You have ordered <span><?php echo $count ?></span> items</h5>
<h2> ToTal bill is <span><?php echo $price ?></span>Rs</h2>

</div>


</body>

</html>