<?php
    include "switchlan.php";
?>

<?php
//session_start();
$_SESSION["service"] = "";
$_SESSION["hotel"] = "";
$_SESSION["guesthouse"] = "active";
$_SESSION["room"] = "";
$_SESSION["house"] = "";
$_SESSION["car"] = "";
$_SESSION["about"] = "";
$_SESSION["contact"] = "";
include 'header.php';
include 'pages/guesthouselist.php';
include 'footer.php';
?>