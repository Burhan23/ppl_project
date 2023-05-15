<?php 
include "config.php";
$tampil = new tampil();


// Insert record
if(isset($_POST['submit'])){
		
		$title = $_POST['title'];
		$short_desc = $_POST['short_desc'];
		$long_desc = $_POST['long_desc'];

		if($title != ''){
			
			mysqli_query($con, "REPLACE OR INSERT INTO contents(title,short_desc,long_desc) VALUES('".$title."','".$short_desc."','".$long_desc."') ");
			header('location: index.php');
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Integrate CKeditor to HTML page and save to MySQL with PHP</title>

	<!-- CSS -->
	<style type="text/css">
	.cke_textarea_inline{
		border: 1px solid black;
	}
	</style>

	<!-- CKEditor -->	
	<script src="ckeditor/ckeditor.js" ></script>
</head>
<body>
	<?php foreach ($tampil->tampilkan() as $akun) { ?>
	<textarea id='short_desc' name='short_desc' readonly value=""><?php echo $akun['short_desc'] ?></textarea>
	<form method='post' action=''>
		Title : 
		<input type="text" name="title" ><br>

		Short Description: 
		<textarea id='short_desc' name='short_desc' style='border: 1px solid black;'  ><?php echo $akun['short_desc'] ?></textarea><br>

		Long Description: 
		<textarea id='long_desc' name='long_desc' ><?php echo $akun['long_desc'] ?></textarea><br>

		<input type="submit" name="submit" value="Submit">
	</form>
	
	<!-- Script -->
	<script type="text/javascript">
	
		// Initialize CKEditor
		CKEDITOR.inline( 'short_desc');

		CKEDITOR.replace('long_desc',{

			width: "500px",
        	height: "200px"
   
		}); 
	
    	
	</script>
	<?php } ?>
</body>
</html>