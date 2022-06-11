
<?php include "../dbconnection.php"?>
<table class="table table-striped" style="width:30rem" data-bs-spy="scroll">
      <tr>
        <td>Service</td>
        <td>Country</td>
        <td>Weight(KG)</td>
        <td>Cost</td>
        <td></td>
      </tr>
      <?php
      
      $sql2 = "select * from ratetbl";
      $res2 = mysqli_query($con, $sql2);
      while ($data = mysqli_fetch_assoc($res2)) {
      ?>
        <tr>
          <td><?php echo $data["courierservice"] ?></td>
          <td><?php echo $data["country"] ?></td>
          <td><?php echo $data["weight"] ?></td>
          <td><?php echo $data["cost"] ?></td>
          <td><img src="../imgs/deleteicon.png" style="height:2rem; cursor:pointer" onclick="deleterate('<?php echo $data['courierservice']?>','<?php echo $data['country']?>','<?php echo $data['weight'] ?>')"></td>
        </tr>
    
      <?php

      }
      
      ?>
</table>