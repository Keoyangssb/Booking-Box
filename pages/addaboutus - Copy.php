<?php
include('/var/www/html/config.php'); 
$total = 1;
$data = json_decode(file_get_contents("php://input"), true); 
if(count($data) > 0){
   $aboutdetail = $data["aboutdetail"];
   $Others = $data["Others"];
   $query = "UPDATE tblaboutus SET aboutdetail='$aboutdetail', Others='$Others' WHERE aboutid=1";  
   $Dbobj = new DbConnection(); 
   if(mysqli_query($Dbobj->getdbconnect(), $query))  
   {
      echo 'Update data complete.'; 
   }  
   else  
   {  
        echo 'Error';  
   } 
}else{
   echo 'No data...';  
}
?> 