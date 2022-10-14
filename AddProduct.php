<?php

include 'dbconnect.php';

error_reporting(0);

if (isset($_POST['submit'])) {
    if (empty($_POST["sku"])) {
        $sku = "";
    } else {
        $sku = $_POST["sku"];
    }
    if (empty($_POST["name"])) {
        $name = "";
    } else {
        $name = $_POST["name"];
    }
    if (empty($_POST["price"])) {
        $price = 0;
    } else {
        $price = $_POST["price"];
    }
    if (empty($_POST["size"])) {
        $size = 0;
    } else {
        $size = $_POST["size"];
    }
    if (empty($_POST["weight"])) {
        $weight = 0;
    } else {
        $weight = $_POST["weight"];
    }
    if (empty($_POST["height"])) {
        $height = 0;
    } else {
        $height = $_POST["height"];
    }
    if (empty($_POST["width"])) {
        $width = 0;
    } else {
        $width = $_POST["width"];
    }
    if (empty($_POST["length"])) {
        $length = 0;
    } else {
        $length = $_POST["length"];
    }

    $select = mysqli_query($conn, "SELECT * FROM products WHERE sku = '" . $_POST['sku'] . "'");
    if (mysqli_num_rows($select)) {
        echo '<style>#sku_alert { display:block !important;}</style>';
    } else {
        if (!$size && !$weight && !$height && !$width && !$length || !$name || !$sku || !$price) {
            echo '<style>#all_fields_alert { display:block !important;}</style>';
        } else {
            $sql = "INSERT INTO products (sku, name, price, size, weight, height, width, length) VALUES('$sku', '$name', '$price','$size','$weight','$height','$width','$length')";

            $result = mysqli_query($conn, $sql);

            header("Location: index.php");
        }
    }
}


$conn->close();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/reset.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="css/add-product-style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="js/jquery.js"></script>

</head>

<body>

    <header>
        <h1>Product Add</h1>
    </header>

    <div class="rectangle"></div>

    <div class="add_container">
        <form action="" method="POST" id="product_form" class="product_form">
            <div class="mb-3">
                <label for="" class="form-label">SKU</label>
                <input type="text" name="sku" id="sku" class="form-control" value="<?php echo $sku; ?>">
            </div>
            <p id="sku_alert">This sku is already taken!</p>
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="<?php echo $name; ?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Price ($)</label>
                <input type="number" name="price" id="price" class="form-control" value="<?php echo $price; ?>">
            </div>
            <div id="productType" class="dropdown btn btn-light">
                <select onchange="hideDiv(this.value)" name="productType" id="productType" class="form-select">
                    <option id="selectedOpt" value="selectedOpt" selected>Type Switcher</option>
                    <option value="DVD">DVD-disc</option>
                    <option value="Book">Book</option>
                    <option value="Furniture">Furniture</option>
                </select>
            </div>
            <div id="dvd" class="mb-3 dvd">
                <label class="form-label">Size (MB)</label>
                <input type="number" id="size" name="size" type="number" class="form-control">
            </div>
            <div id="book" class="mb-3 book">
                <label class="form-label">Weight (KG)</label>
                <input type="number" id="weight" name="weight" type="number" class="form-control">
            </div>
            <div id="furniture" class="mb-3 dimension">
                <div class=" mb-3 height">
                    <label class="form-label">Height (CM)</label>
                    <input type="number" id="height" name="height" type="number" class="form-control">
                </div>
                <div class=" mb-3 width">
                    <label class="form-label">Width (CM)</label>
                    <input type="number" id="width" name="width" type="number" class="form-control">
                </div>
                <div class=" mb-3 length">
                    <label class="form-label">Length (CM)</label>
                    <input type="number" id="length" name="length" type="number" class="form-control">
                </div>
            </div>
            <div class="buttons">
                <button name="submit" class="btn btn-primary">Save</button>
                <a href="index.php" class="btn btn-danger">Cancel</a>
            </div>
        </form>
    </div>
    <p id="all_fields_alert">You must fill in all of the fields.</p>

    <div class="footer_line"></div>

    <footer>
        <p>Scandiweb test assignment</p>
    </footer>

    <script src="js/script.js"></script>

</body>

</html>