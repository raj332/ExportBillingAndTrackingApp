<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Page Title</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <script src="./js/jquery.min.js"></script>
</head>
<style>
  
        html,
        body {
            margin: 0px;
            padding: 0px;
            font-family: Geneva, Tahoma, sans-serif
  }

    </style>


<body>
  <?php include "dbconnection.php" ?>
  <?php include_once "./partials/navbar.php"?>

  <div id='searchform' class='d-flex flex-wrap p-3 justify-content-center'>
    <div class="m-3">
      <label for="date" class="form-label">Billing Date</label>
      <input type="date" class="form-control" id="billingdate" name="billingdate">
    </div>
    <div class="m-3">
      <label for="date" class="form-label">Search by</label>
      <select class="form-select" value="0" aria-label="Default select example" name="field" id="field">
        <option value="0"> --- Select field --- </option>
        <option value="Billno"> Bill no</option>
        <option value="CourierService"> Courier Service </option>
        <option value="TrackingNo">Tracking no</option>
        <option value="DestCountry">Destination Country</option>
        <option value="CSTrackingNo">CS-Tracking no</option>
        <option value="BillerName">Biller Name</option>
      </select>
    </div>
    <div class="m-3">
      <label for="inputvalue" class="form-label" id="fieldlabel"></label>
      <input type="text" class="form-control" name="inputvalue" id="inputvalue">
    </div>


    <div class='m-3 w-100 text-center'>
      <button class="btn btn-danger" type="submit" name="searchbtn" id='searchbtn' style="border-radius:0"> Search </button>
      <button class="btn btn-danger" type="button" name="downloadbtn" id='downloadbtn' style="border-radius:0" onclick="exportData()"> Download results </button>

    </div>
  </div>

  <div class="m-3" style="overflow:scroll;" id="billtable">

  </div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<script>
  $(document).ready(function() {
    showbilltable();
  })

  $('#searchbtn').click(function() {
   
    let date = $('#billingdate').val();
    let field = $('#field').val();
    let fieldvalue = $('#inputvalue').val();

    $.ajax({

      url :'./ajax/searchdata.php',
      type: 'POST',
      data: {
        date: date,
        field: field,
        fieldvalue: fieldvalue
      },
      cache: false,
      success: function(result) {
        $("#billtable").html(result);
      }


    })
  })
  $('#field').change(function() {
    let field = $('#field').val()
    if (field != 0) {
      $('#fieldlabel').text(field);
    }
  })
  const showbilltable = () => {
    let username = $("#username").html();

    $.ajax({
      url: "./ajax/billdata.php",
      type: "POST",
      data: {
        username: username,
        biller: 0
      },
      cache: false,
      success: function(result) {

        $("#billtable").html(result);

      }
    });
  }

  const exportData=()=>{
   
  }
</script>

</html>