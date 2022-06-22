<?php
Class DbConnection{
    function getdbconnect(){
        $conn = mysqli_connect("150.95.81.50:3307", "root", "Keoyang@2020", "dbbs") or die("Couldn't connect");
        return $conn;
    }
}
   
?>