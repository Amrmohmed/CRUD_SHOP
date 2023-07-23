<?PHP include 'inc/header.php';     ?>
<?PHP include 'inc/navbar.php';     ?>

<?php

echo ('this is delete ');


$id = $_GET['id'];

if (!isset($_GET['id'])) {
    header("Location: 404.php");
}
$allProduct = json_decode(file_get_contents("data/products.json"), true);
$deleteProduct = null;

foreach ($allProduct as $i => $product) {
    if ($product['id'] == $id) {
        unset($allProduct[$i]);
    }
}

if ($deleteProduct === null) {
    header("Location: 404.php");
}

file_put_contents("data/products.json", json_encode($allProduct));

header("Location: products.php");
