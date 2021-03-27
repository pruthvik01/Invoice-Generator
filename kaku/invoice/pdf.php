<?php
include('../connection.inc.php');
include('function.inc.php');
include('vendor/autoload.php');
if (isset($_GET['id'])) {
   $num=$_GET['id'];
    $sql = "select * from bill,users where bill.invoice_no='$num' and bill.reciver_id=users.id";
    $res = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($res);
    $date=$row['invoice_date'];
    $fcharge=$row['freight charges'];
    $new_date = date('d-M-Y', strtotime($date));
    $i = 0;
    $sum = 0;
    $qty=0;
    $j = 1;
    $sql1 = "select * from bill,users where bill.invoice_no='$num' and bill.reciver_id=users.id";
    $res1 = mysqli_query($con, $sql1);
    while ($row1 = mysqli_fetch_array($res1)) {
        $qtyArr[] = $row1['item_qty'];
        $priceArr[] = $row1['item_price'];
        $itemArr[] = $row1['item_name'];
    }
    $detail_sql=mysqli_query($con,"select * from other_details where invoice_no='$num'");
    $detail_row=mysqli_fetch_assoc($detail_sql);
    

$number = mysqli_num_rows($res);

$product_query=mysqli_query($con,"select * from product,bill where product.id=bill.item_name AND bill.invoice_no='$num'");

}
$html = '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {
            font-size:11px;
        }

        /Invoice/


        .invoice .top-right {
            text-align: right;
            padding-right: 20px;
        }

        .invoice .table-row {
            margin-left: 0px;
            margin-right: 0px;
            margin-top: 25px;
        }

        .invoice .payment-info {
            font-weight: 700;
        }

        .invoice .table-row .table>thead {
            border-top: 0.6px solid #ddd;
        }

        .invoice .table-row .table>thead>tr>th {
            border-bottom: none;
        }

        .invoice .table>tbody>tr>td {
            padding: 8px 20px;
        }

        .invoice .invoice-total {
            margin-right: 0px;
            font-size: 14px;
        }

        .invoice .last-row {
            border-bottom: 0.7px solid gray;
        }

        @media(max-width:575px) {

            .invoice .top-left,
            .invoice .top-right,
            .invoice .payment-details {
                text-align: center;
            }

            .invoice .from,
            .invoice .to,
            .invoice .payment-details {
                float: none;
                width: 100%;
                text-align: center;
                
            }

            .invoice .btn {
                margin-top: 10px;
            }
        }

        @media print {
            .invoice {
                width: 900px;
                height: 800px;
            }
        }

        table,th,td {
            border: 0.6px solid gray;
          }

        td {
            text-align: center;
        }

        th, td {
            padding: 5px;
        }

        .row .from{
            border-right: 0.8px solid gray;
          }

          .row .to{
            border-right: 0.8px solid gray;
          }

          .part{
            font-style:bold;
            font-size:13px;
          }

          .right th,td{
            padding-left:9px;
            padding-top:3px;
            padding-bottom:3px;
            text-align:left;
            font-weight:700;
          }

          .width{
            width:180px;
            height:25px;
          }
          
          .width-term{
            height:65px;
          }

          .pad{
              padding:8px;
          }

          .last{
              font-size:11px;
          }

          .last .span{
              font-weight:bold;
          }

          .declare{
              font-size:8px;
              margin-bottom:0px;
          }

    </style>

</head>

<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="invoic" style="text-align:center;">
        <h5><b>Tax Invoice</b></h5>
    </div>
    
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default invoice" id="invoice"  style="width: 100%;">
                
                    <div class="row" style="margin-bottom: 26px;margin-top: 15px; ">
                    
                        <div class="col-xs-4 from" style="margin-left: 15px;">
                            <p class="part" style="font-weight: bold;">Mahavir Enterprise<br></p>
                            <p>Shop No.: SF/206- Omkar Complex,<br>
                            Jani Sheri,Ghadialipole,<br>
                            Vadodara-390001<br>
                            Phone: 9879598114<br>
                            GSTIN/UIN: 24AJPPS2775L1ZG<br>
                            State Name: Gujarat, Code:24<br>
                            Email: parth0304@yahoo.com</p>

                            <hr style="padding:0px; margin:0px;">

                            <p class="part" style="padding-top:5px;font-weight: bold;">Buyer: ' . $row["name"]  . '</p>
                            <p> ' . $row["shop"] . '  <br>
                            ' . $row["area"] . '  <br>
                            ' . $row["city"] . ' - ' . $row["pin"] . '<br>
                            Phone: ' . $row["phone"] . '<br>
                            GSTIN/UIN:' . $row["gst"] . ' <br>
                            State Name: '. $row['state'] .', Code:'. $row['code'] .'<br>
                            Email: ' . $row["email"] . ' </p>
                        </div>
                        
                        <div class="col-xs-6 text-right payment-details"style="margin-left: 15px;">
                        <table class="right">
                        <thead>
                            <tr>
                                <td class="text-left width">Invoice No.<br>' . $row["invoice_no"] . '</td>
                                <td class="text-left width">Dated<br>' . $new_date. '</td>
                            </tr>
                            <tr>
                                <td class="text-left width">Delivery Note<br>'.$detail_row['delivery_note'].'</td>
                                <td class="text-left width">Mode/Terms of Payment<br>'.$detail_row['mode_of_payment'].'</td>
                            </tr>
                            <tr>
                                <td class="text-left width">Supplier&#8217;s Ref.<br>'.$detail_row['suppliers_ref'].'</td>
                                <td class="text-left width">Other Reference(s)<br>'.$detail_row['other_references'].'</td>
                            </tr>
                            <tr>
                                <td class="text-left width">Buyer&#8217;s Order No.<br>'.$detail_row['buyers_order_no'].'</td>
                                <td class="text-left width">Dated<br>'.date('d-M-Y', strtotime($detail_row['dated'])).'</td>
                            </tr>
                            <tr>
                                <td class="text-left width">Dispatch Document No.<br>'.$detail_row['dispatch_document_no'].'</td>
                                <td class="text-left width">Delivery Note Date<br>'.$detail_row['delivery_date_note'].'</td>
                            </tr>
                            <tr>
                                <td class="text-left width">Dispatch Through<br>'.$detail_row['dispatch_through'].'</td>
                                <td class="text-left width">Destination<br>'.$detail_row['destination'].'</td>
                            </tr>
                            <tr>
                                <td class="text-left width">Bill of Landing/LR-RR No.<br>'.$detail_row['bill'].'</td>
                                <td class="text-left width">Motor Vehicle No.<br>'.$detail_row['vehicle_no'].'</td>
                            </tr>
                            <tr>
                                <td class="text-left width-term" colspan="2">Terms of Delivery<br>'.$detail_row['terms_of_delivery'].'</td>
                            </tr>
                        </thead>
                        </table>
                            
                        </div>

                    </div>

                    <div class="row table-row" style="width:100%; ">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width:4%;">Sr</th>
                                    <th class="text-center" style="width:36%;">Item</th>
                                    <th class="text-center" style="width:10%;">HSN/SAC</th>
                                    <th class="text-center" style="width:13%;">Quantity</th>
                                    <th class="text-center" style="width:13%;">Rate</th>
                                    <th class="text-center" style="width:6%;">per</th>
                                    <th class="text-center" style="width:18%;">Total Price</th>
                                </tr>
                            </thead>
                            <tbody>';
                            while($row6=mysqli_fetch_assoc($product_query)){
$html .= ' <tr>
                                        <td class="text-center pad">' . $j . '</td>

                                        <th class="text-left pad">' . $row6['product_name']  . '  '.$row6['product_qty'].'<br/>
                                        '.$row6['product_description'].'
                                        </th>
                                        <td class="text-left pad">3402</td>
                                        <th class="text-center pad">' . $row6['item_qty'] . '</th>
                                        <td class="text-center pad">' . $row6['item_price'] .'</td>
                                        <td class="text-center pad">KGS</td>

                                        <th class="text-right pad">';


                                        $product_sum=$row6['item_qty']*$row6['item_price'];

                                        $html .= '' .  $product_sum . ' </th>
                                                                        </tr>';
                                    
                                        $j = $j + 1;
                                        $sum = $sum +  $product_sum;
                                        $qty = $qty +$row6['item_qty'];
}
$gst1=($sum*$row['gst_rate'])/200;
$gst2=($sum*$row['gst_rate'])/200;
$gst3=(($sum+$fcharge)*$row['gst_rate'])/200;
$fcharge1=($fcharge*($row['gst_rate']/200));
$fcharge2=($fcharge*($row['gst_rate']/200));
$total_gst_amount=$gst1+$gst2;
$total_fcharge=$fcharge1+$fcharge2;
$final_amount=$sum+$fcharge+$gst3*2;
$html .= '
                            <tr class="freight">
                                <td></td>
                                <th class="text-right">FREIGHT CHARGES<br>CGST @'.($row['gst_rate']/2).'%<br>SGST @'.($row['gst_rate']/2).'%</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <th class="text-right pad">'.$fcharge.'<br>'.$gst3.'<br>'.$gst3.'</th>
                            </tr>

                            <tr class="freight">
                                <td></td>
                                <th class="text-right">TOTAL</th>
                                <td></td>
                                <th class="text-center pad">'.$qty.'</th>
                                <td></td>
                                <td></td>
                                <th class="text-right pad">'.ceil($final_amount).'</th>
                            </tr>

                            <tr class="word">
                                <th class="text-left" colspan ="7">Amount Chargeable (in words)<br>';
                                $get_amount = AmountInWords(ceil($final_amount));

                                $html .= '   ' . $get_amount . ' Only</th>
                            </tr>

                            
                            
                            </tbody>
                            </table>
                            
                            </div>

                        <div class="row" style="width:100%; margin: 0px; padding:0px;">
                            <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width:24%;" rowspan="2">HSN/SAC</th>
                                    <th class="text-center" style="width:17%;" rowspan="2">Taxable Value</th>
                                    <th class="text-center" style="width:20%;" colspan="2">Central Tax</th>
                                    <th class="text-center" style="width:20%;" colspan="2">State Tax</th>
                                    <th class="text-center" style="width:19%;" rowspan="2">Total Tax Amount</th>
                                </tr>

                                <tr>
                                    <td class="text-center">Rate</td>
                                    <td class="text-center">Amount</td>
                                    <td class="text-center">Rate</td>
                                    <td class="text-center">Amount</td>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td class="text-left">3402</th>
                                    <td class="text-right">'.$sum.'</td>
                                    <td class="text-right">'.($row['gst_rate']/2).'</td>
                                    <td class="text-right">'.$gst1.'</th>
                                    <td class="text-right">'.($row['gst_rate']/2).'</td>
                                    <td class="text-right">'.$gst2.'</td>
                                    <td class="text-right">'.$total_gst_amount.'</td>
                                </tr>';
                                if($fcharge>0){
                                $html.='<tr>
                                    <td class="text-left"></th>
                                    <td class="text-right">'.$fcharge.'</td>
                                    <td class="text-right">'.($row['gst_rate']/2).'</td>
                                    <td class="text-right">'.$fcharge1.'</th>
                                    <td class="text-right">'.($row['gst_rate']/2).'</td>
                                    <td class="text-right">'.$fcharge2.'</td>
                                    <td class="text-right">'.($total_fcharge).'</td>
                                </tr>';
                                }
                                $html.='<tr>
                                    <th class="text-right">TOTAL:</th>
                                    <th class="text-right">'.$sum.'</th>
                                    <td class="text-right"></td>
                                    <th class="text-right">'.($gst1+$fcharge1).'</th>
                                    <td class="text-right"></td>
                                    <th class="text-right">'.($gst1+$fcharge1).'</th>
                                    <th class="text-right">'.($total_gst_amount+$total_fcharge).'</th>
                                </tr>

                                <tr class="word">
                                    <th class="text-left" colspan ="7">Tax Amount (in words):';
                                    $get_amount = AmountInWords($total_gst_amount+$total_fcharge);

                                    $html .= '   ' . $get_amount . ' Only</th>
                                </tr>

                            </tbody>
                            </table>
                            </div>

                    <div class="row">
                        
                        <div class="col-xs-4 text-left pull-left">
                            <p class="last">Company&#8217;s PAN: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>AJPPS2775L</span></p>
                            
                        </div>

                        <div class="col-xs-6 text-left pull-left">
                            <p class="last">Company&#8217;s Bank Details<br>
                            Bank Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;HDFC BANK<br>
                            A/c No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;50200051965260<br>        
                            Branch & IFSC Code:&nbsp;&nbsp;&nbsp;&nbsp;Harni Warasia Ring Road & HDFC0009277</p>
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-xs-4 text-left pull-left">
                            <p class="declare">Declaration<br>
                            We declare that this invoice shows the actual price of the goods described and that all particulars are the true and correct.</p>
                        
                        </div>

                        <div class="col-xs-6 text-left pull-left" style="border:0.7px solid gray; margin-left:10px;">
                            <p class="text-right declare" style="font-weight:400; font-size:9px;">for Mahavir Enterprise<br>
                            <br>
                            Authorized Signatory</p>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                        <p style="text-align:center;">SUBJECT TO VADODARA JURISDICTION<br>
                        This is a computer generated Invoice</p>
                    </div>
           
        </div>';

$html .= '</div>
</div>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script type="text/javascript">

</script>


</body>

</html>';

if(isset($_GET['type']) && $_GET['type']=='download'){
    $mpdf = new \Mpdf\Mpdf();
    $mpdf->WriteHTML($html);
    $file = time() . '.pdf';
    $mpdf->Output($file, 'D');  
}
if(isset($_GET['type']) && $_GET['type']=='email'){
    $mpdf = new \Mpdf\Mpdf();
    $mpdf->WriteHTML($html);
    $file = time() . '.pdf';
    $pdf=$mpdf->Output($file, 's'); 
    echo smtp_mailer($row['email'],'Invoice For Recent Purchase',$pdf,"Thank you for purchasing items from Mahavir Enterprise. Invoice of purchase items is attached in the email. If you have any queries please free to contact us."); 
}
                         
?>