<?php
include('/var/www/html/config.php');
 $data = json_decode(file_get_contents("php://input"), true);  
 if(count($data) > 0)  
 {  
      $itemid = 0;
      $i = 0;
      $query = "select max(aboutid) as xid from tblaboutus";
      $Dbobj = new DbConnection(); 
      $result = mysqli_query($Dbobj->getdbconnect(), $query);
      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) { 
               $itemid = $row['xid'] + 1;
          }
       }

      $itemnamela = $data['titlenamela'];
      $itemnameen = $data['titlenameen'];
      $detailslao = $data['aboutdetailla']; 
      $detailseng = $data['aboutdetailen']; 
      $img = $data['imagename']; 
      $query = "";

      $query = "INSERT INTO tblaboutus(aboutid,titlenamela,titlenameen,aboutdetailla,aboutdetailen,Others,imagename) VALUES ($itemid, '$itemnamela','$itemnameen','$detailslao','$detailseng','', '$img')";  
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