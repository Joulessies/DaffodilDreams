<?php
include './includes/config.php'; 
include './includes/db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    html {
        scroll-behavior: smooth;
    }
    </style>
    <title>Daffodil Wonders</title>
</head>

<body>
    <?php include 'pages/navbar.php'?>

    <?php include 'pages/hero.php'?>

    <?php include 'pages/services.php'?>

    <?php include 'pages/discount.php'?>

    <?php include 'pages/staff.php' ?>

    <?php include 'pages/marquee.php'?>

    <?php include 'pages/products.php' ?>

    <?php include 'pages/footer.php' ?>

</body>

</html>