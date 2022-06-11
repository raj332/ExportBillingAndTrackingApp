<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Billing</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <style>
        html,
        body {
            margin: 0px;
            padding: 0px;
            font-family: Geneva, Tahoma, sans-serif
  }

    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light m-0 p-0" style="font-weight:bold; overflow:hidden;">
    <div class="container-fluid p-0">
      <h1> <a class="navbar-brand bg-dark m-0" href="./index.php" style=" font-size:1.8rem; color:white;padding:1rem">S<font color="#dc3545">R</font> EXPORTS</a></h1>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse m-0 " id="navbarSupportedContent" ">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Generate Bills</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Rate & Ship</a>
          </li>
        
        </ul>
        <div class="d-flex">
                    <span id="username" class="p-3"><?php session_start();
                                                                echo $_SESSION["username"] ?></span>
                    <a href="./login.php"> <button class="btn btn-danger mx-2 px-4 p-3" style=" border-radius:0;font-weight:bold;">Logout</button></a>
                </div>
      </div>
    </div>
  </nav>
    
    <form action="billing.php" method="POST" id="form1" name="form1">
        <div class="d-flex flex-wrap  justify-content-around p-3" style="width: 100%;position:relative ;overflow: hidden;">
            <div class="p-2 " style="width:35rem ;height: 22rem; ">
                <!-- <h3 class="fw-bold m-3 text-uppercase text-center">Sender Details</h3> -->
                <div class="col-10 m-3">
                    <label for="sendername" class="form-label">Sender Name</label>
                    <input type="text" class="form-control namebox" name="sendername" id="sendername" required>
                </div>
                <div class="col-10 m-3">
                    <label for="sendercontact" class="form-label">Sender Contact No</label>
                    <input type="number" class="form-control" name="sendercontact" id="sendercontact" required>
                </div>
                <div class="col-10 m-3">
                    <label for="inputAddress" class="form-label">Sender Address</label>
                    <textarea class="form-control" id="senderaddress" name="senderaddress" rows="3" required></textarea>
                </div>
            </div>
            <div class="p-2" style="width:35rem ;position: relative;height: 22rem;">
                <!-- <h3 class="fw-bold m-3 text-uppercase text-center">Receiver Details</h3> -->
                <div class="col-10 m-3">

                    <label for="inputEmail4" class="form-label">Receiver Name</label>
                    <input type="text" class="form-control namebox" name="receivername" id="receivername" required>
                </div>
                <div class="col-10 m-3">
                    <label for="inputPassword4" class="form-label">Receiver Contact No</label>
                    <input type="number" class="form-control" name="receivercontact" id="receivercontact" required>
                </div>
                <div class="col-10 m-3">
                    <label for="inputAddress" class="form-label">Receiver Address</label>
                    <textarea class="form-control" id="receiveraddress" name="receiveraddress" rows="3" required></textarea>
                </div>
            </div>

            <div class=" p-2  row g-3 container " style="position:relative;width :40rem">
                <div class="col-md-3 m-3">
                    <label for="date" class="form-label">Billing Date</label>
                    <input type="date" class="form-control" id="billingdate" name="billingdate" required>
                </div>
                <div class="col-md-3 m-3">
                    <label for="service" class="form-label">Courier Service</label>
                    <select class="form-select" value="" aria-label="Default select example" name="service" id="service" required>
                        <option value="">Choose Service</option>
                        <option value="UPS">UPS</option>
                        <option value="FEDEX">FedEx</option>
                        <option value="DHL">DHL</option>
                    </select>
                </div>
                <div class="col-md-3 m-3">
                    <label for="Quantity" class="form-label">Pieces</label>
                    <input type="text" class="form-control" id="quantity" name="quantity" required>
                </div>
                <div class="col-md-5 m-3">
                    <label for="tracking" class="form-label">Tracking No</label>
                    <input type="number" class="form-control" name="trackingno" id="trackingno" required>
                </div>

                <input type="number" class="form-control" name="cstrackingno" id="cstrackingno" hidden>
                <div class="col-md-5 m-3">
                    <label for="items" class="form-label">Items</label>
                    <textarea class="form-control" id="items" rows="3" name="items" required></textarea>
                </div>

            </div>
            <div class="p-2 row g-3" style="position:relative ;width :40rem">
                <div class="col-md-10 m-3">
                    <label for="weight" class="form-label">Weight</label>
                    <input type="number" class="form-control" id="weight" name="weight" required>
                </div>
                <div class="col-md-5 m-3">
                    <label for="source" class="form-label">Source Country</label>
                    <input type="text" class="form-control" id="source" name="source" required>
                </div>
                <div class="col-md-5 m-3">
                    <label for="destination" class="form-label">Destination Country</label>
                    <input type="text" class="form-control" id="destination" name="destination" required>
                </div>

                <div class="col-md-5 m-3">
                    <label for="cost" class="form-label">Total Cost </label>
                    <input type="number" class="form-control" readonly id="cost" name="cost" required>
                </div>
                <div class="col-md-5 m-3">
                    <label for="method" class="form-label">Payment Method</label>
                    <select class="form-select" value="" aria-label="Default select example" id="paymentmethod" name="paymentmethod" required>
                        <option value="">Select Payment Method</option>
                        <option value="online-transfer">Online-transfer</option>
                        <option value="cheque">Cheque</option>
                        <option value="cash">Cash</option>
                    </select>
                </div>
            </div>

        </div>
        <div class="text-center">
            <button class="btn btn-danger m-3" type="submit" name="generatebtn" id="generatebtn" form="form1"  style="border-radius:0">Generate</button>
        </div>
    </form>
    <div style="width:100%;overflow:scroll;" id="billtable">

    </div>





</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<script src="./js/jquery.min.js">
</script>
<script>
    const updatebill = (bno) => {
        window.location.href = "updatebill.php?bno=" + bno;
    }
    const printbill = (bno) => {
        window.location.href = "printbill.php?bno=" + bno;
    }


    $(function() {

        var now = new Date();

        $("#billingdate").val(new Date().toISOString().substring(0, 10));
        showbilltable();


    })

    const showbilltable = () => {
        let username = $("#username").html();

        $.ajax({
            url: "./ajax/billdata.php",
            type: "POST",
            data: {
                username: username,
                biller: 1
            },
            cache: false,
            success: function(result) {

                $("#billtable").html(result);

            }
        });
    }
    //   $("#generatebtn").click(function(){
    //       showbilltable();
    //   })
    const ratecalculate = () => {
        let weight = $("#weight").val();

        let service = $("#service").val();
        let destination = $("#destination").val();
        let quantity = $("#quantity").val();

        if (weight != "" && service != "" && destination != "" && quantity != "") {
            $.ajax({
                url: "./ajax/costcounter.php",
                type: "POST",
                data: {
                    weight: weight,
                    service: service,
                    destination: destination,

                },
                cache: false,
                success: function(result) {
                    alert(result);
                    $("#cost").val(result);

                }
            });

        }
    }
    $("#destination").blur(function() {
        ratecalculate();
    })
    $("#weight").blur(function() {
        ratecalculate();
    })
    $("#trackingno").blur(function() {
        generatecs();
    })
    $("#service").change(function() {

        ratecalculate();
        generatecs();
    })
    $("#quantity").change(function() {
        ratecalculate();
    })
    const generatecs = () => {
        let cstno = 0;
        let tno = $("#trackingno").val();
        let service = $("#service").val();
        if (tno != "" && service != "") {
            switch (service) {
                case "FEDEX":
                    cstno = tno * 2 + '1';
                    break;
                case "UPS":
                    cstno = tno * 2 + '2'
                    break;
                case "DHL":
                    cstno = tno * 2 + '3';
                    break;
            }
            $("#cstrackingno").prop('value', cstno)
        }
    }

    const deletebill = (tno) => {
        var check = confirm("Do you want to delete bill of tno " + tno + " ?");
        if (check) {
            $.ajax({
                url: "./ajax/deletebill.php",
                type: "POST",
                data: {
                    tno: tno,
                },
                cache: false,
                success: function(result) {
                    showbilltable();
                    $("body").append(result);

                }
            });
        }

    }
</script>
    <script src="./js/validation.js"></script>
</html>
<?php
include "dbconnection.php";

if (isset($_POST["generatebtn"])) {

    $rname = $_POST["receivername"];
    $sname = $_POST["sendername"];
    $rcontact = $_POST["receivercontact"];
    $scontact = $_POST["sendercontact"];
    $raddress = $_POST["receiveraddress"];
    $saddress = $_POST["senderaddress"];
    $date = $_POST["billingdate"];
    $service = $_POST["service"];
    $quantity = $_POST["quantity"];
    $trackingno = $_POST["trackingno"];
    $cstrackingno = $_POST["cstrackingno"];
    $items = $_POST["items"];
    $weight = $_POST["weight"];
    $source = $_POST["source"];
    $destination = $_POST["destination"];
    $totalcost = $_POST["cost"];
    $method = $_POST["paymentmethod"];
    $username = $_SESSION["username"];
    $sid = 0;
    $rid = 0;
    $sql = "select * from clienttbl where name='" . $sname . "' and contactno='" . $scontact . "'";
    $res = mysqli_query($con, $sql);
    $count = mysqli_num_rows($res);
    if ($count > 0) {
    } else {

        $sql = "insert into clienttbl values('','" . $sname . "','" . $scontact . "','" . $saddress . "')";
        $res = mysqli_query($con, $sql);
    }

    $sql = "select * from clienttbl where name='" . $sname . "' and contactno='" . $scontact . "'";
    $res = mysqli_query($con, $sql);
    $data = mysqli_fetch_array($res);
    $sid = $data["clientid"];
    $res = false;
    $sql = "select * from clienttbl where name='" . $rname . "' and contactno='" . $rcontact . "'";
    $res = mysqli_query($con, $sql);
    $count = mysqli_num_rows($res);
    if ($count > 0) {
    } else {
        $sql = "insert into clienttbl values('','" . $rname . "','" . $rcontact . "','" . $raddress . "')";
        $res = mysqli_query($con, $sql);
    }

    $sql = "select * from clienttbl where name='" . $rname . "' and contactno='" . $rcontact . "'";
    $res = mysqli_query($con, $sql);
    $data = mysqli_fetch_array($res);
    $rid = $data["clientid"];
    $sql = "insert into parceltbl values('" . $trackingno . "','" . $items . "','" . $weight . "','" . $quantity . "','" . $source . "','" . $destination . "','" . $sid . "','" . $rid . "','" . $service . "')";
    $res = mysqli_query($con, $sql);
    if ($res) {
        $sql = "insert into billtbl values('','" . $date . "','" . $trackingno . "','" . $sid . "','" . $totalcost . "','" . $method . "','" . $username . "','" . $cstrackingno . "')";
        $res = mysqli_query($con, $sql);
        if ($res) {
?> <script>
                alert("data inserted")
            </script> <?php
                    }
                }
            }



                        ?>