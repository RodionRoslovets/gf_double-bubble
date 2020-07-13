<?php

session_start();
if ($_POST) {
    $_SESSION["email_owner"] = $_POST["email_owner"];
    $_SESSION["name"] = $_POST["name"];
    $_SESSION["phone"] = $_POST["phone"];
    $_SESSION["text"] = $_POST["text"];
    $_SESSION["email"] = $_POST["email"];
    header("Location: {$_SERVER['PHP_SELF']}");
}



$recepient = trim($_POST["email_owner"]);
$sitename = "Double Bouble";

$name = trim($_POST["name"]);
$phone = trim($_POST["phone"]);
$text = trim($_POST["text"]);
$email = trim($_POST["email"]);
$date = trim($_POST["date"]);
$message = "Name: $name \nPhone: $phone \nText: $text \nEmail: $email \nDate: $date";

$pagetitle = "Новая заявка с сайта \"$sitename\"";
mail($recepient, $pagetitle, $message, "Content-type: text/plain; charset=\"utf-8\"\n From: $recepient");