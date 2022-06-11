<?php
$con =mysqli_connect("localhost","root","","logisticbilldb");
if(!$con){
?>
<script>
    alert("Database Connection failed");
    </script>
<?php
}
?>