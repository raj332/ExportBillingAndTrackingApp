
    <?php
  include './dbconnection.php';
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

require_once '../vendor/autoload.php';
$print="";
$print.="<div class='invoice-box'>
<table cellpadding='0' cellspacing='0'>
    <tr class='top'>
        <td colspan='2'>
            <table>
                <tr>
                    <td class='title'>
                    <img src='../imgs/mainicon.png' style='width: 8rem' />
                    </td>

                    <td>
                        <h1 id='company-name'>SR Exports</h1><br/>
                        GST No. : 758964585635<br/>
                        Billing Date: $data[date]<br />
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    </table>
    <div id='company-info'>
         <h3>   Surat, Guj, India. <a href='https://rajrpatel.me/' style='text-decoration:none;color:red'>www.rajrpatel.me</a>
           cpr19846@gmail.com</h3>
    </div>
    <table cellpadding='0' cellspacing='0'>
     <tr class='information'>
        <td colspan='2'>
            <table>
                <tr>
                    <td>

                        <h2>Shipper</h2><br/> 
                        Name <h3>$sdata[name]</h3><br />
                        Contact Address <br>
                        <h3>$sdata[address]</h3><br />
                        
                    </td>

                    <td>
                    
                        <h2>Recipient</h2><br/>
                         Name <h3>$rdata[name]</h3><br />
                        Contact Address <br>
                        <h3>$rdata[address]</h3><br />
                        
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr class='heading'>
        <td>Tracking Number </td>

        <td>$data[cstrackingno]</td>
    </tr>
    <tr class='heading'>
    <td>Pieces </td>

    <td>$data1[quantity]</td>
    </tr>
    <tr class='heading'>
        <td>Total Weight </td>

        <td>$data1[weight] kg.</td>
    </tr>
    <tr class='heading'>
    <td>Via </td>

    <td>Air</td>
</tr>

    <tr class='item'>
        <td>Total Cost </td>

        <td>Rs. $data[cost]</td>
    </tr>
</table>
<div id='footer'>
<table>
<tr class='item'>
        <td>Shipper's Signature </td>

        <td>Employee Signature</td>
    </tr>
</table>

</div>
</div>"

;


$print.="<style>
body{
    font-family:Verdana, Geneva, Tahoma, sans-serif
}
.invoice-box {
    max-width: 800px;
    height:100%;
    margin: auto;
    padding: 30px;
    border: 1px solid #eee;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
    font-size: 16px;
    line-height: 24px;
    font-family:Verdana, Geneva, Tahoma, sans-serif
    color: #555;
}

#footer{
    margin-top:20%;

}

#company-name{
    font-size:3rem;
}
#company-info{
   
  text-align:center;
  
}

.invoice-box table {
    width: 100%;
    line-height: inherit;
    text-align: left;
    margin-top:2rem;
    
}

.invoice-box table td {
    padding: 5px;
    vertical-align: top;
}

.invoice-box table tr td:nth-child(2) {
    text-align: right;
}

.invoice-box table tr.top table td {
    padding-bottom: 20px;
}

.invoice-box table tr.top table td.title {
    font-size: 45px;
    line-height: 45px;
    color: #333;
}

.invoice-box table tr.information table td {
   
    padding-bottom: 40px;
}

.invoice-box table tr.heading td {
    background: #eee;
    border-bottom: 1px solid #ddd;
    font-weight: bold;
}

.invoice-box table tr.details td {
    padding-bottom: 20px;
}

.invoice-box table tr.item td {
    border-bottom: 1px solid #eee;
}


.invoice-box table tr.total td:nth-child(2) {
    border-top: 2px solid #eee;
    font-weight: bold;
}
</style>";
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($print);
$mpdf->Output();
?>


