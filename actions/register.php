<?php
session_start();
include("../helpers/validaion.php");
include("../helpers/json.php");
include("../helpers/auth.php");



if (isset($_POST['submit'])) {

    $name = strip_tags($_POST['name']);
    $email = $_POST['email'];
    $age = $_POST['age'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    $errors['name'] = valaditename($name);
    $errors['email'] = valaditeEmail($email);
    $errors['age'] = validateAge($age);
    $errors['password'] = valaditePass($password, $confirmPassword);

    if (!checkErroeBagIsEmpty($errors)) {

        $user = [
            'name' => $name,
            'email' => $email,
            'age' => $age,
            'password' => $password,

        ];

        $_SESSION['name'] = $name;

        $stordUser = storeJson($user, "../data/users.json");

        storeUserInSession($stordUser);

        header("location: ../home.php");
    } else {

        $_SESSION['errors'] = $errors;

        $_SESSION['old'] = [
            'name' => $name,
            'email' => $email,
            'age' => $age
        ];

        header("location: ../register.php");
    }
} else {

    echo ("Please Submit frist");
}
