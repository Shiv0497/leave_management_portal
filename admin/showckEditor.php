<html>
    <head>
        <meta charset="utf-8">
        <title>Sample CKEditor page</title>
        <!-- src path should point to your copied ckeditor folder -->
        <!-- <script src="ckeditor/ckeditor.js"></script> -->
	<!-- <script type="text/javascript" src="ckeditor/plugins/lite/lite-interface.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
</head>


<?php
$con=mysqli_connect("localhost","root","shivam@123","tmv") or die("not able to connect");

$sql1 = mysqli_query($con, "SELECT * FROM contents");
  
if ($sql1->num_rows > 0) {
   
    // output data of each row
    while($row = mysqli_fetch_assoc($sql1)) {
        
        ?>
               <textarea id="myeditor" name="myeditor" id="myeditor"><?php echo ($row['long_desc']); ?>
	    </textarea>
        <?php
        // echo $row['long_desc'];
    }
}

?>
<script type="text/javascript">
	//resize CKEditor with customised height and width

	CKEDITOR.replace('myeditor',{
		width: "700px",
        height: "400px"
        }
	);	
	</script>