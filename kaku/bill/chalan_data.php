<?php
include('../connection.inc.php');
if(isset($_POST['submit'])){
    $date=$_POST['date'];
    $tr=$_POST['tr'];
    $brand=$_POST['brand'];
    $qty=$_POST['product'];
    $total_quantity=$_POST['total_quantity'];
    $total_rate=$_POST['total_rate'];
    $trans_charge=$_POST['trans_charge'];
    $other_charge=$_POST['other_charge'];
    $container_no=$_POST['container_no'];
    $empty_qty=$_POST['empty_qty'];
    $empty_brand=$_POST['empty_brand'];
    $inn = mysqli_query($con, "select invoice_no from chalan_bill order by `id` DESC LIMIT 1");
    $row = mysqli_fetch_assoc($inn);
    $num = $row['invoice_no'];
    $num++;
    for($t=0;$t<count($brand);$t++){
        $total=$total_quantity[$t] * $total_rate[$t];
        $query=mysqli_query($con,"INSERT INTO `chalan_bill`(`brand_id`, `chalan_id`, `tr`, `quantity`, `price`, `total`, `chalan_date`,`invoice_no`,`transport_charge`,`other_charge`,`container_no`,`empty_brand_id`,`empty_brand_qty`) VALUES ('$brand[$t]','$qty[$t]','$tr','$total_quantity[$t]','$total_rate[$t]','$total','$date','$num','$trans_charge','$other_charge','$container_no','$empty_brand','$empty_qty')");
    }
    header("location:bill_temp.php?id=$num");
  
}

?>