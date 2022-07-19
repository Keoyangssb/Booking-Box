<?php  
include('/var/www/html/config.php');
$id = 0;
$langid = 1;
$data = json_decode(file_get_contents("php://input"), true); 
if(count($data) > 0){
    $id = $data['myid'];
    $langid = $data['langid'];
}

 $output = array();  
 $query = '';

 if($id > 0){
    $query = "SELECT aboutid,titlenamela,titlenameen,aboutdetailla,aboutdetailen,Others,'$langid' as langid,imagename FROM tblaboutus where aboutid=" .$id;
 }else{
    $query = "SELECT aboutid,titlenamela,titlenameen,aboutdetailla,aboutdetailen,Others,'$langid' as langid,imagename FROM tblaboutus";
 }

 $Dbobj = new DbConnection(); 
 $result = mysqli_query($Dbobj->getdbconnect(), $query);  
 while($row = mysqli_fetch_array($result))  
 {  
      $output[] = $row;  
 } 
 echo json_encode($output);  
 $result->close();
 ?> 