<?php
include('/var/www/html/config.php');
 $data = json_decode(file_get_contents("php://input"), true);  
 if(count($data) > 0)  
 {  
      $itemid = 0;
      
      $itemid = $data['itemid'];
      $hotelnamelao = $data['itemnamela'];
      $hotelnameeng = $data['itemnameen'];
      $detailslao = $data['detailsla']; 
      $detailseng = $data['detailsen']; 
      $tel1 = $data['tel1']; 

      $query = ""; 

      $query = "UPDATE tblcustomerservice SET itemnamela='$hotelnamelao',itemnameen='$hotelnameeng',detailsla='$detailslao',detailsen='$detailseng',tel1='$tel1',img='' WHERE itemid=".$itemid;  
        if(mysqli_query($Dbobj->getdbconnect(), $query))  
        {
            echo 'Update data complete.'; 
        }  
        else  
        {  
             echo 'Error';  
        }  
 }else{
     echo 'Error';  
 }  
 ?> 