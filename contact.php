<?php
//session_start();
include "switchlan.php";
$_SESSION["service"] = "";
$_SESSION["hotel"] = "";
$_SESSION["guesthouse"] = "";
$_SESSION["room"] = "";
$_SESSION["house"] = "";
$_SESSION["car"] = "";
$_SESSION["about"] = "";
$_SESSION["contact"] = "active";
include 'header.php';
include 'pages/contactuslist.php';
include 'footer.php';
?>