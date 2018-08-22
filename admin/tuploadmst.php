<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 04/10/18
 * Time: 10:36 PM
 */

require 'theader.php';
require 'Controllers/config.php';

    if (isset($_POST['submit']))
    {
        $counts = 0;
        for ($i=0;$i<count($_POST['amarks']);$i++)
        {
            $query = mysqli_query($con,"insert into mst_marks(block, block_class, subject, t_id, s_id, title, marks, max_marks, mst_date)
 VALUES ('".$_POST['block']."','".$_POST['select_class']."','".$_POST['select_subject']."','".$_SESSION['temail']."','".$_POST['studr'][$i]."','','"
                .$_POST['amarks'][$i]."','20','')");
            $counts++;
        }
        if ($counts!=count($_POST['amarks']))
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

?>
    <div class="right_col dataHeight" role="main">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">

                        <h2>Upload MST Marks</h2>
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
                        <h4>Upload MST Marks</h4>
                        <p class="font-gray-dark">
                            Following are the Form in which you upload Student MST Marks.
                        </p>

                        <form class="form-horizontal form-label-left" method="post">

                            <div class="form-group">
                                <label class="control-label col-md-3" for="first-name">Select Block <span class="required">*</span>
                                </label>
                                <div class="col-md-7">
                                    <select name="block" id="cblock" class="form-control selectpicker">
                                        <option selected="selected" disabled="disabled">Select Block</option>
                                        <?php
                                        $query = mysqli_query($con,"select * from timetable WHERE teacher_id='".$_SESSION['temail']."'");
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
                                    <select name="select_class" id="ccdata" class="form-control stype">
                                        <option selected="selected" disabled="disabled">Select Block First</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="select_subject">Select Subject <span class="required">*</span>
                                </label>
                                <div class="col-md-7">
                                    <select name="select_subject" id="scdata" class="form-control stuCall">
                                        <option selected="selected" disabled="disabled">Select Class First</option>
                                    </select>
                                </div>
                            </div>

                            <br>
                            <br>
                            <div id="stuData" class="col-md-10 col-md-offset-1">

                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
require 'tFooter.php';
?>