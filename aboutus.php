<?php
include "switchlan.php";

$_SESSION["service"] = "";
$_SESSION["hotel"] = "";
$_SESSION["guesthouse"] = "";
$_SESSION["room"] = "";
$_SESSION["house"] = "";
$_SESSION["car"] = "";
$_SESSION["about"] = "active";
$_SESSION["contact"] = "";

include 'header.php';
include 'pages/aboutuslist.php';
//include 'pages/about-us.html';
include 'footer.php';
?>