<?php

	require ("connection.php");
	$pass = $_GET['newp'];
	$email = $_GET['email'];
	$a = "select * from teacher where email='".$_GET['email']."' and password='".$_GET['old']."'";

	$query = mysqli_query($con,$a);
	if(mysqli_num_rows($query)>0)
	{
	    $comm = mysqli_query($con,"update teacher set password = '".$pass."' where email='".$email."'");
    	if($comm)
    	{
    		$json = array("response"=>'success',"status" => 0, "message" => "Login Successfully ");
    	}
    	else
    	{
    		$json = array("response"=>'error',"status" => 1, "message" => "Message Not send ");
    	}
	}
	else
	{
		$json = array("response"=>'error',"status" => 1, "message" => "Message Not send ");
	}
	header('Content-type: application/json');
	echo json_encode($json);
	
?>