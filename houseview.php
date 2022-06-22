<?php
//session_start();
include "switchlan.php";
$_SESSION["service"] = "";
$_SESSION["hotel"] = "";
$_SESSION["guesthouse"] = "";
$_SESSION["room"] = "";
$_SESSION["house"] = "active";
$_SESSION["car"] = "";
$_SESSION["about"] = "";
$_SESSION["contact"] = "";
include 'header.php';
include 'pages/houselist.php';
include 'footer.php';
?>