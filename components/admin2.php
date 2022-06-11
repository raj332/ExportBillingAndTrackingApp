<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Rates</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <style>
        html,
        body {
            margin: 0px;
            padding: 0px;
            font-family: Verdana, Geneva, Tahoma, sans-serif
  }

    </style>
</head>
<?php include "dbconnection.php" ?>


<body>

<?php include_once "./partials/navbar.php"?>


  <div class="d-flex flex-wrap  justify-content-around m-5" style="height: 33rem;">



    <form class="m-3 " action="admin2.php" method="POST" style="width:35rem">
      <h2 class="fw-bold m-5 text-uppercase text-center">Shiping rates</h2>
      <div class="row m-4">
        <label for="service" class="col-sm-2 col-form-label  ">Service</label>
        <div class="col-sm-10">
          <select class="form-select" aria-label="Default select example" name="service" id="service" required>
            <option selected value="">Choose Service</option>
            <option value="UPS">UPS</option>
            <option value="FEDEX">FedEx</option>
            <option value="DHL">DHL</option>
          </select>
        </div>
      </div>
      <div class="row m-4">
        <label for="country" class="col-sm-2 col-form-label ">Country</label>
        <div class="col-sm-10">
          <input type="text" name="country" class="form-control" id="country" required>
        </div>
      </div>
      <div class="row m-4">
        <label for="weight" class="col-sm-2 col-form-label ">Weight(KG)</label>
        <div class="col-sm-10">
          <input type="text" name="weight" class="form-control" id="weight" required>
        </div>
      </div>
      <div class="row m-4">
        <label for="cost" class="col-sm-2 col-form-label ">Cost</label>
        <div class="col-sm-10">
          <input type="text" name="cost" class="form-control" id="cost" required>
        </div>
      </div>

      <div class="text-center">
        <button type="submit" id="updatebtn" name="updatebtn" class="btn btn-danger m-4" style="border-radius:0">Update</button>
      </div>

    </form>
    <div id="ratetable" style="height:33rem;overflow:scroll;"> </div>

  </div>
</body>
<script src="./js/jquery.min.js"></script>
<script src="./js/validation.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script>
  
  const showratetable = () => {
    $.ajax({
      url: "./ajax/ratedata.php",
      type: "POST",

      cache: false,
      success: function(result) {
        $("#ratetable").html(result);

      }
    });
  }
  $("#country").blur(() => {
    let tmp = $("#country").val();
    tmp = tmp.toUpperCase();
    $("#country").val(tmp)
  })
  $(document).ready(function() {

    showratetable();
  })
  $("#updatebtn").click(function() {
    showratetable();
  })

  const deleterate = (service, country, weight) => {
    var check = confirm("Do you want to delete rates of " + service + "  " + country + "  " + weight + " ?");
    if (check) {
      $.ajax({
        url: "./ajax/deleterate.php",
        type: "POST",
        data: {
          service: service,
          country: country,
          weight: weight
        },
        cache: false,
        success: function() {
          showratetable();
        }
      })
    }
  }
</script>

</html>
<?php
if (isset($_POST["updatebtn"])) {
  $count = 0;
  $service = $_POST["service"];
  $country = $_POST["country"];
  $weight = $_POST["weight"];
  $cost = $_POST["cost"];


  $sql = "select * from ratetbl where courierservice='" . $service . "' and country='" . $country . "' and weight='" . $weight . "'";
  $res = mysqli_query($con, $sql);
  $count = mysqli_num_rows($res);
?>
  <?php
  if ($count == 1) {
    $sql = "update ratetbl set cost='" . $cost . "' where country ='" . $country . "' and weight='" . $weight . "'and courierservice='" . $service . "'";
    $res = mysqli_query($con, $sql);
    $count = 0;
    if ($res) {

  ?> <script>
        alert("rate updated !");
      </script>
    <?php

    }
  } else {
    $sql1 = "insert into ratetbl values ('" . $country . "' ,'" . $weight . "','" . $cost . "','" . $service . "','')";
    $res1 = mysqli_query($con, $sql1);

    if ($res1) {

    ?> <script>
        alert("New rates inserted!")
      </script>
<?php

    }
  }
}

?>