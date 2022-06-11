<?php 
include "../dbconnection.php";
$sql = "delete from parceltbl where trackingno='".$_POST['tno']."'";
$res=mysqli_query($con,$sql);
if($res){
   ?><script>alert("Bill Record Deleted !! ")</script> <?php
}
?>