<?php
//Connect Database
include ('config/db.php');

session_start();
if (!isset($_SESSION['email'])) {
    header('location: login');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['email']);
    header("location: login");
}

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="shortcut icon" href="./assets/images/logo/nac-logod.png" type="image/x-icon" />
  <link rel="stylesheet" href="assets/css/libs.bundle.css" />
  <!-- <link rel="stylesheet" href="assets/css/material.css" /> -->
  <link rel="stylesheet" href="assets/css/style.css" />
  <title>Nasco Canada Funding&trade;</title></head>

<body>