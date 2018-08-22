<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 03/19/18
 * Time: 3:53 PM
 */
require "header.php";
require ("Controllers/config.php");
if (isset($_POST['submit']))
{
    $subject = strtoupper($_POST['subject']);
    $query = mysqli_query($con,"insert into subject(block,class_id, subject) 
                                          VALUES ('".$_POST['block']."','".$_POST['select_class']."','".$subject."')");
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
        $query = mysqli_query($con,"update subject set block='$_POST[block]', class_id='$_POST[class_id]', subject='$_POST[subject]' where id='$_POST[id]'");
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
    $comm = mysqli_query($con,"delete from subject where id='$del' ");
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
<style>
    input{
        text-transform: uppercase;
    }
</style>
<div class="right_col dataHeight" role="main">

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">

                    <h2>Add Block</h2>
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
                    <h4>Add Subjects Detail</h4>
                    <p class="font-gray-dark">
                        Following are the Form in which you add the Subjects.
                    </p>

                    <form class="form-horizontal form-label-left" method="post">

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
                            <label class="control-label col-md-3" for="subject">Subject Name <span class="required">*</span>
                            </label>
                            <div class="col-md-7">
                                <input type="text" id="subject" name="subject" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-7 col-md-offset-3">
                                <button type="submit" name="submit" id="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>

                    <br>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>Block Name</th>
                            <th>Class Name</th>
                            <th>Subject Name</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $idd=0;
                        $com=mysqli_query($con,"select * FROM subject");
                        if(mysqli_num_rows($com)>0)
                        {
                            while($row = mysqli_fetch_array($com))
                            {
                                $idd++;
								$type="subject";
                                echo ("<tr><td>$idd</td>");
                                echo ("<td>$row[block]</td>");
                                echo ("<td>$row[class_id]</td>");
                                echo ("<td>$row[subject]</td>");
								echo '<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal'.$row['id'].'">Update</button>';
							include "getupdateformteacher.php";
                                echo ("<td><a href='add_subject.php?id=$row[id]'>Delete</a></td></tr>");
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
