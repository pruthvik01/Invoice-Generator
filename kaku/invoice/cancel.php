<?php
include('../connection.inc.php'); ?>


<?php
if (isset($_GET['id'])) {
    $num = $_GET['id'];

    $sql = "delete from bill where invoice_no='$num'";
    $res = mysqli_query($con, $sql);
    $delete="delete from other_details where invoice_no='$num'";
    $res1=mysqli_query($con,$delete);
    $delete_data="delete from data where invoice_no='$num'";
    $res2=mysqli_query($con,$delete_data);
    header('location:mahavir_index.php');

}
?>