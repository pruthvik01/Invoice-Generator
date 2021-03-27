<?php
require('../connection.inc.php');
$sql = mysqli_query($con, "select  * from data");
$i = 1;
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mahavir Enterprise</title>
    <link rel="icon" href="favicon.ico">
    <script src="https://kit.fontawesome.com/38d46c5bcf.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style_view_invoice.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body style="background-color:#eeeeee;">
    <center>
        <nav class="navbar navbar-dark bg-dark" style="width: 100%;">
            <div class="container">
                <div class="container-fluid" style="justify-content:center;">
                    <a class="navbar-brand m-2" href="mahavir_index.php">
                        <h2><img class="img-responsive2" src="1.png"> MAHAVIR ENTERPRISE</h2>
                    </a>
                </div>
            </div>
        </nav>
    </center>

    <div class="container text-center">
        <div class="row">
            <div class="col-md-12 text-center mt-5">
                <h2><b>Statistics</b></h2>
            </div>

            <div class="ml-auto">
                <div class="form-group">
                    <input class="form-control" type="text" name="" id="myInput" placeholder="Search invoice" onkeyup="searchfun()">
                </div>
            </div>
            <div class="table-responsive mb-2" style="background-color: white;">
                <!-- <br> -->
                <table class="table table-hover table-bordered text-center" id="myTable" style="margin-bottom:0px;">

                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Sr. No.</th>
                            <th scope="col">Invoice No</th>
                            <th scope="col">Invoice Amount</th>
                            <th scope="col">Total GST</th>
                            <th scope="col">Freight Charges</th>
                            <th scope="col">Final Amount </th>
                            <th scope="col">Invoice Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($sql)) { ?>
                            <tr>
                                <td scope="row"><?php echo $i ?></td>
                                <td><?php echo $row['invoice_no'] ?></td>
                                <td><?php echo $row['amount'] ?></td>
                                <td><?php echo $row['gst'] ?></td>
                                <td><?php echo $row['freight charges'] ?></td>
                                <td><?php echo $row['total'] ?></td>
                                <td><?php $date = $row['invoice_date'];
                                    echo $new_date = date('d-M-Y', strtotime($date));
                                    ?></td>
                            </tr>
                        <?php $i++;
                        } ?>

                    </tbody>
                </table>
            </div>
        </div>
        <button type="button" class="btn btn-success ml-auto" data-target="#exampleModalCenter" data-toggle="modal">Stats</button>
    </div>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="text-align: center;">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 class="modal-title" id="exampleModalLongTitle">Stats</h5>
                    <hr>
                        <input type="hidden" name="_token" value="">

                        <div class="row">
                            <div class="col-md-1 ml-auto">

                            </div>

                            <div class="col-md-5 ml-auto">
                                <label for="exampleInputPassword1">From</label>
                                <input type="date" class="form-control" id="from_date" name="date" required>
                            </div>

                            <div class="col-md-5 ml-auto">
                                <label for="exampleInputPassword1">To</label>
                                <input type="date" class="form-control" id="to_date" name="date" required>
                            </div>

                            <div class="col-md-1 ml-auto">

                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div>
                                <input type="submit" class="btn btn-success" name="submit" onclick="data_submit()" value="submit">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Total Amount</label>
                            <div>
                                <input type="number" class="form-control input-lg" id="total_amount" name="#" autocomplete="off" style="width: 70%; margin:auto;" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Total GST Paid</label>
                            <div>
                                <input type="number" class="form-control input-lg" id="total_gst_paid" name="gst"  style="width: 70%; margin:auto;" disabled>
                            </div>
                        </div>
                        <hr>
                </div>

            </div>
        </div>
    </div>
    <script>
        const searchfun = () => {

            let filter = document.getElementById('myInput').value.toUpperCase();
            let myTable = document.getElementById('myTable');
            let tr = myTable.getElementsByTagName('tr');

            for (var i = 0; i < tr.length; i++) {
                let td = tr[i].getElementsByTagName('td')[1];

                if (td) {
                    let textvalue = td.textcontent || td.innerHTML;

                    if (textvalue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";


                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }

        }

        function data_submit() {
            $(document).ready(function() {
            var date1 = jQuery('#from_date').val();
            var date2 = jQuery('#to_date').val();
            $.ajax({
                url: "stasts_data.php",
                type: "post",
                data: {date1:date1,date2:date2},
                success:function(result){
                    var resultData=JSON.parse(result);
                    jQuery('#total_gst_paid').val(resultData.total_gst);
                    jQuery('#total_amount').val(resultData.total_sum);
                }
            });
        });
    }
    </script>

</body>
<!-- Query For Finding data from given range of data

SELECT SUM(total) AS 'total_sum',SUM(gst) AS 'total_gst' FROM data WHERE invoice_date BETWEEN '2021-01-01' AND '2021-12-31' -->