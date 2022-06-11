<?php 
include "../dbconnection.php";
$sql = "delete from ratetbl where courierservice='".$_POST['service']."' and country='".$_POST['country']."' and weight='".$_POST['weight']."' ";
$res=mysqli_query($con,$sql);

?>