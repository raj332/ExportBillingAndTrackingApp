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
            font-family: Verdana, Geneva, Tahoma, sans-serif
  }

    </style>
</head>
<?php include './dbconnection.php';
$sql = "select * from billtbl where billno ='" . $_GET['bno'] . "'";
$res = mysqli_query($con, $sql);
$data = mysqli_fetch_array($res);

$sql1 = "select * from parceltbl where trackingno='" . $data['trackingno'] . "'";
$res1 = mysqli_query($con, $sql1);
$data1 = mysqli_fetch_array($res1);

$sql2 = "select * from clienttbl where clientid='" . $data1['senderid'] . "'";
$res2 = mysqli_query($con, $sql2);
$sdata = mysqli_fetch_array($res2);

$sql3 = "select * from clienttbl where clientid='" . $data1['receiverid'] . "'";
$res3 = mysqli_query($con, $sql3);
$rdata = mysqli_fetch_array($res3);
?>

<body class="bg-dark">
    <form   method="POST">

        <h5 class="text-light text-center m-3">Edit Bill no : <?php echo $_GET['bno']; ?></h5>

        <div class="d-flex flex-wrap mx-5 mb-5 justify-content-around p-3 bg-light" style="position:relative ;overflow: hidden; margin-top:1rem;border-radius:1rem">

            <div class="p-1 " style="width:30rem ">
                <!-- <h3 class="fw-bold m-3 text-uppercase text-center">Sender Details</h3> -->
                <div class="col-10 m-2">
                    <label for="sendername" class="form-label">Sender Name</label>
                    <input type="text" class="form-control" name="sendername1" id="sendername" value= "<?php echo $sdata['name']; ?>" required>
                    <input type="text" class="form-control" name="senderid1" id="senderid" value="<?php echo $data1['senderid']; ?>" hidden>
                    <input type="text" class="form-control" name="billno1" id="billno" value="<?php echo $_GET['bno']; ?>" hidden>
                </div>
                <div class="col-10 m-2">
                    <label for="sendercontact" class="form-label">Sender Contact No</label>
                    <input type="number" class="form-control" name="sendercontact1" id="sendercontact" value="<?php echo $sdata['contactno']; ?>" required>
                </div>
                <div class="col-10 m-2">
                    <label for="inputAddress" class="form-label">Sender Address</label>
                    <textarea class="form-control" id="senderaddress" name="senderaddress1" rows="3" required><?php echo $sdata['address']; ?></textarea>
                </div>
            </div>
            <div class="p-1" style="width:30rem ;position: relative">
                <!-- <h3 class="fw-bold m-3 text-uppercase text-center">Receiver Details</h3> -->
                <div class="col-10 m-2">

                    <label for="inputEmail4" class="form-label">Receiver Name</label>
                    <input type="text" class="form-control" name="receivername1" id="receivername" value="<?php echo $rdata['name']; ?>">
                    <input type="text" class="form-control" name="receiverid1" id="receiverid" value="<?php echo $data1['receiverid']; ?>" hidden>
                </div>
                <div class="col-10 m-2">
                    <label for="inputPassword4" class="form-label">Receiver Contact No</label>
                    <input type="number" class="form-control" name="receivercontact1" id="receivercontact" value="<?php echo $rdata['contactno']; ?>">
                </div>
                <div class="col-10 m-2">
                    <label for="inputAddress" class="form-label">Receiver Address</label>
                    <textarea class="form-control" id="receiveraddress" name="receiveraddress1" rows="3" required><?php echo $rdata['address']; ?></textarea>
                </div>
            </div>

            <div class=" p-1  row g-3 container " style="position:relative;width :38rem">
                <div class="col-md-3 m-2">
                    <label for="date" class="form-label" >Billing Date</label>
                    <input type="date" class="form-control" value="<?php echo $data['date'] ?>" id="billingdate1" name="billingdate1" required>
                </div>
                <div class="col-md-3 m-2">
                    <label for="service"  class="form-label">Courier Service</label>
                    <select class="form-select" aria-label="Default select example" name="service1" id="service" required>
                        <option value="">Choose Service</option>
                        <option value="UPS">UPS</option>
                        <option value="FEDEX">FedEx</option>
                        <option value="DHL">DHL</option>
                    </select>
                </div>
                <div class="col-md-3 m-2">
                    <label for="Quantity" class="form-label">Quantity</label>
                    <input type="text" class="form-control" id="quantity" name="quantity1" value="<?php echo $data1['quantity'] ?>" required>
                </div>
                <div class="col-md-5 m-2">
                    <label for="tracking" class="form-label">Tracking No</label>
                   
                    <input type="number" class="form-control" name="trackingno1" id="trackingno" value="<?php echo $data['trackingno'] ?>" required>
                    <input type="number" class="form-control" name="cstrackingno1" id="cstrackingno" value="<?php echo $data['cstrackingno'] ?>"hidden >
                </div>

                <div class="col-md-5 m-2">
                    <label for="items" class="form-label">Items</label>
                    <textarea class="form-control" id="items" rows="3" name="items1" value="<?php echo $data1['item'] ?>" required><?php echo $data1['item']; ?></textarea>
                </div>

            </div>
            <div class="p-1 row g-3" style="position:relative ;width :38rem">
                <div class="col-md-10 m-2">
                    <label for="weight" class="form-label">Weight</label>
                    <input type="number" class="form-control" id="weight" name="weight1" value="<?php echo $data1['weight'] ?>" required>
                </div>
                <div class="col-md-5 m-2">
                    <label for="source" class="form-label">Source Country</label>
                    <input type="text" class="form-control" id="source" name="source1" value="<?php echo $data1['source'] ?>" required>
                </div>
                <div class="col-md-5 m-2">
                    <label for="destination" class="form-label">Destination Country</label>
                    <input type="text" class="form-control" id="destination" name="destination1" value="<?php echo $data1['destination'] ?>" required>
                </div>

                <div class="col-md-5 m-2">
                    <label for="cost" class="form-label">Total Cost </label>
                    <input type="number" class="form-control" readonly id="cost" name="cost1" value="<?php echo $data['cost'] ?>" required>
                </div>
                <div class="col-md-5 m-2">
                    <label for="method" class="form-label">Payment Method</label>
                    <select class="form-select" aria-label="Default select example" id="paymentmethod" name="paymentmethod1" required>
                        <option value="">Select Payment Method</option>
                        <option value="online-transfer">Online-transfer</option>
                        <option value="cheque">Cheque</option>
                        <option value="cash">Cash</option>
                    </select>
                </div>

            </div>
            <div>
                <button type="button" class="btn btn-secondary mx-3 px-3 " onclick="handleclose()">Close</button>
                <button type="submit" class="btn btn-danger mx-3 px-3" name="updatebtn" id="updatebtn">Update</button>
            </div>

        </div>



    </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<script src="./js/jquery.min.js"></script>
<script>
     $("#trackingno").blur(function() {
        generatecs();
    })
    const generatecs=()=>{
     let cstno=0;
     let tno= $("#trackingno").val();
     let service= $("#service").val();
     if(tno != "" && service!=""){
       switch(service){
         case "FEDEX":  cstno =  tno*2 +'1'; 
                 break;
          case "UPS":  cstno= tno*2 +'2'
                 break;
          case "DHL" :cstno =tno*2+'3';
                 break;
       }
       $("#cstrackingno").prop('value',cstno)
     }
 }
    const handleclose=()=>{
        window.location="billing.php";
    }
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
    $("#service").change(function() {
        generatecs();
        ratecalculate();
    })
    $("#quantity").change(function() {
        ratecalculate();
    })

       
        $("#service").val("<?php echo $data1['courierservice']; ?>")
        $("#paymentmethod").val("<?php echo $data['paymentmethod']; ?>")
</script>
<script src="./js/validation.js"></script>
</html>
<?php


if (isset($_POST["updatebtn"])) {

    $rname = $_POST['receivername1'];
    $sname = $_POST['sendername1'];
    $rcontact = $_POST["receivercontact1"];
    $scontact = $_POST["sendercontact1"];
    $raddress = $_POST["receiveraddress1"];
    $saddress = $_POST["senderaddress1"];
    $date = $_POST["billingdate1"];
    $service = $_POST["service1"];
    $quantity = $_POST["quantity1"];
    $trackingno = $_POST["trackingno1"];
    $items = $_POST["items1"];
    $weight = $_POST["weight1"];
    $source = $_POST["source1"];
    $destination = $_POST["destination1"];
    $totalcost = $_POST["cost1"];
    $method = $_POST["paymentmethod1"];
    $sid = $_POST['senderid1'];
    $rid = $_POST['receiverid1'];
    $billno = $_POST['billno1'];
$cstrackingno=$_POST['cstrackingno1'];
    $sql = "UPDATE clienttbl SET name='" . $sname . "',contactno='" . $scontact . "',address='" . $saddress . "' WHERE clientid='" . $sid . "'";
    $res = mysqli_query($con, $sql);
    if ($res) {

                    $sql = "UPDATE clienttbl SET  name='" . $rname . "',contactno='" . $rcontact . "',address='" . $raddress . "' WHERE clientid='" . $rid . "'";
                    $res = mysqli_query($con, $sql);

                    if ($res) {
                 
                        $sql = "update billtbl set date='" . $date . "',cost='" . $totalcost . "',paymentmethod='" . $method . "',cstrackingno='".$cstrackingno."' where billno= '" . $billno . "'";
                     
                        $res = mysqli_query($con, $sql);

                        if ($res) {
                        
                            $sql = "update parceltbl set  item='" . $items . "',weight='" . $weight . "',quantity='" . $quantity . "',source='" . $source . "',destination='" . $destination . "',courierservice='" . $service . "',trackingno='" . $trackingno . "' where trackingno='" . $data['trackingno'] . "' ";
                          
                            $res = mysqli_query($con, $sql);
                            if ($res) {
                                ?> <script>
                                alert("Data Updated successfully!!!")
                                window.location='billing.php';
                            </script> <?php
                           
                            }
                        }
                    }
                }
            }

                                ?>