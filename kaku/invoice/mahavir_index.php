<?php
include('../connection.inc.php');
?>

<!doctype html>
<html lang="en">

<head>
    <title>Mahavir Enterprise</title>
    <link rel="icon" href="favicon.ico">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        a{
            color: black;
        }
        a:hover {
            text-decoration: none;
            color: black;
        }
    </style>
</head>

<body style="background-color:#eeeeee;">
    <center>
        <nav class="navbar navbar-dark bg-dark" style="width: 100%;">
            <div class="container">
                <div class="container-fluid">
                    <a class="navbar-brand m-2" href="../index.php">
                        <h2><img class="img-responsive2" src="1.png"> MAHAVIR ENTERPRISE</h2>
                    </a>
                </div>
            </div>
        </nav>
    </center>

    <div class="container text-center mt-4">
        <div class="row text-center">
            <div class="col-lg-3 col-sm-6 space" style="width: 65%;text-align: center;justify-content: center;margin: 20px auto; ">
                <div class="card text-center">
                    <a href="customer.php">
                        <div class="card-body">
                            <img class="card-img-top rounded mb-3" src="customer.jfif" alt="Card image cap">
                            <h5 class="card-title">Add Customer</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 space" style="width: 65%;text-align: center;justify-content: center;margin: 20px auto;">
                <div class="card">
                    <a href="complete_invoice.php">
                        <div class="card-body">
                            <img class="card-img-top mb-3" src="invoicee.jpg" alt="Card image cap">
                            <h5 class="card-title">Generate Invoice</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 space" style="width: 65%;text-align: center;justify-content: center;margin: 20px auto;">
                <div class="card">
                    <a href="view_invoice.php">
                        <div class="card-body">
                            <img class="card-img-top rounded mb-3" src="invoice2.jpg" alt="Card image cap">
                            <h5 class="card-title">Search Invoice</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 space" style="width: 65%;text-align: center;justify-content: center;margin: 20px auto;">
                <div class="card">
                    <a href="add_product.php">
                        <div class="card-body">
                            <img class="card-img-top rounded mb-3" src="add.jpg" Card image cap">
                            <h5 class="card-title">Add Product</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 space" style="width: 65%;text-align: center;justify-content: center;margin: 20px auto;">
                <div class="card">
                    <a href="view_customer.php">
                        <div class="card-body">
                            <img class="card-img-top rounded mb-3" src="search.jfif" alt="Card image cap">
                            <h5 class="card-title">Update Details</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 space" style="width: 65%;text-align: center;justify-content: center;margin: 20px auto;">
                <div class="card">
                    <a href="statistical_data.php">
                        <div class="card-body">
                            <img class="card-img-top rounded mb-3" src="stats.jpg" alt="Card image cap">
                            <h5 class="card-title">View Stats</h5>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>