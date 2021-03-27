<?php
include('../connection.inc.php'); 
if (isset($_GET['id'])) {
    $num = $_GET['id'];

    $sql = "delete from chalan_bill where invoice_no='$num'";
    $res = mysqli_query($con, $sql);
    header('location:complete_invoice.php');
}
?>