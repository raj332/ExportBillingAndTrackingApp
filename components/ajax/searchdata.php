<table class="table table-bordered m- text-center" id="datatbl" style="width:100%">
    <tr>
        <td>Bill No</td>
        <td>Date</td>
        <td>Sender Name</td>
        <td>Items</td>
        <td>Tracking no</td>
        <td>CsTrackin no</td>
        <td>Service</td>
        <td>Source</td>
        <td>Destination</td>
        <td>cost</td>
        <td>Username</td>
    </tr>
    <?php
    include "../dbconnection.php";
    $res = "";
    $field = $_POST['field'];
    $value = $_POST['fieldvalue'];
    $date = $_POST['date'];

    if ($date != '' && $value == '') {
        $sql = "select billno,date,c.name,b.item,a.trackingno,cstrackingno,b.courierservice,b.source ,b.destination ,cost,username from billtbl a ,parceltbl b,clienttbl c where a.senderid = c.clientid and a.trackingno = b.trackingno and date='" . $date . "'";
        $res = mysqli_query($con, $sql);
        while ($data = mysqli_fetch_array($res)) {

    ?>
            <tr>
                <td><?php echo $data["billno"] ?></td>
                <td><?php echo $data["date"] ?></td>
                <td><?php echo $data["name"] ?></td>
                <td><?php echo $data["item"] ?></td>
                <td><?php echo $data["trackingno"] ?></td>
                <td><?php echo $data["cstrackingno"] ?></td>
                <td><?php echo $data["courierservice"] ?></td>
                <td><?php echo $data["source"] ?></td>
                <td><?php echo $data["destination"] ?></td>
                <td><?php echo $data["cost"] ?></td>
                <td><?php echo $data["username"] ?></td>
            </tr>
            <?php

        }
    } elseif ($value != '' && $field != '0') {

        switch ($field) {
            case "Billno": {
                    $sql = "select billno,date,c.name,b.item,a.trackingno,cstrackingno,b.courierservice,b.source ,b.destination ,cost,username from billtbl a ,parceltbl b,clienttbl c where a.senderid = c.clientid and a.trackingno = b.trackingno and billno='" . $value . "'";
                    $sql1 = "select billno,date,c.name,b.item,a.trackingno,cstrackingno,b.courierservice,b.source ,b.destination ,cost,username from billtbl a ,parceltbl b,clienttbl c where a.senderid = c.clientid and a.trackingno = b.trackingno and billno='" . $value . "' and date='" . $date . "'";
                };
                break;
            case "CourierService": {
                    $sql = "select billno,date,c.name,b.item,a.trackingno,cstrackingno,b.courierservice,b.source ,b.destination ,cost,username from billtbl a ,parceltbl b,clienttbl c where a.senderid = c.clientid and a.trackingno = b.trackingno and b.courierservice='" . $value . "'";
                    $sql1 = "select billno,date,c.name,b.item,a.trackingno,cstrackingno,b.courierservice,b.source ,b.destination ,cost,username from billtbl a ,parceltbl b,clienttbl c where a.senderid = c.clientid and a.trackingno = b.trackingno and b.courierservice='" . $value . "' and date='" . $date . "'";
                };
                break;
            case "TrackingNo": {
                    $sql = "select billno,date,c.name,b.item,a.trackingno,cstrackingno,b.courierservice,b.source ,b.destination ,cost,username from billtbl a ,parceltbl b,clienttbl c where a.senderid = c.clientid and a.trackingno = b.trackingno and a.trackingno='" . $value . "'";
                    $sql1 = "select billno,date,c.name,b.item,a.trackingno,cstrackingno,b.courierservice,b.source ,b.destination ,cost,username from billtbl a ,parceltbl b,clienttbl c where a.senderid = c.clientid and a.trackingno = b.trackingno and a.trackingno='" . $value . "'and date='" . $date . "'";
                };
                break;
            case "DestCountry": {
                    $sql = "select billno,date,c.name,b.item,a.trackingno,cstrackingno,b.courierservice,b.source ,b.destination ,cost,username from billtbl a ,parceltbl b,clienttbl c where a.senderid = c.clientid and a.trackingno = b.trackingno and b.destination='" . $value . "'";
                    $sql1 = "select billno,date,c.name,b.item,a.trackingno,cstrackingno,b.courierservice,b.source ,b.destination ,cost,username from billtbl a ,parceltbl b,clienttbl c where a.senderid = c.clientid and a.trackingno = b.trackingno and b.destination='" . $value . "'and date='" . $date . "'";
                }
                break;
            case "CSTrackingNo": {
                    $sql = "select billno,date,c.name,b.item,a.trackingno,cstrackingno,b.courierservice,b.source ,b.destination ,cost,username from billtbl a ,parceltbl b,clienttbl c where a.senderid = c.clientid and a.trackingno = b.trackingno and cstrackingno='" . $value . "'";
                    $sql1 = "select billno,date,c.name,b.item,a.trackingno,cstrackingno,b.courierservice,b.source ,b.destination ,cost,username from billtbl a ,parceltbl b,clienttbl c where a.senderid = c.clientid and a.trackingno = b.trackingno and cstrackingno='" . $value . "' and date='" . $date . "'";
                }
                break;
            case "BillerName": {
                    $sql = "select billno,date,c.name,b.item,a.trackingno,cstrackingno,b.courierservice,b.source ,b.destination ,cost,username from billtbl a ,parceltbl b,clienttbl c where a.senderid = c.clientid and a.trackingno = b.trackingno and username='" . $value . "'";
                    $sql1 = "select billno,date,c.name,b.item,a.trackingno,cstrackingno,b.courierservice,b.source ,b.destination ,cost,username from billtbl a ,parceltbl b,clienttbl c where a.senderid = c.clientid and a.trackingno = b.trackingno and username='" . $value . "'  and date='" . $date . "'";
                }
                break;
        }
        if ($date == '') {
            $res = mysqli_query($con, $sql);
        } else {
            $res = mysqli_query($con, $sql1);
        }

        if($res) {
            while ($data = mysqli_fetch_array($res)) {

            ?>
                <tr>
                    <td><?php echo $data["billno"] ?></td>
                    <td><?php echo $data["date"] ?></td>
                    <td><?php echo $data["name"] ?></td>
                    <td><?php echo $data["item"] ?></td>
                    <td><?php echo $data["trackingno"] ?></td>
                    <td><?php echo $data["cstrackingno"] ?></td>
                    <td><?php echo $data["courierservice"] ?></td>
                    <td><?php echo $data["source"] ?></td>
                    <td><?php echo $data["destination"] ?></td>
                    <td><?php echo $data["cost"] ?></td>
                    <td><?php echo $data["username"] ?></td>
                </tr>
    <?php
            }
        }else{
            ?><h3 class="m-3 text-center">No data Found !!</h3><?php
        }
    }else
    {
        ?><h3 class="m-3 text-center">No data Found !!</h3><?php
    }
    ?>
</table>