<?php
    include "switchlan.php";
?>

<?php
//session_start();
$_SESSION["service"] = "";
$_SESSION["hotel"] = "";
$_SESSION["guesthouse"] = "active";
$_SESSION["room"] = "";
$_SESSION["car"] = "";
$_SESSION["about"] = "";
$_SESSION["contact"] = "";
include 'header.php';
include 'pages/guesthousedetail.php';
include 'footer.php';
?>