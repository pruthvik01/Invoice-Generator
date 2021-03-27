<?php
include('../connection.inc.php');
include('function.inc.php');
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
    <link rel="stylesheet" href="style_invoice.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .my_box {
            padding-bottom: 30px;
            padding-top: 10px;
        }
    </style>
</head>

<body style="background-color:#eeeeee;">
    <center>
        <nav class="navbar navbar-dark bg-dark" style="width: 100%;">
            <div class="container">
                <div class="container-fluid">
                    <a class="navbar-brand m-2" href="mahavir_index.php">
                        <h2><img class="img-responsive2" src="1.png"> MAHAVIR ENTERPRISE</h2>
                    </a>
                </div>
            </div>
        </nav>
    </center>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="panel">
                    <form method="POST" action="product_data.php">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Product Name</label>
                            <input type="text" class="form-control" id="name" name="product_name" autocomplete="off" placeholder="Enter Product Name" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Product Quantity</label>
                            <input type="num" class="form-control" id="qty" name="product_qty" placeholder="Eg.10kg" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Product Description</label>
                            <input type="text" class="form-control" id="qty" name="product_desc" placeholder="Enter Product Description" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Product Identification</label>
                            <input type="text" class="form-control" id="qty" name="product_identi" placeholder="Enter Product Identification" autocomplete="off" required>
                        </div>
                        <div>
                            <button type="submit" name="submit" class="btn btn-primary mt-1"><b>Add Product</b></button>
                        </div>
                    </form>
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