<?php
require('../connection.inc.php');
    $date1=$_POST['date1'];
    $date2=$_POST['date2'];

    $sql=mysqli_query($con,"SELECT SUM(total) AS 'total_sum',SUM(gst) AS 'total_gst' FROM data WHERE invoice_date BETWEEN '$date1' AND '$date2'");
    $res=mysqli_fetch_assoc($sql);
    $json =json_encode($res);
    echo $json;
?>