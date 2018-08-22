<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 04/10/18
 * Time: 11:09 PM
 */
    session_start();
    require 'Controllers/config.php';

/**
 * Get Class
 */
if (isset($_POST['tBlock']))
{
    $x=$_POST['tBlock'];

    $q="select DISTINCT class_id from timetable where block='$x' AND teacher_id='".$_SESSION['temail']."'";

    $res=mysqli_query($con,$q);
    echo '<option selected disabled>Select Class</option>';
    while($row=mysqli_fetch_array($res))
    {
        echo"<option value='$row[class_id]'>".$row['class_id']."</option>";

    }
}

/**
 * Get Subject
 */
if (isset($_POST['tClass']))
{
    $x=$_POST['ttBlock'];
    $y = $_POST['tClass'];

    $q="select DISTINCT subject_id from timetable where block='$x' and class_id='$y' AND teacher_id='".$_SESSION['temail']."'";

    $res=mysqli_query($con,$q);
    echo '<option selected disabled>Select Subject</option>';
    while($row=mysqli_fetch_array($res))
    {
        echo"<option value='$row[subject_id]'>".$row['subject_id']."</option>";
    }
}

/**
 * Get Student List of Particular Class for MST Marks
 */
if (isset($_POST['tStuClass']))
{

    $x=$_POST['tStuClass'];

    $q="select * from student where class_name='$x' ";

    $res=mysqli_query($con,$q);
    echo '<table id="datatable" class="table table-striped table-bordered">';
    echo '<tr><th>Student Name</th><th>Student Roll No</th><th>Marks</th><th>Max Marks</th></tr>';
    while($row=mysqli_fetch_array($res))
    {
        echo "<tr><td>$row[name]</td><td><input type='hidden' value='$row[rollno]' name='studr[]'>$row[rollno]</td><td><input placeholder='Assignment Marks' 
name=amarks[]' 
        type='text'></td><td><input 
        value='20' name='maxamarks' disabled='disabled' size='10px' type='text'></td></tr>";
    }
    echo '<tr><td colspan="4"><div style="text-align: center"><button type="submit" class="btn btn-primary" name="submit">SUBMIT</button></div></td> </tr>';
    echo '</table>';
}

/**
 * Get Student List of Particular Class for Attendance
 */
if (isset($_POST['tAtnStuClass']))
{

    $x=$_POST['tAtnStuClass'];

    $q="select * from student where class_name='$x' ";

    $res=mysqli_query($con,$q);
    $count = 1;
    echo '<table id="datatable" class="table table-striped table-bordered">';
    echo '<tr><th>Sr. No.</th><th>Student Name</th><th>Student Roll No</th><th><input type="checkbox" onclick="check(this)"> Attendance</th></tr>';
    while($row=mysqli_fetch_array($res))
    {
        echo "<tr><td>$count</td><td>$row[name]</td><td><input type='hidden' value='$row[rollno]' name='studr[]'>$row[rollno]</td><td>
            <input name='attendance[]' value='Absent' type='checkbox' onchange='dataUpdate(this)' class='check'><input class='attend' value='Absent' 
            type='hidden' 
            name='attend[]'></td></tr>";
        $count++;
    }
    echo '<tr><td colspan="4"><div style="text-align: center"><button type="submit" class="btn btn-primary" name="submit">SUBMIT</button></div></td> </tr>';
    echo '</table>';
}
?>



