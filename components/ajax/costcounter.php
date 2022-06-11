<?php
include "../dbconnection.php";

$sql="select * from ratetbl where weight='".$_POST["weight"]."' and courierservice='".$_POST["service"]."' and country='".$_POST["destination"]."'";
$res = mysqli_query($con,$sql);
$data=mysqli_fetch_array($res);
$rate=$data["cost"];
echo $rate;
?>