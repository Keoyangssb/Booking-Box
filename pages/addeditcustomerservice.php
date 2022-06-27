<?php
include('/var/www/html/config.php');
 $data = json_decode(file_get_contents("php://input"), true);  
 if(count($data) > 0)  
 {  
      $i = 0;
      $itemid = 0;
      $updateitemid = 0;

      $query = "select max(itemid) as xid from tblcustomerservice";
        $Dbobj = new DbConnection(); 
        $result = mysqli_query($Dbobj->getdbconnect(), $query);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { 
                 $itemid = $row['xid'] + 1;
            }
         }
      
      $hotelnamelao = $data['itemnamela'];
      $hotelnameeng = $data['itemnameen'];
      $detailslao = $data['detailsla']; 
      $detailseng = $data['detailsen']; 
      $tel1 = $data['tel1']; 

      $query = ""; 

      $query = "INSERT INTO tblcustomerservice(itemid,itemnamela,itemnameen,detailsla,detailsen,tel1,img) VALUES ($itemid, '$hotelnamelao','$hotelnameeng','$detailslao','$detailseng','$tel1', '')";  
      if(mysqli_query($Dbobj->getdbconnect(), $query))  
      {  
          echo 'Save data complete.'; 
      }  
      else  
      {  
          echo 'Error';  
      }   
 }else{
     echo 'Error';  
 }  
 ?> 