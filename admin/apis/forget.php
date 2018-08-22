<?php

	require ("config.php");
	
	if ($_GET['user']=='Patient') {
	    
    	$password = "";
        $charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
         
        for($i = 0; $i < 8; $i++)
        {
            $random_int = mt_rand();
            $password .= $charset[$random_int % strlen($charset)];
        }
    
    	$to  = $_GET['email'];
    	$title = 'Forget Password';
    	$messages = '<html><body>';
    	$messages .= '<h1>Appointment System</h1>';
    	$messages .="<h4>Email:".$_GET['email']."</h4>";
    	$messages .="<h4>Subject: Forget Password</h4>";
    	$messages .="</br></br><p>Password:  ". $password."</p>";
    	$headers = 'From: forget@androidproject.in' . "\r\n" .
    		'Reply-To: forget@androidproject.in' . "\r\n" .
    		'X-Mailer: PHP/' . phpversion();
    	$headers .= "MIME-Version: 1.0\r\n";
    	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    	$json=array();
    	if(mail($to, $title, $messages, $headers))
    	{
    		$comm = mysqli_query($con,"update usertable set password = '".$password."' where email='".$_GET['email']."'");
    		
        	if($comm)
        	{
        		$json = array("response"=>'success',"status" => 0, "message" => "Login Successfully ");
        	}
        	else
        	{
        		$json = array("response"=>'error',"status" => 1, "message" => "Message Not send ");
        	}
    	}
    	else{
    		$json = array("response"=>'error',"status" => 1, "message" => "Mail Not send ");
    	}
    	
    	header('Content-type: application/json');
    	echo json_encode($json);
	}
	else
	{
	    $password = "";
        $charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
         
        for($i = 0; $i < 8; $i++)
        {
            $random_int = mt_rand();
            $password .= $charset[$random_int % strlen($charset)];
        }
    
    	$to  = $_GET['email'];
    	$title = 'Forget Password';
    	$messages = '<html><body>';
    	$messages .= '<h1>Appointment System</h1>';
    	$messages .="<h4>Email:".$_GET['email']."</h4>";
    	$messages .="<h4>Subject: Forget Password</h4>";
    	$messages .="</br></br><p>Password:  ". $password."</p>";
    	$headers = 'From: forget@androidproject.in' . "\r\n" .
    		'Reply-To: forget@androidproject.in' . "\r\n" .
    		'X-Mailer: PHP/' . phpversion();
    	$headers .= "MIME-Version: 1.0\r\n";
    	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    	$json=array();
    	if(mail($to, $title, $messages, $headers))
    	{
    		$comm = mysqli_query($con,"update docotr set password = '".$password."' where demail='".$_GET['email']."'");
    		
        	if($comm)
        	{
        		$json = array("response"=>'success',"status" => 0, "message" => "Login Successfully ");
        	}
        	else
        	{
        		$json = array("response"=>'error',"status" => 1, "message" => "Message Not send ");
        	}
    	}
    	else{
    		$json = array("response"=>'error',"status" => 1, "message" => "Mail Not send ");
    	}
    	
    	header('Content-type: application/json');
    	echo json_encode($json);
	}
	
?>