<?php 

    require ("header.php");
    require ("Controllers/config.php");
    if (isset($_POST['submit']))
    {
        $query = mysqli_query($con,"insert into teacher(name, email, contact, address, password) 
                                          VALUES ('".$_POST['name']."','".$_POST['email']."',
                                          '".$_POST['contact']."','".$_POST['address']."',
                                          '".$_POST['password']."')");
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
        $query = mysqli_query($con,"update teacher set name='$_POST[name]', email='$_POST[email]', contact='$_POST[contact]', address='$_POST[address]', password='$_POST[password]' where id='$_POST[id]'");
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
    $comm = mysqli_query($con,"delete from teacher where id='$del' ");
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

                    <h2>Add Teacher</h2>
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
                    <h4>Add Teacher Information</h4>
                    <p class="font-gray-dark">
                        Following are the Form in which you add the teachers.
                    </p>

                    <form class="form-horizontal form-label-left" method="post">

                        <div class="form-group">
                            <label class="control-label col-md-3" for="first-name">Teacher Name <span class="required">*</span>
                            </label>
                            <div class="col-md-7">
                                <input type="text" id="first-name" name="name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" for="email">Teacher Email<span class="required">*</span>
                            </label>
                            <div class="col-md-7">
                                <input type="email" name="email" id="email" class="form-control" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" for="contact">Teacher Contact<span class="required">*</span>
                            </label>
                            <div class="col-md-7">
                                <input type="text" name="contact" id="contact" class="form-control" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" for="address">Teacher Address<span class="required">*</span>
                            </label>
                            <div class="col-md-7">
                                <input type="text" name="address" id="address" class="form-control" required="required">
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
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>Teacher Name</th>
                            <th>Teacher Email</th>
                            <th>Teacher Contact</th>
                            <th>Teacher Address</th>
                            <th>Delete</th>
                            <th>Update</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $idd=0;
                        $com=mysqli_query($con,"select * FROM teacher");
                        if(mysqli_num_rows($com)>0)
                        {
                            while($row = mysqli_fetch_array($com))
                            {
                                $idd++;
								$type="teacher";
                                echo ("<tr><td>$idd</td>");
                                echo ("<td>$row[name]</td>");
                                echo ("<td>$row[email]</td>");
                                echo ("<td>$row[contact]</td>");
                                echo ("<td>$row[address]</td>");
                                echo ("<td><a href='addteacher.php?id=$row[id]'>Delete</a></td>");
							echo '<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal'.$row['id'].'">Update</button>';
							include "getupdateformteacher.php";
								echo "</td></tr>";
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
    require ("footer.php");
?>
