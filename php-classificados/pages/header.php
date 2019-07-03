<?php require 'config.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Advertisements</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/master.css?v=1">
    </head>
    <body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="index.php" class="navbar-brand">Advertisements</a>
            <div class="navbar-nav">

            <?php if(isset($_SESSION['clogin']) && !empty($_SESSION['clogin'])): ?>
                <a href="my-offers.php" class="nav-item nav-link">My Offers</a>
                <a href="pages/logout.php" class="nav-item nav-link">Log Out</a>
            <?php else:  ?>
                <a href="register.php" class="nav-item nav-link">Register</a>
                <a href="login.php" class="nav-item nav-link">Log In</a>
            <?php endif; ?>
            <div>
        </div>
    </nav>
