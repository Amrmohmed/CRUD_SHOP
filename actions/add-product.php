<?php

session_start();
include("../helpers/validaion.php");
include("../helpers/json.php");
include("../helpers/auth.php");


if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_FILES['image'];



    $imageName = $image['name'];
    $imageType = $image['type'];
    $imageTmpName = $image['tmp_name'];


    $errors['name'] = valaditename($name);
    //   $errors['price'] = valaditePrice($price);
    $errors['image'] = valaditeImage($image);

    if (!checkErroeBagIsEmpty($errors)) {

        $imageExtenion = pathinfo($imageName)['extension'];
        $unique = uniqid();
        $newName = $unique . "." . $imageExtenion;

        move_uploaded_file($imageTmpName, "../uplouds/$newName");

        $product = [
            'name' => $name,
            'price' => $price,
            "image" =>  $newName,
            "user_id" => $_SESSION['user']['id'],

        ];

        storeJson($product, "../data/products.json");

        header("location: ../products.php");
    } else {

        $_SESSION['errors'] = $errors;

        header("location: ../add-product.php");
    }
} else {
    header("location: ../add-product.php ");
}
