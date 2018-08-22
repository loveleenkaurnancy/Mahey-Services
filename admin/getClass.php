<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 04/09/18
 * Time: 4:32 PM
 */
require "Controllers/config.php";
$x=$_POST['id'];

$q="select * from block_class where block='$x'";

    $res=mysqli_query($con,$q);
    echo '<option selected disabled>Select Class</option>';
    while($row=mysqli_fetch_array($res))
    {
        echo"<option value='$row[class_name]'>".$row['class_name']."</option>";

    }

?>