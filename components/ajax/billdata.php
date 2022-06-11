

        

          <?php include "../dbconnection.php";
$username=$_POST["username"];
if($_POST["biller"]){
  ?><table class="table  table-striped text-center " style="width:100%">
  <thead>
  <tr>
   <td>Bill No</td>
   <td>Date</td>
   <td>Sender Name</td>
<td>Items</td>
   <td>Tracking no</td>
   <td>CSTracking no</td>
   <td>Source</td>
   <td>Destination</td>
   <td>cost</td>
   <td></td>
  </tr>
  </thead><?php
$sql="select billno,date,c.name,b.item,a.trackingno,a.cstrackingno,b.source ,b.destination ,cost  from billtbl a ,parceltbl b,clienttbl c where a.senderid = c.clientid and a.trackingno = b.trackingno and a.username='".$username."';";
$res=mysqli_query($con,$sql);
while($data=mysqli_fetch_assoc($res))
{
  
  
  ?>
  <tr>
    <td><?php echo $data["billno"] ?></td>
    <td><?php echo $data["date"]?></td>
    <td><?php echo $data["name"]?></td>
    <td><?php echo $data["item"]?></td>
    <td><?php echo $data["trackingno"]?></td>
    <td><?php echo $data["cstrackingno"]?></td>
    <td><?php echo $data["source"]?></td>
    <td><?php echo $data["destination"]?></td>
    <td><?php echo $data["cost"]?></td>
    <td><img src="../imgs/deleteicon.png" class="mx-1"style="height:2.2rem; cursor:pointer" onclick="deletebill(<?php echo $data['trackingno'] ?>)">
  <img src="../imgs/editicon.png" class="mx-1"  style="height:2.2rem; cursor:pointer" onclick="updatebill('<?php echo $data['billno'] ?>')">
  <img src="../imgs/printicon.png" class="mx-1" style="height:2.2rem; cursor:pointer" onclick="printbill('<?php echo $data['billno'] ?>')">  
</td>
  </tr>
  <?php
  
}}
else if($_POST["biller"]==0)
{
  ?>
  <table class="table table-bordered  text-center" style="width:100%">
    <tr>
           <td>Bill No</td>
           <td>Date</td>
           <td>Sender Name</td>
        <td>Items</td>
           <td>Tracking no</td>
           <td>CSTracking no</td>
           <td>Source</td>
           <td>Destination</td>
           <td>cost</td>
           <td>Username</td>
          </tr>
  <?php
  $sql="select billno,date,c.name,b.item,a.trackingno,a.cstrackingno,b.source ,b.destination ,cost,username from billtbl a ,parceltbl b,clienttbl c where a.senderid = c.clientid and a.trackingno = b.trackingno ";
$res=mysqli_query($con,$sql);
while($data=mysqli_fetch_assoc($res))
{
  
  ?>
  <tr>
    <td><?php echo $data["billno"] ?></td>
    <td><?php echo $data["date"]?></td>
    <td><?php echo $data["name"]?></td>
    <td><?php echo $data["item"]?></td>
    <td><?php echo $data["trackingno"]?></td>
    <td><?php echo $data["cstrackingno"]?></td>
    <td><?php echo $data["source"]?></td>
    <td><?php echo $data["destination"]?></td>
    <td><?php echo $data["cost"]?></td>
    <td><?php echo $data["username"]?></td>
  </tr>
  <?php
  
}
}
?>
        </table>