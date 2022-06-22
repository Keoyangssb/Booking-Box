<?php  
 include('/var/www/html/config.php');
 $id = 0;
 $data = json_decode(file_get_contents("php://input"), true); 
 if(count($data) > 0){
     $id = $data['myid'];
 }
 $output = array();  
 $query = "SELECT imagename FROM tblaboutimg order by autoid ";
 $Dbobj = new DbConnection(); 
 $result = mysqli_query($Dbobj->getdbconnect(), $query);
 while($row = mysqli_fetch_array($result))  
 {  
      $output[] = $row;  
 } 
 echo json_encode($output);  
 ?> 