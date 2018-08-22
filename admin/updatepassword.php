<?php

    require ("header.php");
    require ("Controllers/config.php");
    
    if (isset($_POST['submit']))
    {
        $password = $_POST['password'];
        $copassword = $_POST['copassword'];

        if($password == $copassword)
        {
            $pass = md5($_POST["password"]);
            $query = mysqli_query($con,"update admin set password='$pass' where email='".$_SESSION['email']."'");
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
                        <strong>Success!</strong> Password Changed Successfully.
                    </div>';
            }
        }
        else
        {
            $msg = '<div class="alert alert-danger alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong> Password does not Match.
                    </div>';
        }
        
    }


?>

<div class="right_col dataHeight" role="main">

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">

                    <h2>Change Password</h2>
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
                    

                    <form class="form-horizontal form-label-left" method="post">

                        <div class="form-group">
                            <label class="control-label col-md-3" for="password">New Password <span class="required">*</span>
                            </label>
                            <div class="col-md-7">
                                <input type="password" id="title" name="password" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" for="copassword">Confirm Password <span class="required">*</span>
                            </label>
                            <div class="col-md-7">
                                <input type="password" id="title" name="copassword" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        </div>
                      
                        <div class="form-group">
                            <div class="col-md-7 col-md-offset-3">
                                <button type="submit" name="submit" id="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php
    require ("footer.php");
?>
