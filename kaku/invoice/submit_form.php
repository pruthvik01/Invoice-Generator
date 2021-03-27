<?php
include('../connection.inc.php');
include('function.inc.php');

if (isset($_POST['submit'])) {

    $productArr = $_POST['product'];
    $id = $_POST['option_id'];
    $gst = $_POST['gstrate'];
    $qtyArr = $_POST['qty'];
    $priceArr = $_POST['price'];
    $delivery_note = $_POST['delivery_note'];
    $sref = $_POST['sref'];
    $buyer_order_no = $_POST['buyer_order_no'];
    $dispatch_document_no = $_POST['dispatch_document_no'];
    $dispatch_through = $_POST['dispatch_through'];
    $Bill_of_landing = $_POST['Bill_of_landing'];
    $mode_of_payment = $_POST['mode_of_payment'];
    $reference = $_POST['reference'];
    $delivery_note_date = $_POST['delivery_note_date'];
    $destination = $_POST['destination'];
    $mv_no = $_POST['mv_no'];
    $terms_of_delivery = $_POST['terms_of_delivery'];
    $date = $_POST['date'];
    $dated = $_POST['dated'];
    $freight_charge = $_POST['freight_charge'];
    $new_date = date('d-M-Y', strtotime($date));

    $sum = 0;
    $qty = 0;

    $sql = mysqli_query($con, "select * from users where id='$id'");
    $data = mysqli_fetch_assoc($sql);
    $j = 1;

    $inn = mysqli_query($con, "select invoice_no from bill order by `id` DESC LIMIT 1");
    $row = mysqli_fetch_assoc($inn);
    $num = $row['invoice_no'];
    $num++;

    for ($i = 0; $i < count($priceArr); $i++) {
        $total_price = $qtyArr[$i] * $priceArr[$i];
        $sql1 = mysqli_query($con, "INSERT INTO `bill` (`reciver_id`,`invoice_no`, `invoice_date`,`gst_rate`,`item_name`,`item_qty`,`item_price`,`total`,`freight charges`) VALUES ('$id',' $num','$date','$gst','$productArr[$i]','$qtyArr[$i]','$priceArr[$i]','$total_price','$freight_charge')");
    }


    $last_id = mysqli_insert_id($con);
    $query = mysqli_query($con, "select invoice_no from bill where id ='$last_id'");
    $row4 = mysqli_fetch_assoc($query);
    $invoice_number = $row4['invoice_no'];

    $other_query = mysqli_query($con, "INSERT INTO `other_details`(`invoice_no`, `delivery_note`, `mode_of_payment`, `suppliers_ref`, `other_references`, `buyers_order_no`, `dated`, `dispatch_document_no`, `delivery_date_note`, `dispatch_through`, `destination`, `bill`, `vehicle_no`, `terms_of_delivery`) VALUES ('$invoice_number','$delivery_note','$mode_of_payment','$sref','$reference','$buyer_order_no','$dated','$dispatch_document_no','$delivery_note_date','$dispatch_through','$destination','$Bill_of_landing','$mv_no ','$terms_of_delivery')");

    $detail_sql = mysqli_query($con, "select * from other_details where invoice_no='$invoice_number'");
    $detail_row = mysqli_fetch_assoc($detail_sql);


    $sqlv = "select * from bill,users where bill.invoice_no='$num' and bill.reciver_id=users.id";
    $resu = mysqli_query($con, $sqlv);
    $roww = mysqli_fetch_assoc($resu);
    $fcharge = $roww['freight charges'];
    $number = mysqli_num_rows($resu);

    $product_query = mysqli_query($con, "select * from product,bill where product.id=bill.item_name AND bill.invoice_no='$invoice_number'");
    echo  $total_price;
    echo $fcharge;
    echo $gst;
    $data_gst = (($total_price + $fcharge) * $gst) / 100;

    $final_amount=$total_price+ $data_gst +$fcharge;
    $data_insert_sql = mysqli_query($con, "INSERT INTO `data`(`invoice_no`, `amount`, `gst`, `freight charges`, `total`, `invoice_date`) VALUES ('$invoice_number','$total_price','$data_gst','$freight_charge','$final_amount','$date')");

    header('location:main_template.php?id='.$invoice_number.'');
}
?>