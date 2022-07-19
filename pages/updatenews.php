<?php
include('/var/www/html/config.php');
 $data = json_decode(file_get_contents("php://input"), true);  
 if(count($data) > 0)  
 {  
      $itemid = $data['itemid'];
      if($itemid == null || $itemid == 0){
        echo 'No item id.';  
      }

      $itemnamelao = $data['itemnamela'];   
      $itemnameeng = $data['itemnameen'];   
      $detailslao = $data['detailsla'];   
      $detailseng = $data['detailsen']; 

      $query = ""; 
       
      $query = "UPDATE tblnews SET itemnamela='$itemnamelao',itemnameen='$itemnameeng',detailsla='$detailslao',detailsen='$detailseng' WHERE itemid=".$itemid;  
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