<?php

session_start();
include("../helpers/validaion.php");
include("../helpers/json.php");
include("../helpers/auth.php");


if (isset($_POST['submit'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];


    $errors['name'] = valaditename($name);
    //   $errors['price'] = valaditePrice($price);

    if (!checkErroeBagIsEmpty($errors)) {

        $product = [
            'name' => $name,
            'price' => $price,
            "image" =>  $newName,
            "user_id" => $_SESSION['user']['id'],

        ];


        $allproduct = json_decode(file_get_contents("../data/products.json"), true);

        // pass by refrance &$var  بنحط & قبل المتغير 
        foreach ($allproduct as &$product) {
            if ($product['id'] == $id) {
                $product['name'] = $name;
                $product['price'] = $price;
            } else {
                header("location: ../products.php");
            }
        }

        file_put_contents("../data/products.json", json_encode($allproduct, true));

        header("location: ../products.php");
    } else {

        $_SESSION['errors'] = $errors;

        header("location: ../edit-product.php");
    }
} else {
    header("location: ../edit-product.php ");
}
