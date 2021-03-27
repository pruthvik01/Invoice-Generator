<?php
    require('../connection.inc.php');
    if(isset($_POST['submit'])){
        $product_name=$_POST['product_name'];
        $product_qty=$_POST['product_qty'];
        $product_desc=$_POST['product_desc'];
        $product_identi=$_POST['product_identi'];

        $product_sql=mysqli_query($con,"INSERT INTO `product`(`product_name`, `product_qty`, `product_description`, `identification`) VALUES ('$product_name','$product_qty','$product_desc','$product_identi')");

        header('location:user_added.php?type=product');

    }
?>