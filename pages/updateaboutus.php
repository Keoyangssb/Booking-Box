<?php
include('/var/www/html/config.php');
 $data = json_decode(file_get_contents("php://input"), true);  
 if(count($data) > 0)  
 {  
      $itemid = $data['aboutid'];
      $itemnamela = $data['titlenamela'];
      $itemnameen = $data['titlenameen'];
      $detailslao = $data['aboutdetailla']; 
      $detailseng = $data['aboutdetailen']; 
      $img = $data['imagename']; 
      $query = "";

      $query = "UPDATE tblaboutus SET titlenamela='$itemnamela',titlenameen='$itemnameen',aboutdetailla='$detailslao',aboutdetailen='$detailseng',imagename='$img' WHERE aboutid=".$itemid;  
      $Dbobj = new DbConnection(); 
      if(mysqli_query($Dbobj->getdbconnect(), $query))  
      {  
        echo 'Update data complete.';  
      }  
      else  
      {  
           echo 'Error';  
      }  
 }  
 ?> 