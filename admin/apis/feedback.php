<?php

	require('connection.php');

	$a = "INSERT INTO `feedback`(`rollno`, `name`, `subject`, `message`) VALUES ('".$_POST['rollno']."','".$_POST['name']."','".$_POST['subject']."','".$_POST['message']."')";

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