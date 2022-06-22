<?php
session_start();
if (!isset($_SESSION['userid'])){
    $_SESSION['userid'] = 0;
    $_SESSION['username'] = "Login";
}else{
   $_SESSION['userid'] = 0;
   $_SESSION['username'] = "Login";
}
echo "<script type='text/javascript'>window.location.href='index.php?id=$_SESSION[userid]'</script>";
?> 

