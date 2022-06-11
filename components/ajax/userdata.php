<table class="table table-striped"style="width:35rem" >
        <tr>
            <td>No.</td>
            <td>Username</td>
            <td>Password</td>
            <td></td>
        </tr>
        <?php include "../dbconnection.php";
$sql="select * from usertbl";
$sno=1;
$res=mysqli_query($con,$sql);
while($data=mysqli_fetch_assoc($res))
{
  ?>
  <tr>
    <td><?php echo $sno ?></td>
    <td><?php echo $data["username"]?></td>
    <td><?php echo $data["password"]?></td>
    <td><img src="../imgs/deleteicon.png" style="height:2rem; cursor:pointer" onclick="deleteuser('<?php echo $data['username']?>')"></td>
  </tr>
  <?php
  $sno++;
}
?>
      </table>
      