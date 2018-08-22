<?php

	require ("connection.php");
	if ($_GET['user']=='Student') {
		$a = "select * from student where rollno='".$_GET['email']."' and password='".$_GET['password']."'";

		$query = mysqli_query($con,$a);
		if(mysqli_num_rows($query)>0)
		{
		    $row = mysqli_fetch_array($query);
			$json = array("response"=>'success',"status" => 0, "message" => "Login Successfully ","name" => $row[1]);
		}
		else
		{
			$json = array("response"=>'error',"status" => 1, "message" => "Message Not send ");
		}
		header('Content-type: application/json');
		echo json_encode($json);
	}
	else
	{
		$a = "select * from teacher where email='".$_GET['email']."' and password='".$_GET['password']."'";

		$query = mysqli_query($con,$a);
		if(mysqli_num_rows($query)>0)
		{
		    $row = mysqli_fetch_array($query);
			$json = array("response"=>'success',"status" => 0, "message" => "Login Successfully ","name" => $row[1]);
		}
		else
		{
			$json = array("response"=>'error',"status" => 1, "message" => "Message Not send ");
		}
		header('Content-type: application/json');
		echo json_encode($json);
	}
	
	
?>