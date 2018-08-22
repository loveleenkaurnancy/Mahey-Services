<?php

	require ("connection.php");
	
	
	$a = "select * from student where rollno='".$_GET['email']."'";

	$query = mysqli_query($con,$a);
	$row = mysqli_fetch_array($query);
	$clas = $row['class_name'];
	
	if(mysqli_num_rows($query)>0)
	{
	    $a = "SELECT * FROM timetable LEFT JOIN teacher ON timetable.teacher_id = teacher.email where class_id='".$clas."'";
	    //$a = "select * from timetable where class_id='".$clas."' ";

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
	}
	
?>