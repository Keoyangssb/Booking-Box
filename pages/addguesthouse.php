<?php
include('/var/www/html/config.php');
 $data = json_decode(file_get_contents("php://input"), true);  
 if(count($data) > 0)  
 {  
      $itemid = 0;
      $i = 0;

      $Dbobj = new DbConnection(); 
      $query = "select max(itemid) as xid from tbguesthouse";
      $result = mysqli_query($Dbobj->getdbconnect(), $query);
      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) { 
               $itemid = $row['xid'] + 1;
          }
       }

      $itemnamelao = $data['itemnamela'];   
      $itemnameeng = $data['itemnameen'];   
      $detailslao = $data['detailsla'];   
      $detailseng = $data['detailsen']; 
      $tel1 = '';
      $tel2 = '';
      $email1 = '';
      $img = '';
      $typeid = 1;
      $query = "";

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

      $query = "INSERT INTO tbguesthouse(itemid,itemnamela,itemnameen,detailsla,detailsen,img,itemtype) VALUES ($itemid, '$itemnamelao','$itemnameeng','$detailslao','$detailseng','$img',$typeid)";  
      if(mysqli_query($Dbobj->getdbconnect(), $query))  
      {  
          $query = "INSERT INTO tbguesthouseimg(guestid, imagename) VALUES {$values}";
          if(mysqli_query($Dbobj->getdbconnect(), $query)){
               echo 'Save data complete.'; 
          }  
      }  
      else  
      {  
           echo 'Error';  
      }  
 }  
 ?> 