<?php
session_start();
require('connect.php');
include('header.php');

if(!isset($_SESSION['id'] )){
  header('location:login.php');
}else {

if(isset($_POST['add'])){
//add products code

 $pname =$_POST['pname'];
 $pprice =$_POST['pprice'];
 $image =$_FILES["uploadfile"]["name"];
 $sql = "INSERT INTO `products` (`name`,`price`,`image`) VALUES ('$pname','$pprice','$image');";

if(!mysqli_query($conn,$sql)){
	echo "data not inserted";
}
else{

	//echo 'successful';
}

}


if(isset($_POST['carto'])){

include('connect.php');

$pid =  $_GET['id'];
$productquantity = $_POST['quantity'];

$sql = "SELECT * FROM `products` WHERE `id`='$pid';";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){
  $row = mysqli_fetch_assoc($result);
  print_r($row);

$productid = $row['id'];
$productname = $row['name'];
$productprice = $row['price'];
$productimage = $row['image'];

$ab = "INSERT INTO `carti`(`name`,`price`,`image`,`quantity`,`id`)
        VALUES('$productname','$productprice','$productimage','$productquantity','$pid');";

        if(mysqli_query($conn,$ab)){
          echo " ";
        }else{
          echo "error inserting into cart";
        }


}

mysqli_close($conn);
}




}//else of session
?>


<!DOCTYPE html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="" /> 
	<title>Shopping Cart</title>
</head>


<body>

<div class="container-fluid">

<h1>Ameer HAmza</h1>

<div class="row">

<?php
include('connect.php');
 $sq = "SELECT * FROM `products`;";
$result = mysqli_query($conn,$sq);

if(mysqli_num_rows($result)>0){
   
	while($row =mysqli_fetch_assoc($result)) {

	?>

<div class="col-lg-3 col-md-3 col-sm-12">

<form method="post" action="index.php?id=<?php echo $row['id']?>" >

<div class="card" >

	<h5 class="card-title ml-4 mt-3 "><?php echo ucwords($row['name']) ?></h5>
    
    <div class="card-body"><img src="<?php echo $row['image'] ?>" alt="dekh" style="width:260;height:260;" class="img-fluid mb-2"></div>

    <h6 class="pl-4 mb-2"><?php echo $row['price'] ?> &#8360;</h6>

    <input type="text" class="form-control mb-2" name="quantity" placeholder="quantity">

    <div class="d-flex">
    <button type="submit" class="btn btn-success flex-fill" name="carto" >ADD TO CART</button>
   </div>

</div>


</form>

</div>

<?php
	}

}

?>

</div>

</div>



</body>

</html>

