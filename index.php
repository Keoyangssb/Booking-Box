<?php
include "switchlan.php";

$_SESSION["service"] = "active";
$_SESSION["hotel"] = "active";
$_SESSION["guesthouse"] = "";
$_SESSION["room"] = "";
$_SESSION["house"] = "";
$_SESSION["car"] = "";
$_SESSION["about"] = "";
$_SESSION["contact"] = "";
include 'header.php';
include 'pages/hotellist.php';
include 'footer.php';
?>