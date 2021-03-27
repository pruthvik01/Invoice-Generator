<?php
include('../connection.inc.php');
$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $shop = $_POST['shop'];
    $area = $_POST['area'];
    $city = $_POST['city'];
    $pin = $_POST['pin'];
    $gst = $_POST['gst'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $statecode = $_POST['state'];

    $code = preg_replace('/[^0-9]/', '', $statecode);
    $state=substr($statecode,0,-2);
    

    if ($id == '') {
        $sql = mysqli_query($con, "INSERT INTO `users` (`name`, `shop`, `area`, `city`, `pin`, `gst`, `email`, `phone`,`state`,`code`) VALUES ('$name', '$shop', '$area', '$city', '$pin', '$gst', '$email', '$phone','$state','$code')");
        header('location:user_added.php');
    } else {
        $sql = mysqli_query($con, "UPDATE `users` SET `name`='$name',`shop`='$shop',`area`='$area',`city`='$city',`pin`='$pin',`gst`='$gst',`email`='$email',`phone`='$phone',`state`='$state',`code`='$code' WHERE id='$id'"); ?>

        <script>
            alert('Data Updated Successfully :)');
            window.location.href = 'mahavir_index.php';
        </script>
        </script>
<?php
    }
}
?>