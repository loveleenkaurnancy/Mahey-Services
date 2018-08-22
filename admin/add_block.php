<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 03/19/18
 * Time: 3:17 PM
 */
require "header.php";
require ("Controllers/config.php");
if (isset($_POST['submit']))
{
    $block = strtoupper($_POST['block']);
    $query = mysqli_query($con,"insert into block(block) 
                                          VALUES ('".$block."')");
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

@$del=$_GET['id'];
if($del>0)
{
    $comm = mysqli_query($con,"delete from block where id='$del' ");
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
if (isset($_POST['update']))
    {
        $query = mysqli_query($con,"update block set block='$_POST[block]' where id='$_POST[id]'");
		if(!$query)
        {
            $msg = '<div class="alert alert-danger alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Alert!</strong> Block Not Updated, Try Again.</div>';
        }
        else
        {
            $msg = '<div class="alert alert-success alert-dismissable fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> Block updated Successfully.
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

                    <h2>Add Class</h2>
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
                    <h4>Add Block Detail</h4>
                    <p class="font-gray-dark">
                        Following are the Form in which you add the blocks.
                    </p>

                    <form class="form-horizontal form-label-left" method="post">

                        <div class="form-group">
                            <label class="control-label col-md-3" for="block_name">Block Name <span class="required">*</span>
                            </label>
                            <div class="col-md-7">
                                <input type="text" id="block_name" name="block" required="required" class="form-control col-md-7 col-xs-12">
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
                            <th>Delete</th>
                            <th>update</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $idd=0;
                        $com=mysqli_query($con,"select * FROM block");
                        if(mysqli_num_rows($com)>0)
                        {
                            while($row = mysqli_fetch_array($com))
                            {
                                $idd++;
                                echo ("<tr><td>$idd</td>");
                                echo ("<td>$row[block]</td>");
                                echo ("<td><a href='add_block.php?id=$row[id]'>Delete</a></td>");
								echo '<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal'.$row['id'].'">Update</button>';
								?>
													
					<div class="modal fade" id="modal<?php echo $row['id']; ?>" 
					tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" 
					aria-hidden="true">
					  <div class="modal-dialog" role="document">
						<div class="modal-content">
						  <div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							  <span aria-hidden="true">&times;</span>
							</button>
						  </div>
						  <div class="modal-body">
						  
						  <form  class="form-horizontal form-label-left" method="post">
						<div class="form-group">
                            <label class="control-label col-md-3" for="block_name">Block Name <span class="required">*</span>
                            </label>
                            <div class="col-md-7">
                                <input type="text" value="<?php echo $row[1]; ?>" id="block_name" name="block" required="required" class="form-control col-md-7 col-xs-12">
								<input type="hidden"value="<?php echo $row[0]; ?>" id="block_name" name="id" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

								   
								   
                        <div class="form-group">
                            <div class="col-md-7 col-md-offset-3">
                                <button type="submit" name="update" id="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>
							</div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						  </div>
						</div>
					  </div>
					</div>
								<?php 
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
  require "footer.php";
?>
