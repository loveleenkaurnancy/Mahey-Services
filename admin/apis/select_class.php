<?php

	require('connection.php');

	$a = "select * from student where block='".$_GET['block']."' and class_name='".$_GET['class']."'";

	$query = mysqli_query($con,$a);
	if(mysqli_num_rows($query)>0)
	{
	    $json = mysqli_fetch_all($query,MYSQLI_ASSOC);
	}
	else
	{
		$json = array("response"=>'error',"status" => 1, "message" => "Message Not send ");
	}
	header('Content-type: application/json');
	echo json_encode($json);

?>
