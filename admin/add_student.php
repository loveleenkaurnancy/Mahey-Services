<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 03/19/18
 * Time: 3:34 PM
 */
require "header.php";
require "Controllers/config.php";
if (isset($_POST['submit']))
{
    $query = mysqli_query($con,"insert into student(name,block, class_name, rollno, phno, gender, dob, password) 
                                          VALUES ('".$_POST['name']."','".$_POST['block']."','".$_POST['select_class']."','".$_POST['rollno']."','"
        .$_POST['phno']."','".$_POST['gender']."','".$_POST['dob']."','".$_POST['password']."')");
		
    if(!$query)
    {
        $msg = '<div class="alert alert-danger alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Alert!</strong> Data Not Inserted, Try Again.</div>';
    }
    else
    {
        $msg = '<div class="alert alert-success alert-dismissable fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> Data Inserted Successfully.
                  </div>';
    }
}
if (isset($_POST['update']))
    {
        $query = mysqli_query($con,"update student set name='$_POST[name]', block='$_POST[block]', class_name='$_POST[class_name]', rollno='$_POST[rollno]', phno='$_POST[phno]',gender='$_POST[gender]',dob='$_POST[dob]',password='$_POST[password]' where id='$_POST[id]'");
		if(!$query)
        {
            $msg = '<div class="alert alert-danger alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Alert!</strong> Data Not Updated, Try Again.</div>';
        }
        else
        {
            $msg = '<div class="alert alert-success alert-dismissable fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> Data updated Successfully.
                  </div>';
        }
	}

@$del=$_GET['id'];
if($del>0)
{
    $comm = mysqli_query($con,"delete from student where id='$del' ");
    if(!$comm)
    {
        $msg = '<div class="alert alert-danger alert-dismissable fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Alert!</strong> Data Not Deleted, Try Again.</div>';
    }
    else
    {
        $msg = '<div class="alert alert-success alert-dismissable fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> Data Deleted Succcessfully.
              </div>';

    }
}
?>
<div class="right_col dataHeight" role="main">

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">

                    <h2>Add Student</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>

                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <?php if(isset($msg)){
                        echo $msg;
                    }?>
                    <h4>Add Student Information</h4>
                    <p class="font-gray-dark">
                        Following are the Form in which you add the Students.
                    </p>

                    <form class="form-horizontal form-label-left" method="post">

                        <div class="form-group">
                            <label class="control-label col-md-3" for="name">Student Name <span class="required">*</span>
                            </label>
                            <div class="col-md-7">
                                <input type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" for="first-name">Select Block <span class="required">*</span>
                            </label>
                            <div class="col-md-7">
                                <select name="block" class="form-control selectpicker">
                                    <option selected="selected" disabled="disabled">Select Block</option>
                                    <?php
                                    $query = mysqli_query($con,"select * from block");
                                    while ($row=mysqli_fetch_array($query))
                                    {
                                        echo "<option value='$row[block]'>$row[block]</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" for="select_class">Select Class <span class="required">*</span>
                            </label>
                            <div class="col-md-7">
                                <select name="select_class" id="ccdata" class="form-control">
                                    <option selected="selected" disabled="disabled">Select Block First</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" for="rollno">Student Roll No<span class="required">*</span>
                            </label>
                            <div class="col-md-7">
                                <input type="number" name="rollno" id="rollno" class="form-control" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" for="phno">Student Phone No<span class="required">*</span>
                            </label>
                            <div class="col-md-7">
                                <input type="number" name="phno" id="phno" class="form-control" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" for="gender">Student Gender<span class="required">*</span>
                            </label>
                            <div class="col-md-7">
                                <select name="gender" class="form-control">
                                    <option selected="selected" disabled="disabled">Select Gender</option>
                                    <option value='Male'>Male</option>
                                    <option value='Female'>Female</option>
                                    <option value='Other'>Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" for="dob">Student DOB<span class="required">*</span>
                            </label>
                            <div class="col-md-7">
                                <input type="date" name="dob" id="dob" class="form-control" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" for="password">Password<span class="required">*</span>
                            </label>
                            <div class="col-md-7">
                                <input type="password" name="password" id="password" class="form-control" required="required">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-7 col-md-offset-3">
                                <button type="submit" name="submit" id="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>

                    <br>
					<!--<form action="uploadexcel.php" method="post" enctype="multipart/form-data">-->
					<!--Upload Students Data<input type="file" name="files" id="files"/>-->
					<!--<input type="submit" class="btn btn-danger" onclick="uploadData" value="Upload Data" />-->
					<!--</form>-->
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>Student Name</th>
                            <th>Block Name</th>
                            <th>Class Name</th>
                            <th>Roll Number</th>
                            <th>Phone Number</th>
                            <th>Gender</th>
                            <th>DOB</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $idd=0;
                        $com=mysqli_query($con,"select * FROM student");
                        if(mysqli_num_rows($com)>0)
                        {
                            while($row = mysqli_fetch_array($com))
                            {
                                $idd++;
								$type="stu";
                                echo ("<tr><td>$idd</td>");
                                echo ("<td>$row[name]</td>");
                                echo ("<td>$row[block]</td>");
                                echo ("<td>$row[class_name]</td>");
                                echo ("<td>$row[rollno]</td>");
                                echo ("<td>$row[phno]</td>");
                                echo ("<td>$row[gender]</td>");
                                echo ("<td>$row[dob]</td>");
								echo '<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal'.$row['id'].'">Update</button>';
							include "getupdateformteacher.php";
                                echo ("<td><a href='add_student.php?id=$row[id]'>Delete</a></td></tr>");
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
   require "footer.php";
?>
