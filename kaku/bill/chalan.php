<?php
include('../connection.inc.php');
include('function.inc.php');
include('vendor/autoload.php');

if(isset($_GET['id'])){
    $id=$_GET['id'];
}

$sql=mysqli_query($con,"select * from chalan_bill where invoice_no='$id'");
$row=mysqli_fetch_assoc($sql);

$brand_id=$row['empty_brand_id'];
$query=mysqli_query($con,"select brand_name from brand where id ='$brand_id'");
$brand_name=mysqli_fetch_assoc($query);

$sql22 = mysqli_query($con, "select * from chalan_bill,chalan,brand where invoice_no='$id' and chalan_bill.brand_id=brand.id and chalan_bill.chalan_id=chalan.id");

$j=1;
$html = '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {
            font-size:13px;
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
            border-top:  1px solid black;
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
            border-bottom:  1px solid black;
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
            border: 1px solid black;
            border-collapse: collapse;
          }

        td {
            text-align: center;
        }

        th, td {
            padding: 5px;
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
              height:90px;
          }

          .last{
              font-size:11px;
          }

          .last .span{
              font-weight:bold;
          }

          .declare{
              font-size:8px;
              margin-bottom:5px;
          }

          .box{
              border:1px solid black;
              
          }

          .row-num{
              height:100px;
          }

    </style>

</head>

<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="invoic" style="text-align:center;">
        <h4>DELIVERY CHALLAN</h4>
    </div>
    
    <div class="row">
        <div class="col-sm-12">
            <div class="box" id="invoice"  style="width: 100%;">
                
                    <div class="row" style="margin-top: 15px;">
                    
                        <div class="col-xs-12 from" style="margin-left: 15px;">
                            <p class="part" style="font-weight: bold; font-size:35px;">Mas Packaging<br></p>
                            <p style="font-weight: bold;">Gf Omkar Complex,Jani Sheri,Vadodara-390001</p>
                        </div>
                    </div> 

                        
                    <div class="row table-row" style="width:100%; margin: 0px auto 0px auto;">
                        <table class="table table-striped" >
                            <thead>
                                <tr>
                                    <th class="text-left" style="width:50%;">Buyer Name:</th>
                                    <th class="text-center" style="width:25%;">Challan No. :</th>
                                    <th class="text-center" style="width:25%;">'.$row['invoice_no'].'</th>

                                </tr>

                                <tr>
                                    <td class="text-left" style="width:50%;" rowspan="4"><b>Koshambh Multitrade Pvt Ltd</b><br><br>3rd Floor,Gamthi Complex,<br>
                                    Productivity Road,Alkapuri <br>Vadodara-</td>
                                    <th class="text-center" style="width:25%;">Date :</th>
                                    <th class="text-center" style="width:25%;">'.date('d-M-Y', strtotime($row['chalan_date'])).'</th>

                                </tr>

                                <tr>
                                    
                                    <th class="text-center" style="width:25%;">Order No. :</th>
                                    <th class="text-center" style="width:25%;">'.$row['tr'].'</th>

                                </tr>

                                <tr>
                                
                                    <th class="text-center" style="width:25%;">Dispatch Through :</th>
                                    <th class="text-center" style="width:25%;">Container</th>

                                </tr>

                                <tr>
                                
                                    <th class="text-center" style="width:25%;">Container No.:</th>
                                    <th class="text-center" style="width:25%;">'.$row['container_no'].'</th>

                                </tr>
                            </thead>
                        </table>
                    </div>
                            
                    <div class="row table-row" style="width:100%; margin:10px auto 0px auto; ">
                        <table class="table bottom" >
                            <thead>
                                <tr>
                                    <th class="text-center" style="width:10%;">SR NO.</th>
                                    <th class="text-center" style="width:44%;">PARTICULAR</th>
                                    <th class="text-center" style="width:15%;">QUANTITY</th>
                                    
                                    <th class="text-center" style="width:8%;"></th>
                                    <th class="text-center" style="width:23%;">REMARKS</th>
                                </tr>
                            </thead>
                            <tbody class="height">';
                            while($final=mysqli_fetch_assoc($sql22)){
$html .= ' <tr>
                                        <th class="text-center pad"style="vertical-align:top">'.$j.'</th>

                                        <td class="text-left pad" style="vertical-align:top"><u>Ultra Marine Blue</u><br><br>(' . $final['short_desc'] . ')<br>Material Supplied by You <br>';
                                        if ($final['qty'] != '5 Kg') {
                                            $html .= '' . $final['qty'] . '  Packets<br>';
                                        } else {
                                            $html .= '' . $final['qty'] . '  Pouches<br>';
                                        }
                                        $html.='
                                        ' . $final['brand_name'] . '<br>
                                       
                                        ' . $final['packet_desc'] . '
                                        </td>
                                        
                                        <th class="text-center pad" style="vertical-align:top">' . $final['quantity'] . '</th>
                                        <th class="text-center pad" style="vertical-align:top">';
                                        if ($final['qty'] != '5 Kg') {
                                            $html .= 'Ctn';
                                        } else {
                                            $html .= 'Bag';
                                        }
                                        
                                        $html.='</th>

                                        <th class="text-left pad" style="vertical-align:top">';


$j++;
                            }
$html .= ' </th>
                                    </tr>';
                                    if($row['empty_brand_qty'] >0 && $row['empty_brand_qty']!=''){
$html .= ' <tr>
                                        <th class="text-center pad"style="vertical-align:top">'.$j++.'</th>

                                        <td class="text-left pad" style="vertical-align:top">
                                        Empty Box '.$brand_name['brand_name'].'<br><br>
                                       
                                       
                                        </td>
                                        
                                        <th class="text-center pad" style="vertical-align:top">'.$row['empty_brand_qty'].'</th>
                                        <th class="text-center pad" style="vertical-align:top"></th>

                                        <th class="text-left pad" style="vertical-align:top">';




$html .= ' </th>
                                    </tr>';

                                    }
$html .= '

                                        
                                </tbody>
                            </table>

                            <div class="col-xs-10 text-right pull-right">
                                <p class="text-right declare" style="font-weight:bold; font-size:13px; margin-bottom:15px;">Mas Packaging
                            </div>
                        </div>
                        
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
        echo smtp_mailer('pruthvikshah509@gmail.com','Invoice For Recent Purchase',$pdf,"Thank you for purchasing items from Mas Packaging. Invoice of purchase items is attached in the email. If you have any queries please free to contact us.");
    }
?>