<?php
	require_once 'conn.php';
	
	if(ISSET($_POST['edit'])){
		$name=$_POST['filename'];
		$location=$_POST['location'];
		$file_id=$_POST['file_id'];
		$exp=explode("/", $location);
		$ext=explode(".", $exp[1]);
	
		
		if(file_exists($location)){
			if(rename($exp[0]."/".$exp[1], $exp[0]."/".$name.".".$ext[1])){
				$filename=$name;
				$path=$exp[0]."/".$name.".".$ext[1];
				mysqli_query($conn, "UPDATE `file` SET `filename`='$filename', `location`='$path' WHERE `file_id`='$file_id'") or die(mysqli_error());
				
				echo"<script>alert('Successfully change filename!')</script>";
				echo"<script>window.location='index.php'</script>";
			}
		}else{
			echo"<script>alert('File Not Exist!')</script>";
			echo"<script>window.location='index.php'</script>";
		}
	}
	
	
?>