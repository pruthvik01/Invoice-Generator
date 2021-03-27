<?php
require('../connection.inc.php');
require('function.inc.php');
$sql = "select * from brand";
$res = mysqli_query($con, $sql);
$sql1 = "select * from chalan";
$res1 = mysqli_query($con, $sql1);
?>
<!doctype html>
<html lang="en">

<head>
    <title>Mas Packaging</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body style="background-color: #eeeeee;">
    <center>
        <nav class="navbar">
            <div class="container">
                <div class="container-fluid">
                    <a class="navbar-brand m-2" href="../index.php" style="width: 100%; margin:0px auto;">
                        <h2>MAS PACKAGING</h2>
                    </a>
                </div>
            </div>
        </nav>
    </center>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="panel">
                    <form method="POST" action="chalan_data.php">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Date</label>
                            <input type="date" class="form-control" id="exampleInputEmail1" name="date" aria-describedby="emailHelp" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Order No.</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="tr" aria-describedby="emailHelp" autocomplete="off">
                        </div>

                        <div id="more_item">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="exampleInputPassword1">Select Product </label>
                                        <div class="dropdown">
                                            <select name="product[]" id="" class="form-control product_list" required>
                                                <option value="">Select Product</option>
                                                <?php while ($row1 = mysqli_fetch_assoc($res1)) { ?>
                                                    <option value="<?php echo $row1['id'] ?>"> <?php echo $row1['qty'] ?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="exampleInputPassword1">Select Brand </label>
                                        <div class="dropdown">
                                            <select name="brand[]" id="" class="form-control product_list" required>
                                                <option value="">Select Brand</option>
                                                <?php while ($row = mysqli_fetch_assoc($res)) { ?>
                                                    <option value="<?php echo $row['id'] ?>"> <?php echo $row['brand_name'] ?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Quantity</label>
                                        <input type="number" class="form-control" id="exampleInputEmail1" name="total_quantity[]" aria-describedby="emailHelp" autocomplete="off" required>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="exampleInputPassword1">Rate</label>
                                        <input type="num" class="form-control" name="total_rate[]" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="exampleInputPassword1">Transportation Charge</label>
                                    <input type="number" class="form-control" name="trans_charge" autocomplete="off">
                                </div>

                                <div class="col-sm-6">
                                    <label for="exampleInputPassword1">Other Charge</label>
                                    <input type="number" class="form-control" name="other_charge" autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Container No</label>
                            <input type="text" class="form-control" name="container_no" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="exampleInputPassword1">Select EmptyBox Brand </label>
                                    <div class="dropdown">
                                        <select name="empty_brand" id="" class="form-control product_list" >
                                            <option value="">Select Option</option>
                                            <?php $sq = mysqli_query($con, "select * from brand"); ?>
                                            <?php while ($row1 = mysqli_fetch_assoc($sq)) { ?>
                                                <option value="<?php echo $row1['id'] ?>"> Emptybox <?php echo $row1['brand_name'] ?> </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="exampleInputPassword1">EmptyBox Quantity</label>
                                    <input type="num" class="form-control" name="empty_qty" autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <input type="hidden" id="box_count" value="1">
                        <button type="submit" name="submit" class="btn btn-primary"><b>Submit</b></button>
                        <button type="button" class="btn btn-primary" onclick="add_field()"><b>Add More Item</b></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script>
        function add_field() {
            $(document).ready(function() {

                var box_count = jQuery("#box_count").val();
                box_count++;
                jQuery("#box_count").val(box_count);

                jQuery("#more_item").append('<div class="my_box" id="box_loop_' + box_count + '"><div class="form-group"><div class="row"><div class="col-sm-6"><label for="exampleInputPassword1">Select Product </label><div class="dropdown"><select name="product[]" id="cars" class="form-control product_list"><option value=""> Select Product<option>Select Product</option><?php echo dropdown($con) ?></select></div></div><div class="col-sm-6"><label for="exampleInputPassword1">Select Brand </label><div class="dropdown"><select name="brand[]" id="cars" class="form-control product_list"><option value=""> Select Brand<option>Select Brand</option><?php echo dropdown1($con) ?></select></div></div></div></div><div class="form-group"><div class="row"><div class="col-sm-6"><label for="exampleInputPassword1">Quantity</label><input type="number" class="form-control" id="gst" placeholder="Enter Qty" name="total_quantity[]" autocomplete="off"></div><div class="col-sm-6"><label for="exampleInputPassword1">Rate</label><input type="number" class="form-control" id="gst" placeholder="Enter Rate" autocomplete="off" name="total_rate[]"></div></div></div><button class="btn btn-primary" onclick=removeField("' + box_count + '")><b>Remove Item</b></button></div><br>');

            });
        }

        function removeField(box_count) {
            jQuery("#box_loop_" + box_count).remove();
            var box_count = jQuery("#box_count").val();
            box_count--;
            jQuery("#box_count").val(box_count);
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>