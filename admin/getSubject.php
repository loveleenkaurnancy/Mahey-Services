<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 04/09/18
 * Time: 11:39 PM
 */
require "Controllers/config.php";
$x=$_POST['id'];
$y = $_POST['prod'];

$q="select * from subject where block='$x' and class_id='$y'";

$res=mysqli_query($con,$q);
echo '<option selected disabled>Select Subject</option>';
while($row=mysqli_fetch_array($res))
{
    echo"<option value='$row[subject]'>".$row['subject']."</option>";
}
?>