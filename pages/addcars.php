<?php
include('/var/www/html/config.php'); 
 $data = json_decode(file_get_contents("php://input"), true);  
 if(count($data) > 0)  
 {  
      $itemid = 0;
      $i = 0;
      $query = "select max(itemid) as xid from tblcar";
      $Dbobj = new DbConnection(); 
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

      $query = "INSERT INTO tblcar(itemid,itemnamela,itemnameen,detailsla,detailsen,img) VALUES ($itemid, '$itemnamelao','$itemnameeng','$detailslao','$detailseng','$img')";  
      if(mysqli_query($Dbobj->getdbconnect(), $query))  
      {  
          $query = "INSERT INTO tblcarimg(carid, imagename) VALUES {$values}";
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