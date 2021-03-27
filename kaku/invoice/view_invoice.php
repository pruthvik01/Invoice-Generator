<?php
require('../connection.inc.php');
require('function.inc.php');
$sql = mysqli_query($con, "select  distinct(bill.invoice_no),bill.invoice_date,bill.reciver_id,users.name from bill,users where bill.reciver_id=users.id order by invoice_no desc");
$i=1;
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
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
                <h2><b>Invoices</b></h2>
            </div>

            <div class="ml-auto">
                <div class="form-group">
                    <input class="form-control" type="text" name="" id="myInput" placeholder="Search invoice No" onkeyup="searchfun()">
                </div>
            </div>
            <div class="table-responsive mb-2" style="background-color: white;">
                <!-- <br> -->
                <table class="table table-hover table-bordered text-center" id="myTable" style="margin-bottom:0px;">

                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Sr. No.</th>
                            <th scope="col">Invoice No</th>
                            <th scope="col">Invoice Date</th>
                            <th scope="col">Enterprise NAME</th>
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($sql)) { 
                            $invoice_number=$row['invoice_no'];
                            ?>
                            <tr>
                                <td scope="row"><?php echo $i ?></td>
                                <td><?php echo $invoice_number ?></td>
                                <td><?php $date= $row['invoice_date'];
                                    echo $new_date = date('d-M-Y', strtotime($date));
                                ?></td>
                                <td><?php echo $row['name'] ?></td>
                                <td>
                                    <a href="pdf.php?type=download&id=<?php echo $invoice_number ?>"> <img src="pdf.png" alt="" style="width: 40px;"></a>
                                    <button onclick='check(<?php echo $invoice_number ?>)'><img src="delete.jfif" alt="" style="width: 45px;"></button>
                                </td>
                            </tr>
                        <?php $i++;} ?>

                    </tbody>
                </table>
            </div>
        </div>
        <p>            
        </p>
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
    </script>

</bod