<!DOCTYPE html>
<html>
<head>
<link rel="icon" type="image/x-icon" href="Logo.ico" />  
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
width: auto;
margin: auto;
}
.content {
width: auto;
margin: auto;
    background: white;
    font-family: Phetsarath OT;
      padding-top: 0px;
}
form {border: 3px solid #f1f1f1;
      margin: auto;
 max-width: 400px;
}

input[type=text], input[type=password] {
    width: 200px;
    height: 40px;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
    font-family: Phetsarath OT;
    font-size: 16px;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 200px;
    font-family: Phetsarath OT;
    font-size: 16px;
}

button:hover {
    opacity: 0.8;
}

.cancelbtn {
    width: 100px;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 10%;
    border-radius: 50%;
}

.container {
    width: 1000px;
    font-family: Phetsarath OT;
margin: auto;
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
</head>

<?php

include('/var/www/html/config.php');
if(isset($_POST['btnLogin'])){
$username = $_POST['txtname'];
$userpassword = $_POST['txtpassword'];
$query ="select userid,username from tbluser where username='" .$username. "' And pwd='" .$userpassword. "' and statusid = 1";
$Dbobj = new DbConnection(); 
$result = mysqli_query($Dbobj->getdbconnect(), $query); 

if (mysqli_num_rows($result) > 0) {
    while($row = $result->fetch_assoc()) { 
        session_start();
        if (!isset($_SESSION['userid'])){
            $_SESSION['userid'] = 1;
            $_SESSION['username'] = $row['username'];
        }else{
           $_SESSION['userid'] = 1;
           $_SESSION['username'] = $row['username'];
        }
        echo "<script type='text/javascript'>window.location.href='index.php?id=$_SESSION[userid]'</script>";
       }
}else{
    session_start();
    $_SESSION['userid'] = 0;
    $_SESSION['username'] = "Login";
    echo "<script type='text/javascript'>alert('User name or password incorrect. Try again...!');</script>";
}
}else{
$username = "";
$userpassword = "";
}
?>
<body>
    <div class="content">    
<center>
    <h2>User Login</h2>
</center>
<form name="frmUserLogin" method="post" action="login.php">
  <div class="imgcontainer">

        <br>  <br>
    <label for="uname"><b>User Name</b></label>
    <br>
    <input type="text" placeholder="Enter user name..." name="txtname" required value="<?php echo $username;?>" autofocus>
    <br>
    <label for="psw"><b>Password</b></label>
    <br>
    <input type="password" placeholder="Enter passsword..." name="txtpassword" required value="<?php echo $userpassword;?>"> 
    <br>

  <div style="background-color:#f1f1f1; padding: 15px; margin-bottom: -12px">
      <button type="submit" name="btnLogin">Login</button>
     
     </div>
     <div style="background-color:#f1f1f1; padding: 15px; margin-bottom: -12px">
     
      <button type="button" style="background-color:#f44336;" onclick="location.href='index.php'">Cancel</button>
     </div>
        </div>
</form>
        </div>
</body>
</html>