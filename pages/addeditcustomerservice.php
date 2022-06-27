<?php
include('/var/www/html/config.php');
 $data = json_decode(file_get_contents("php://input"), true);  
 if(count($data) > 0)  
 {  
      $status = $data['action'];
      $i = 0;
      $itemid = 0;
      $updateitemid = 0;

      if($status == "add"){
        $query = "select max(itemid) as xid from tblcustomerservice";
        $Dbobj = new DbConnection(); 
        $result = mysqli_query($Dbobj->getdbconnect(), $query);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { 
                 $itemid = $row['xid'] + 1;
            }
         }
      }
      
      $updateitemid = $data['itemid'];
      $hotelnamelao = $data['itemnamela'];
      $hotelnameeng = $data['itemnameen'];
      $detailslao = $data['detailsla']; 
      $detailseng = $data['detailsen']; 
      $tel1 = $data['tel1']; 

      $query = ""; 

      if($status == "add"){
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
        $query = "UPDATE tblcustomerservice SET itemnamela='$hotelnamelao',itemnameen='$hotelnameeng',detailsla='$detailslao',detailsen='$detailseng',tel1='$tel1',img='' WHERE itemid=".$updateitemid;  
        if(mysqli_query($Dbobj->getdbconnect(), $query))  
        {
            echo 'Update data complete.'; 
        }  
        else  
        {  
             echo 'Error';  
        }  
      } 
 }  
 ?> 