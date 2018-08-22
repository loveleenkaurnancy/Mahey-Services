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

    $c = array_combine($_POST['studr'], $_POST['attend']);

    $json = json_encode($c);
    $query = mysqli_query($con,"INSERT INTO attendance(block, class_id, subject, topic, teacher_id, attendance, a_date) 
VALUES ('".$_POST['block']."','".$_POST['select_class']."','".$_POST['select_subject']."','".$_POST['topic']."','".$_SESSION['temail']."','"
        .$json."','"
        .$_POST['dob']."')");
    $counts = 0;
    for ($i=0;$i<count($_POST['studr']);$i++)
    {
        $check_query = mysqli_query($con,"select * from attendance_record WHERE rollno='".$_POST['studr'][$i]."' and subject='".$_POST['select_subject']."'");

        if (mysqli_num_rows($check_query)>0)
        {
            if ($_POST['attend'][$i]=='Present') {
                $up_val = mysqli_query($con, "update attendance_record set attend=attend+1,total=total+1 WHERE subject='" . $_POST['select_subject'] . "' and rollno='" . $_POST['studr'][$i] . "'");
            }
            else
            {
                $up_val = mysqli_query($con, "update attendance_record set total=total+1 WHERE subject='" . $_POST['select_subject'] . "' and rollno='" . $_POST['studr'][$i] . "'");
            }
        }
        else
        {
            if ($_POST['attend'][$i]=='Present') {
                $query = mysqli_query($con, "insert into attendance_record(stu_class, subject, rollno, attend, total) 
VALUES ('" . $_POST['select_class'] . "','" . $_POST['select_subject'] . "','" . $_POST['studr'][$i] . "','1','1')");
            }
            else
            {
                $query = mysqli_query($con, "insert into attendance_record(stu_class, subject, rollno, attend, total) 
VALUES ('" . $_POST['select_class'] . "','" . $_POST['select_subject'] . "','" . $_POST['studr'][$i] . "','0','1')");
            }
        }

        $counts++;
    }
    if ($counts!=count($_POST['attend']))
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

                        <h2>Take Attendance</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                                <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <?php if(isset($msg)){
                            echo $msg;
                        }?>
                        <h4>Take Student Attendance</h4>
                        <p class="font-gray-dark">
                            Following are the Form in which you take Student Attendance.
                        </p>

                        <form class="form-horizontal form-label-left" method="post">

                            <div class="form-group">
                                <label class="control-label col-md-3" for="first-name">Select Block <span class="required">*</span>
                                </label>
                                <div class="col-md-7">
                                    <select name="block" id="cblock" class="form-control selectpicker">
                                        <option selected="selected" disabled="disabled">Select Block</option>
                                        <?php
                                        $query = mysqli_query($con,"select DISTINCT block from timetable WHERE teacher_id='".$_SESSION['temail']."'");
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
                                    <select name="select_subject" id="scdata" class="form-control stuAtnCall">
                                        <option selected="selected" disabled="disabled">Select Class First</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="select_topic">Enter Topic Name<span class="required">*</span>
                                </label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" required name="topic" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="dob">Select Date<span class="required">*</span>
                                </label>
                                <div class="col-md-7">
                                    <input type="date" name="dob" id="dob" class="form-control" required="required">
                                </div>
                            </div>

                            <br>
                            <br>
                            <div id="stuAtnData" class="col-md-10 col-md-offset-1">

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

