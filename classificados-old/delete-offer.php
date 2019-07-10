<?php
require 'pages/config.php';
require 'classes/Offer.class.php';


if (empty($_SESSION['clogin'])) {
    header("Location: login.php");
    exit;
}


$offer = new Offer();

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $offer->deleteOffer($_GET['id']);
}

header("Location: my-offers.php");
