<?php  
include('D:/upload/config.php');

 $userid = "";
 $username = "";
 $userpwd = "";
 $returnmsg = "";

 $data = json_decode(file_get_contents("php://input"), true); 
 if(count($data) > 0){
     $username = $data['username'];
     $userpwd = $data['userpwd'];
 }

 $output = array();  
 $query = '';

 $query = "SELECT userid,username,pwd FROM tbluser where statusid = 1 and username = ".$username." and pwd=".$userpwd;

 $Dbobj = new DbConnection(); 

 $result = mysqli_query($Dbobj->getdbconnect(), $query);

 if (mysqli_num_rows($result) == 0) {
    $output[] = array("userid" => "","username" => "", "userpwd" => "", "returnmsg" => "User name or password wrong...Try again.");  
 } else {
    while($row = mysqli_fetch_array($result))
    {  
        $output[] = array("userid" => $row[0],"username" => "", "userpwd" => "", "returnmsg" => "");  
    } 
 }

 echo json_encode($output);  
 
  $result->close();

 ?> 