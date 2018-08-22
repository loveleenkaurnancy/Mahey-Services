<?php

	require('connection.php');

	$a = "select * from attendance where class_id='".$_GET['class_id']."' and subject='".$_GET['subject']."' order by a_date desc LIMIT 5";

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
