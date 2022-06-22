<?php
include('/var/www/html/config.php'); 
$total = 1;
$data = json_decode(file_get_contents("php://input"), true); 
if(count($data) > 0){
   $aboutdetailla = $data["aboutdetailla"];
   $aboutdetailen = $data["aboutdetailen"];
   $Others = $data["Others"];
   
   $itemid = 1;

   $imgs[] = $data['images'];
   $values = array();
   foreach($data['images'] as $item){
        if($item['imagename'] != ''){
             $values[] = "($itemid, '{$item['imagename']}')";
             if($i == 0){
                  $img = $item['imagename'];
                  $i = $i + 1;
             }
        }
   }

   $values = implode(", ", $values);

   $query = "UPDATE tblaboutus SET aboutdetailla='$aboutdetailla',aboutdetailen='$aboutdetailen', Others='$Others' WHERE aboutid=1";  

   $Dbobj = new DbConnection(); 
   if(mysqli_query($Dbobj->getdbconnect(), $query))  
   {
      $query = "DELETE FROM tblaboutimg";
      if(mysqli_query($Dbobj->getdbconnect(), $query)){
          $query = "INSERT INTO tblaboutimg(aboutid, imagename) VALUES {$values}";
          if(mysqli_query($Dbobj->getdbconnect(), $query)){
              //echo 'Update data complete.'; 
           }           
      }
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