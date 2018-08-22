<?php

	require('connection.php');

	$a = "INSERT INTO `notices`(`title`, `description`) VALUES ('".$_POST['subject']."','".$_POST['message']."')";

	$query = mysqli_query($con,$a);
	if($query)
	{
	    echo "success";
	}
	else
	{
		echo "error";
	}
	

?>