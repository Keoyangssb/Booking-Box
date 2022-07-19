<?php  
header('Content-Type: text/plain; charset=utf-8');
 $output = '';  
 if(!empty($_FILES))  
 {  
	$filepath = $_FILES['file']['tmp_name'];
	$filename = $_FILES["file"]["name"];
	$ext= pathinfo($filename, PATHINFO_EXTENSION);

	$newfilename   = uniqid() . "-" . time() . "." . $ext;

	$targetDirectory = "/var/www/html/images/aboutus"; 
	$newFilepath = $targetDirectory . "/" . $newfilename;

	if (!move_uploaded_file($filepath, $newFilepath)){
   		die("Can't upload file. to path: " . $newFilepath);
	}

	$output = $newfilename;
        echo json_encode($output); 

 } else{
     echo json_encode("Empty file...!");  
}
 ?>  