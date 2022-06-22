<?php
if(!isset($_SESSION)){
	session_start();
}
	if (!isset($_SESSION['lang'])){
		$_SESSION['lang'] = "en";
		$_SESSION['langid'] = "2";
	}
	else if (isset($_GET['lang']) && $_SESSION['lang'] != $_GET['lang'] && !empty($_GET['lang'])) {
		if ($_GET['lang'] == "en"){
			$_SESSION['lang'] = "en";
			$_SESSION['langid'] = "2";}
		else if ($_GET['lang'] == "la"){
			$_SESSION['lang'] = "la";
			$_SESSION['langid'] = "1";
		}
	}

	//if (!isset($_SESSION['userid'])){
	//	$_SESSION['userid'] = "None";
	//	$_SESSION['username'] = "Login";
	//}

	require_once "languages/" . $_SESSION['lang'] . ".php";
?>