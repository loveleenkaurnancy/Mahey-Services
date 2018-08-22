<?php

    require ("header.php");
    require ("Controllers/config.php");


@$del=$_GET['id'];
if($del>0)
{
    $comm = mysqli_query($con,"delete from feedback where id='$del' ");
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

                    <h2>Feedback Information</h2>
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
                   

                    <br>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>Rollno</th>
                            <th>Name</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $idd=0;
                        $com=mysqli_query($con,"select * FROM feedback");
                        if(mysqli_num_rows($com)>0)
                        {
                            while($row = mysqli_fetch_array($com))
                            {
                                $idd++;
                                echo ("<tr><td>$idd</td>");
                                echo ("<td>$row[rollno]</td>");
                                echo ("<td>$row[name]</td>");
                                echo ("<td>$row[subject]</td>");
                                echo ("<td>$row[message]</td>");
                                echo ("<td><a href='feedback.php?id=$row[id]'>Delete</a></td></tr>");
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
