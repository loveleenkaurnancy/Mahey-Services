<?php

	$con = mysqli_connect("localhost","root","","attendancerollcall");
    if (!$con)
    {
        echo mysqli_connect_error();
        die();
    }

?>