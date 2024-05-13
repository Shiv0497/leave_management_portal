<?php
$con=mysqli_connect("localhost","root","shivam@123","tmv") or die("not able to connect");
//Function to clean the text data received from post
function dataready($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
} 

    $editor_data = dataready($_POST['myeditor']);
   
	//Decoding html codes for storing in DB
	$editor_data_insert = html_entity_decode($editor_data);
	

	$sql="INSERT INTO `contents` ( `long_desc`) VALUES ('$editor_data_insert' )" ;

	if (!mysqli_query($con,$sql))
	{
	die('Error: ' . mysqli_error($con));
	}		

 

?>



