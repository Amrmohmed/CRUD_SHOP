<?php
session_start();
include("../helpers/validaion.php");
include("../helpers/json.php");
include("../helpers/auth.php");



if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $errors['email'] = valaditeEmail($email);
    $errors['password'] = valaditePassForLogin($password);

    if (!checkErroeBagIsEmpty($errors)) {

        $allUser = json_decode(file_get_contents("../data/users.json"), true);

        foreach ($allUser as $user) {
            if ($user['email'] == $email && $user['password'] == $password) {
                storeUserInSession($user);
                header("Location: ../home.php");
            } else {
                $_SESSION['errors']['email'] = "invalid";
                header("location: ../login.php");
            }
        }
    } else {
        $_SESSION['errors'] = $errors;
        header("location: ../login.php");
    }
} else {
  
    header("location: ../login.php");
}
