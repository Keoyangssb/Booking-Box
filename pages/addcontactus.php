<?php
include('/var/www/html/config.php'); 
$total = 1;
$data = json_decode(file_get_contents("php://input"), true); 
if(count($data) > 0){
   $contel = $data["contel"];
   $conemail = $data["conemail"];
   $conaddressla = $data["conaddressla"];
   $conaddressen = $data["conaddressen"];
   $query = "UPDATE tblcontactus SET contel='$contel', conemail='$conemail',conaddressla='$conaddressla',conaddressen='$conaddressen' WHERE conid=1";  
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