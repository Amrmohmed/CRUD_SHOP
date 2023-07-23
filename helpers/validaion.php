<?php

function valaditename($name): ?string
{

    $error = null;

    if (empty($name)) {
        $error = "Name is Required";
    } elseif (!is_string($name) || is_numeric($name)) {
        $error = "Must be charactar";
    } elseif (strlen($name) > 255) {
        $error = "Shoud be less than 255";
    }
    return $error;
}

function valaditeEmail($email)
{

    $error = null;

    if (empty($email)) {
        $error = "Email is Required";
    } elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        $error = "Invalid email format";
    } elseif (strlen($email) > 255) {
        $error = "Shoud be less than 255";
    }
    return $error;
}

function validateAge($age): ?string
{

    $error = null;

    if (is_numeric($age)) {
        $age = (int)$age;     // casting
    }

    if (!empty($age)) {
        if (!is_int($age)) {
            $error = "Must be Number";
        } elseif ($age < 0) {
            $error = "Age >= 0";
        }
    }

    return $error;
}



function valaditePass($password, $confirmPassword)
{

    $error = null;

    $passwordLegLenght = strlen($password);

    if (empty($password)) {
        $error = "password is Required";
    } elseif (!is_string($password)) {
        $error = "Must be charactar";
    } elseif ($passwordLegLenght < 5 || $passwordLegLenght > 30) {
        $error = "Shoud be 5-30";
    } elseif ($password != $confirmPassword) {
        $error = "must be equal";
    }
    return $error;
}

function valaditePassForLogin($password)
{

    $error = null;

    $passwordLegLenght = strlen($password);

    if (empty($password)) {
        $error = "password is Required";
    } elseif (!is_string($password)) {
        $error = "Must be charactar";
    } elseif ($passwordLegLenght < 5 || $passwordLegLenght > 30) {
        $error = "Shoud be 5-30";
    }
    return $error;
}

function valaditeImage(array $image)
{
    $error = null;

    $imageByte = $image['size'];
    $imagMB = $imageByte / (1024 * 1024);

    if ($image['error'] != 0) {
        $error = 'Image is Required';
    } elseif (explode("/", $image['type'])[0] != "image") {
        $error = 'Must be image';
    } elseif ($imagMB >= 1) {
        $error = 'image size > 1MB';
    }
    return $error;
}


function checkErroeBagIsEmpty(array $errors): bool
{

    foreach ($errors as  $value) {
        if ($value !== null) {
            return true;
        }
    }
    return false;
}
