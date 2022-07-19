<?php
include('/var/www/html/config.php');
 $data = json_decode(file_get_contents("php://input"), true);  
 if(count($data) > 0)  
 {  
      $itemid = 0;
      $i = 0;
      $query = "select max(itemid) as xid from tblnews";
      $Dbobj = new DbConnection(); 
      $result = mysqli_query($Dbobj->getdbconnect(), $query);
      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) { 
               $itemid = $row['xid'] + 1;
          }
       }

      $itemnamela = $data['itemnamela'];
      $itemnameen = $data['itemnameen'];
      $detailslao = $data['detailsla']; 
      $detailseng = $data['detailsen']; 
      $query = "";

      $query = "INSERT INTO tblnews(itemid,itemnamela,itemnameen,detailsla,detailsen,img,createdon) VALUES ($itemid, '$itemnamela','$itemnameen','$detailslao','$detailseng','', CURRENT_TIMESTAMP)";  
      if(mysqli_query($Dbobj->getdbconnect(), $query))  
      {  
        echo 'Save data complete.';  
      }  
      else  
      {  
           echo 'Error';  
      }  
 }  
 ?> 