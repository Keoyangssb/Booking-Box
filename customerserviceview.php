<?php
//session_start();
include "switchlan.php";

$_SESSION["service"] = "";
$_SESSION["hotel"] = "";
$_SESSION["guesthouse"] = "";
$_SESSION["room"] = "";
$_SESSION["car"] = "";
$_SESSION["about"] = "";
$_SESSION["contact"] = "";

include 'header.php';
include 'pages/customerservicelist.php';
include 'footer.php';
?>