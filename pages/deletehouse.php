<?php  
include('/var/www/html/config.php');
 $id = 0;
 $data = json_decode(file_get_contents("php://input"), true); 
 if(count($data) > 0){
     $id = $data['myid'];
 }
 $query = '';

 if($id > 0){
    $query = "DELETE FROM tblhouse where itemid = ".$id;
    $Dbobj = new DbConnection();  
    if(mysqli_query($Dbobj->getdbconnect(), $query))  
    {
        $query = "DELETE FROM tblhouseimg where houseid = ".$id;
        if(mysqli_query($Dbobj->getdbconnect(), $query)){
            echo 'Delete data complete.'; 
        }                     
    }
 }else{
    echo 'Can not delete data.'; 
 }
  
 ?> 