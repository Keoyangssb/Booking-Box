<?php  
 //$connect = mysqli_connect("localhost", "root", "", "dbbs");  
 $output = '';  
 if(!empty($_FILES))  
 {  
          $path = "D:/upload/hotel/".$_FILES["file"]["name"];  
          if(move_uploaded_file($_FILES["file"]["tmp_name"], $path))  
          {  
               $output = $_FILES["file"]["name"];
               echo json_encode($output);   
          }else{
               echo json_encode($output);  
          }
 } else{
     echo json_encode($output);  
}
 ?>  