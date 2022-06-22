<?php
    include "switchlan.php";
?>

<?php
//session_start();
$_SESSION["service"] = "";
$_SESSION["hotel"] = "";
$_SESSION["guesthouse"] = "";
$_SESSION["room"] = "active";
$_SESSION["house"] = "";
$_SESSION["car"] = "";
$_SESSION["about"] = "";
$_SESSION["contact"] = "";
include 'header.php';
include 'pages/roomdetail.php';
include 'footer.php';
?>