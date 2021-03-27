<?php
include('../connection.inc.php');
$name = "";
$shop = "";
$area = "";
$city = "";
$pin = "";
$gst = "";
$email = "";
$phone = "";
$id = "";
$state = "Select State";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $update = mysqli_query($con, "select * from users where id='$id'");
    $row = mysqli_fetch_assoc($update);
    $name = $row['name'];
    $shop = $row['shop'];
    $area = $row['area'];
    $city = $row['city'];
    $pin = $row['pin'];
    $gst = $row['gst'];
    $email = $row['email'];
    $phone = $row['phone'];
    $state = $row['state'];
}
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
    <link rel="stylesheet" href="style_customer.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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

    <div class="container mt-5 ">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="panel">
                    <form action="customer_data.php?id=<?php echo $id ?> " method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Enterprise Name</label>
                            <input type="text" class="form-control" id="enterpricename" name="name" placeholder="Enter Enterprise Name" autocomplete="off" value="<?php echo $name ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Shop/Building/Apartment No.</label>
                            <input type="text" class="form-control" id="pin" placeholder="Enter Address" name="shop" autocomplete="off" value="<?php echo $shop ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Area</label>
                            <input type="text" class="form-control" id="pin" placeholder="Enter Address" name="area" autocomplete="off" value="<?php echo $area ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">City</label>
                            <input type="text" class="form-control" id="city" placeholder="Enter City" name="city" value="<?php echo $city ?>" autocomplete="off" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Pincode</label>
                            <input type="tel" class="form-control" id="pin" placeholder="Enter Pincode" autocomplete="off" minlength="6" maxlength="6" name="pin" value="<?php echo $pin ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Select State</label>
                            <div class="dropdown">
                                <select name="state" id="state" class="form-control" required>
                                    <option value="<?php echo $state ?>"> <?php echo $state ?> </option>
                                    <option value="Andhra Pradesh37">Andhra Pradesh</option>
                                    <option value="Andaman and Nicobar Islands35">Andaman and Nicobar Islands</option>
                                    <option value="Arunachal Pradesh12">Arunachal Pradesh</option>
                                    <option value="Assam18">Assam</option>
                                    <option value="Bihar10">Bihar</option>
                                    <option value="Chandigarh04">Chandigarh</option>
                                    <option value="Chhattisgarh22">Chhattisgarh</option>
                                    <option value="Dadar and Nagar Haveli26">Dadar and Nagar Haveli</option>
                                    <option value="Daman and Diu26">Daman and Diu</option>
                                    <option value="Delhi07">Delhi</option>
                                    <option value="Lakshadweep31">Lakshadweep</option>
                                    <option value="Puducherry34">Puducherry</option>
                                    <option value="Goa30">Goa</option>
                                    <option value="Gujarat24">Gujarat</option>
                                    <option value="Haryana06">Haryana</option>
                                    <option value="Himachal Pradesh02">Himachal Pradesh</option>
                                    <option value="Jammu and Kashmir01">Jammu and Kashmir</option>
                                    <option value="Jharkhand20">Jharkhand</option>
                                    <option value="Karnataka29">Karnataka</option>
                                    <option value="Kerala32">Kerala</option>
                                    <option value="Madhya Pradesh23">Madhya Pradesh</option>
                                    <option value="Maharashtra27">Maharashtra</option>
                                    <option value="Manipur14">Manipur</option>
                                    <option value="Meghalaya17">Meghalaya</option>
                                    <option value="Mizoram15">Mizoram</option>
                                    <option value="Nagaland13">Nagaland</option>
                                    <option value="Odisha21">Odisha</option>
                                    <option value="Punjab03">Punjab</option>
                                    <option value="Rajasthan08">Rajasthan</option>
                                    <option value="Sikkim11">Sikkim</option>
                                    <option value="Tamil Nadu33">Tamil Nadu</option>
                                    <option value="Telangana36">Telangana</option>
                                    <option value="Tripura16">Tripura</option>
                                    <option value="Uttar Pradesh09">Uttar Pradesh</option>
                                    <option value="Uttarakhand05">Uttarakhand</option>
                                    <option value="West Bengal19">West Bengal</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">GSTIN/UIN</label>
                            <input type="text" class="form-control" id="gst" placeholder="Enter GST NO" autocomplete="off" minlength="15" maxlength="15" name="gst" value="<?php echo $gst ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="email" class="form-control" id="pin" placeholder="Enter Email" autocomplete="off" name="email" value="<?php echo $email ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Phone No</label>
                            <input type="tel" class="form-control" id="gst" placeholder="Enter Phone No" minlength="10" maxlength="10" autocomplete="off" name="phone" value="<?php echo $phone ?>" required>
                        </div>
                        <?php if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                        ?>
                            <button type="submit" name="submit" class="btn btn-primary update" onclick="update()"><b>Update Details</b></button>
                        <?php } else { ?>
                            <button type="submit" name="submit" class="btn btn-primary"><b>Submit</b></button>
                        <?php } ?>
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