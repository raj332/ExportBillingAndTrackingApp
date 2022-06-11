<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Page Title</title>
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

<body>
  <?php include "dbconnection.php" ?>


  <?php include_once "./partials/navbar.php"?>
  <div class="d-flex flex-wrap  justify-content-around m-5 " style="overflow:hidden">

    <!-----------------------------------display----------------------------------------------------------------------------------->
    


    <form action="admin1.php" method="POST" class="py-5" style="width:35rem;height: 33rem">
      <h2 class="fw-bold m-5 text-uppercase text-center">Add New User</h2>
      <div class="row m-4">
        <label for="username" class="col-sm-2 col-form-label  ">Username</label>
        <div class="col-sm-10">
          <input type="text" name="username" class="form-control" id="usernamefield" required>
        </div>
      </div>
      <div class="row m-4">
        <label for="password" class="col-sm-2 col-form-label ">Password</label>
        <div class="col-sm-10">
          <input type="password" name="password" class="form-control" id="password" required>
        </div>
      </div>
      <div class="text-center">
        <button type="submit" id="addbtn" name="addbtn" class="btn btn-danger m-4" style="border-radius:0 ">Add User</button>
      </div>

    </form>
    <div style="overflow-y:scroll;height: 33rem" id="usertable">
    </div>
  </div>








</body>

<script src="./js/jquery.min.js"></script>

<script src="./js/validation.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script>
  

  const showusertable = () => {
    $.ajax({
      url: "./ajax/userdata.php",
      type: "POST",

      cache: false,
      success: function(result) {
        $("#usertable").html(result);

      }
    });
  }
  $(document).ready(function() {
    showusertable();
  })

  $("#addbtn").click(function() {
    showusertable();
  })

  const deleteuser = (user) => {
    var check = confirm("Do you want to delete User " + user + " ?");
    if (check) {
      $.ajax({
        url: "./ajax/deleteuser.php",
        type: "POST",
        data: {
          user: user,
        },
        cache: false,
        success: function() {
          showusertable();
        }
      });
    }

  }
</script>

</html>
<?php
if (isset($_POST["addbtn"])) {
  $username = $_POST["username"];
  $pass = $_POST["password"];


  $sql = "insert into usertbl values (?,?)";
  $stm = mysqli_prepare($con, $sql);
  mysqli_stmt_bind_param($stm, 'ss', $username, $pass);
  $res = mysqli_stmt_execute($stm);
  if ($res) {
?> <script>
      alert("New user added !")
    </script>

<?php

  }
} ?>