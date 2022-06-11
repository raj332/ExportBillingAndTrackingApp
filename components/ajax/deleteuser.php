<?php 
include "../dbconnection.php";
$sql = "delete from usertbl where username='".$_POST['user']."'";
$res=mysqli_query($con,$sql);

?>