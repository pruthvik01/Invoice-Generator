<?php
include('../connection.inc.php');
include('function.inc.php');
$sql = "select * from users";
$res = mysqli_query($con, $sql);
$product = "select * from product";
$product_res = mysqli_query($con, $product);

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css"/>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js" integrity="sha512-rMGGF4wg1R73ehtnxXBt5mbUfN9JUJwbk21KMlnLZDJh7BkPmeovBuddZCENJddHYYMkCh9hPFnPmS9sspki8g==" crossorigin="anonymous"></script>
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
                    <form method="POST" action="submit_form.php" >
                        <div id="app">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Select Customer</label>
                                <div class="dropdown">
                                    <select name="option_id" id="cars" class="form-control product_list"  required>
                                        <option value=""> Select Customer </option>
                                        <?php while ($row = mysqli_fetch_assoc($res)) { ?>
                                            <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Date</label>
                                <input type="date" class="form-control" id="date" name="date" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Select Product </label>
                                <div class="dropdown">
                                    <select name="product[]" id="cars" class="form-control product_list" required>
                                        <option value="">  </option>
                                        <?php while ($row = mysqli_fetch_assoc($product_res)) { ?>
                                            <option value="<?php echo $row['id'] ?>"><?php echo $row['product_name'].'&nbsp;&nbsp;'.$row['product_qty'].'&nbsp;&nbsp;'.$row['identification']  ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 space">
                                        <label for="exampleInputPassword1">Quantity</label>
                                        <input type="number" class="form-control" id="gst" placeholder="Enter Qty" name="qty[]" autocomplete="off" required>
                                    </div>
                                    <div class="col-md-6 space">
                                        <label for="exampleInputPassword1">Price</label>
                                        <input type="number" class="form-control" id="gst" placeholder="Enter Price" autocomplete="off" name="price[]" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">GST</label>
                                <input type="number" class="form-control" id="gst" placeholder="Enter Custom GST RATE" name="gstrate" autocomplete="off" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Freight charge</label>
                                <input type="text" class="form-control" id="delivery_note" placeholder="Enter Freight charge" name="freight_charge" autocomplete="off">
                            </div>
                            
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 space">
                                        <label for="exampleInputPassword1">Delivery Note</label>
                                        <input type="text" class="form-control" id="delivery_note" placeholder="Enter Delivery Note" name="delivery_note" autocomplete="off">
                                    </div>

                                    <div class="col-md-6 space">
                                        <label for="exampleInputPassword1">Supplier's Ref</label>
                                        <input type="number" class="form-control" id="sref" placeholder="Enter Supplier's Ref No" name="sref" autocomplete="off">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 space">
                                        <label for="exampleInputPassword1">Buyer's Order No</label>
                                        <input type="text" class="form-control" id="bono" placeholder="Enter Buyer's Order No" name="buyer_order_no" autocomplete="off">
                                    </div>

                                    <div class="col-md-6 space">
                                        <label for="exampleInputPassword1">Dispatch Document No</label>
                                        <input type="number" class="form-control" id="dd_no" placeholder="Enter Dispatch Document No" name="dispatch_document_no" autocomplete="off">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 space">
                                        <label for="exampleInputPassword1">Dispatch Through</label>
                                        <input type="text" class="form-control" id="dispatch_through" placeholder="Enter Dispatch Through" name="dispatch_through" autocomplete="off">
                                    </div>

                                    <div class="col-md-6 space">
                                        <label for="exampleInputPassword1">Bill Of Landing/LR-RR NO</label>
                                        <input type="text" class="form-control" id="bill" placeholder="Enter Bill Of Landing/LR-RR NO" name="Bill_of_landing" autocomplete="off">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 space">
                                        <label for="exampleInputPassword1">Mode/Terms Of Payment</label>
                                        <input type="text" class="form-control" id="mode" placeholder="Mode/Terms Of Payment" name="mode_of_payment" autocomplete="off">
                                    </div>

                                    <div class="col-md-6 space">
                                        <label for="exampleInputPassword1">Other Reference(s)</label>
                                        <input type="text" class="form-control" id="reference" placeholder="Enter Other Reference(s)" name="reference" autocomplete="off">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 space">
                                        <label for="exampleInputPassword1">Dated</label>
                                        <input type="date" class="form-control" id="dated" name="dated" autocomplete="off" required>
                                    </div>

                                    <div class="col-md-6 space">
                                        <label for="exampleInputPassword1">Delivery Note Date</label>
                                        <input type="text" class="form-control" id="delivery_note" placeholder="Enter Delivery Note Date" name="delivery_note_date" autocomplete="off">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 space">
                                        <label for="exampleInputPassword1">Destination</label>
                                        <input type="text" class="form-control" id="destination" placeholder="Enter Destination" name="destination" autocomplete="off">
                                    </div>

                                    <div class="col-md-6 space">
                                        <label for="exampleInputPassword1">Motor Vehicle No</label>
                                        <input type="text" class="form-control" id="mv_no" placeholder="Enter Motor Vehicle No" name="mv_no" autocomplete="off">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Terms Of Delivery</label>
                                <input type="text" class="form-control" id="bill" placeholder="Enter Terms Of Delivery" name="terms_of_delivery" autocomplete="off">
                            </div>
                            

                            
                            
                        </div>

                        <input type="hidden" id="box_count" value="1">
                        <div>
                            <button class="btn btn-primary mt-1" type="button" onclick="addField()"><b>Add More Item</b></button>
                            <button type="submit" name="submit" class="btn btn-primary mt-1"><b>Genrate Invoice</b></button>
                        </div>
                    </form>
                </div>

            </div>

        </div>

    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        function addField() {
            $(document).ready(function() {

                var box_count = jQuery("#box_count").val();
                box_count++;
                jQuery("#box_count").val(box_count);

                jQuery("#app").append('<div class="my_box" id="box_loop_' + box_count + '"><div class="form-group"><label for="exampleInputPassword1">Select Product </label><div class="dropdown"><select name="product[]" id="cars" class="form-control product_list"><option value=""> Select Product <option>Select Product</option><?php echo dropdown($con) ?></select></div></div><div class="form-group"><div class="row"><div class="col-md-6 space"><label for="exampleInputPassword1">Quantity</label><input type="number" class="form-control" id="gst" placeholder="Enter Qty" name="qty[]" autocomplete="off" ></div><div class="col-md-6 space"><label for="exampleInputPassword1">Price</label><input type="number" class="form-control" id="gst" placeholder="Enter Price" autocomplete="off" name="price[]"></div></div></div><button class="btn btn-primary" onclick=removeField("' + box_count + '")><b>Remove Item</b></button></div>'); 
                jQuery('.product_list').chosen();
            });
        }
        function removeField(box_count) {
                    jQuery("#box_loop_" + box_count).remove();
                    var box_count = jQuery("#box_count").val();
                    box_count--;
                    jQuery("#box_count").val(box_count);
                }
    jQuery('.product_list').chosen();
    </script>
</body>

</html>