<?php  
include('/var/www/html/config.php');
 $output = array();  
 $query = '';
 $id = 1;
$langid = 1;
$data = json_decode(file_get_contents("php://input"), true); 
if(count($data) > 0){
    $id = $data['myid'];
    $langid = $data['langid'];
}

 $query = "SELECT conid,contel,conemail,conaddressla,conaddressen,'$langid' as langid FROM tblcontactus WHERE 1";
 $Dbobj = new DbConnection(); 
 $result = mysqli_query($Dbobj->getdbconnect(), $query);  
 while($row = mysqli_fetch_array($result))  
 {  
      $output[] = $row;  
 } 
 echo json_encode($output);  
 $result->close();
 ?> 