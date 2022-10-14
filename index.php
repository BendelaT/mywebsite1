<?php

error_reporting(0);

include "dbconnect.php";

$sql = "SELECT * FROM products";
$products = $conn->query($sql);

if (isset($_POST['delete'])) {
    $arr = $_POST['chk_id'];
    foreach ($arr as $id) {
        @mysqli_query($conn, "DELETE FROM products WHERE id = " . $id);
    }
    header("Location: index.php");
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
    <link rel="stylesheet" href="css/style.css">
</head>

<body>


    <header>
        <h1>Product List</h1>

    </header>
    <div class="rectangle"></div>

    <form action="" method="post">
        <ul class="products-list">
            <?php foreach ($products as $product) : ?>
                <li class="product">
                    <input class="delete-checkbox" type="checkbox" name="chk_id[]" value="<?php echo $product['id']; ?>"></input>
                    <p><?php echo $product["sku"] ?> </p>
                    <p><?php echo $product["name"] ?></p>
                    <p><?php echo $product["price"] ?> <span>$</span></p>
                    <p class="size"><?php if (empty($product["size"])) {
                                    } else {
                                        echo "Size: ", $product["size"], " MB";
                                    } ?></p>
                    <p class="weight"><?php if (empty($product["weight"])) {
                                        } else {
                                            echo "Weight: ", $product["weight"], " KG";
                                        } ?></p>
                    <p class="dimension"><?php if (empty($product["height"]) && empty($product["width"]) && empty($product["length"])) {
                                            } else {
                                                echo "Dimension: ", $product["height"], "x", $product["width"], "x", $product["length"];
                                            } ?></p>


                </li>
            <?php endforeach; ?>

        </ul>
        <div class="buttons">
            <button onclick="location.href='AddProduct.php'" type="button" class="btn btn-primary">ADD</button>
            <button id="delete-product-btn" name="delete" type="submit" class="btn btn-danger">MASS DELETE</button>
        </div>
    </form>
    <div class="footer_line"></div>

    <footer>
        <p>Scandiweb test assignment</p>
    </footer>

</body>

</html>