<?php
    require 'connection.php';

    $obj = json_decode($_POST["json"],true);
    $size = sizeof($obj)-1;

    $verify = mysqli_query($con,"SELECT * FROM attendance where class_id='".$obj[1]['select_class']."' and subject='".$obj[1]['select_subject']."' and a_date='".$obj[1]['dob']."' ");
        
    if(mysqli_num_rows($verify)<=0)
    {
        $query = mysqli_query($con,"INSERT INTO attendance(block, class_id, subject, topic, teacher_id, attendance, a_date) 
    VALUES ('".$obj[1]['block']."','".$obj[1]['select_class']."','".$obj[1]['select_subject']."','".$obj[1]['topic']."','".$obj[1]['temail']."','"
            .$obj[0]['rollno']."','"
            .$obj[1]['dob']."')");
    
        $counts = 0;
        
        $attn = $obj[0]['rollno'];
        $attendance = json_decode($attn,true);
        //echo $attendance['4550'];
    
         $abc = "select * from student where class_name='".$obj[1]['select_class']."'";
    
        $get_class = mysqli_query($con,$abc);
    
        while ($i = mysqli_fetch_array($get_class)) {
    
            $qq = $i['rollno'];
            $check_query = mysqli_query($con,"select * from attendance_record WHERE rollno='".$i['rollno']."' and subject='".$obj[1]['select_subject']."'");
    
            $row = mysqli_fetch_array($check_query);
    
            $roll_value = $row['rollno'];
    
            if (mysqli_num_rows($check_query)>0)
            {
    
                if ($attendance[$roll_value]=='Present') {
    
                    $up_val = mysqli_query($con, "update attendance_record set attend=attend+1,total=total+1 WHERE subject='" . $obj[1]['select_subject'] . "' and rollno='".$roll_value."'");
                }
                else
                {
                    $up_val = mysqli_query($con, "update attendance_record set total=total+1 WHERE subject='" . $obj[1]['select_subject'] . "' and rollno='" . $roll_value. "'");
                }
            }
            else
            {
                if ($attendance[$qq]=='Present') {
                    $query = mysqli_query($con, "insert into attendance_record(stu_class, subject, rollno, attend, total) 
    VALUES ('" . $obj[1]['select_class'] . "','" . $obj[1]['select_subject'] . "','" . $qq . "','1','1')");
                }
                else
                {
                    $query = mysqli_query($con, "insert into attendance_record(stu_class, subject, rollno, attend, total) 
    VALUES ('" . $obj[1]['select_class'] . "','" . $obj[1]['select_subject'] . "','" . $qq . "','0','1')");
                }
            }
    
            $counts++;
        }
        if ($query)
        {
            echo 'success';
        }
        else
        {
            echo 'error';
        }
    }
    
    else
    {
        echo 'already';   
    }

?>