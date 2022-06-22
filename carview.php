<?php
//session_start();
include "switchlan.php";
$_SESSION["service"] = "";
$_SESSION["hotel"] = "";
$_SESSION["guesthouse"] = "";
$_SESSION["room"] = "";
$_SESSION["house"] = "";
$_SESSION["car"] = "active";
$_SESSION["about"] = "";
$_SESSION["contact"] = "";
include 'header.php';
include 'pages/carlist.php';
include 'footer.php';
?>