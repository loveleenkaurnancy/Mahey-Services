    <?php

        require ("header.php");
        require ("Controllers/config.php");

    @$del=$_GET['id'];
    if($del>0)
    {
        $comm = mysqli_query($con,"delete from contact where id='$del' ");
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

                    <h2>Contact</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>

                    </ul>
                    <div class="clearfix"></div>
                    </div>

                  <div class="x_content">

                  <?php if(isset($msg)){
                            echo $msg;
                        }?>

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">Sr. No. </th>
                            <th class="column-title">Name</th>
                            <th class="column-title">Email </th>
                            <th class="column-title">Mobile </th>
                            <th class="column-title">Message </th>
                            <th class="column-title">Delete </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                            <?php
                                $idd=0;
                                $com=mysqli_query($con,"select * FROM contact");
                                if(mysqli_num_rows($com)>0)
                                {
                                    while($row = mysqli_fetch_array($com))
                                    {
                                        $idd++;
                                        echo ("<tr class='even pointer'><td>$idd</td>");
                                        echo ("<td>$row[name]</td>");
                                        echo ("<td>$row[email]</td>");
                                        echo ("<td>$row[mobile]</td>");
                                        echo ("<td>$row[message]</td>");
                                        echo ("<td><a href='contact.php?id=$row[id]'>Delete</a></td></tr>");
                                    }
                                }

                                else
                                {
                                    echo ("<tr><td align='center' colspan='6'>No Data found</td></tr>");
                                }
                            ?>
                        </tbody>
                      </table>
                    </div>	
                </div>
            </div>
        </div>
    </div>
</div>

    <?php
        require ("footer.php");
    ?>
