<?php  
 if(!empty($_POST['name']))  
 {  
     try { 
        unlink('D:/upload/'.$_POST['name']);
        echo 'deleted iamge';  
     }

     catch(Exception $e) {
          echo 'Message: ' .$e->getMessage();
        }
 }  
 else  
 {  
      echo 'Some Error';  
 }  
 ?> 