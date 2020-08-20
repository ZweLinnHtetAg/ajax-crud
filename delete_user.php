<?php
	include('config.php');
	if(isset($_POST['del'])){
		$id=$_POST['id'];
		mysqli_query($conn,"delete from `crudtable` where id='$id'");
	}
?>