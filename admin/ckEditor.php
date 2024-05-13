<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Sample CKEditor page</title>
        <!-- src path should point to your copied ckeditor folder -->
        <!-- <script src="ckeditor/ckeditor.js"></script> -->
	<!-- <script type="text/javascript" src="ckeditor/plugins/lite/lite-interface.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
</head>
    <body>
        <form id="editor" action="ckEditorSubmit.php" method="post">
		
	<!-- creating a text area for my editor in the form -->
        <textarea id="myeditor" name="myeditor" id="myeditor"> phpIntroduction</b>
		<p> This is the text to be edited which I'm adding to my CKEditor. 
		.......
		<br />
		<b> Conclusion </b>
	    </textarea>

	<!-- creating a CKEditor instance called myeditor -->
	<script type="text/javascript">
	//resize CKEditor with customised height and width

	CKEDITOR.replace('myeditor',{
		width: "700px",
        height: "400px"
        }
	);	
	</script>

       //Adding submit button
	<input type="submit" value="Submit data" class="button"/>
        </form>
    </body>
</html>