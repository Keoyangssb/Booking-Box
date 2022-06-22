<?php
include('/var/www/html/config.php');
 $data = json_decode(file_get_contents("php://input"), true);  
 if(count($data) > 0)  
 {  
      $itemid = $data['itemid'];
      if($itemid == null || $itemid == 0){
        echo 'No item id.';  
      }
      $i = 0;
      $hotelnamelao = $data['itemnamela'];
      $hotelnameeng = $data['itemnameen'];
      $detailslao = $data['detailsla']; 
      $detailseng = $data['detailsen']; 
      $tel1 = '';
      $tel2 = '';
      $email1 = '';
      $img = '';

      $query = ""; 
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

      $query = "UPDATE tblhotel SET itemnamela='$hotelnamelao',itemnameen='$hotelnameeng',detailsla='$detailslao',detailsen='$detailseng',img='$img' WHERE itemid=".$itemid;  
      $Dbobj = new DbConnection(); 
      if(mysqli_query($Dbobj->getdbconnect(), $query))  
      {
          $query = "DELETE FROM tblhotelimg WHERE hotelid=".$itemid;
          if(mysqli_query($Dbobj->getdbconnect(), $query)){
              $query = "INSERT INTO tblhotelimg(hotelid, imagename) VALUES {$values}";
              if(mysqli_query($Dbobj->getdbconnect(), $query)){
                  echo 'Update data complete.'; 
               }           
          }
      }  
      else  
      {  
           echo 'Error';  
      }  
 }  
 ?> 