<?php
require('../connection.inc.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Payment Gateway Integration Demo">
    <title>Thank you!</title>
    <link rel="icon" href="favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="customStyle.css">
</head>

<body>
    <center>
        <div class="container-sm card-container">
            <div class="card-flip shadow">
                <div class="container-0 m-2">
                    <div class="row m-2">
                        <?php if(isset($_GET['type']) && $_GET['type']=='product'){?>
                        <div class="col m-2">
                            <h5 class="display-4 text-primary">Product added Succeessfully</h5>
                        </div>
                        <?php }else{ ?>
                            <div class="col m-2">
                            <h5 class="display-4 text-primary">Customer added Succeessfully</h5>
                        </div>
                        <?php } ?>

                    </div>

                    <div class="row m-2">
                        <div class="col m-2">
                            <div class="row m-2">
                                <div class="col m-2">
                                    <img src="success.gif" class="img-fluid w-90" alt="Check mark to confirm donation">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p>Click <a href="complete_invoice.php"><span>HERE</span></a> to Generate Invoice</p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="container-sm">
                    <div class="row m-2">
                        <div class="col m-2">
                            <small>Made by Pruthvik Shah</small>
                        </div>
                    </div>
                </div>
    </center>
</body>

</html>