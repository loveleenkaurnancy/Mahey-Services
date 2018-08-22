<?php 
if($type==="teacher")
{
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
                            <label class="control-label col-md-3" for="first-name">Teacher Name <span class="required">*</span>
                            </label>
                            <div class="col-md-7">
                                <input type="text" id="first-name" name="name" required="required" value="<?php echo $row['name']; ?>" class="form-control col-md-7 col-xs-12">
								<input type="hidden"name="id" required="required" value="<?php echo $row['id']; ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" for="email">Teacher Email<span class="required">*</span>
                            </label>
                            <div class="col-md-7">
                                <input type="email" name="email" id="email" class="form-control" value="<?php echo $row['email']; ?>" ="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" for="contact">Teacher Contact<span class="required">*</span>
                            </label>
                            <div class="col-md-7">
                                <input type="text" name="contact" id="contact" class="form-control" value="<?php echo $row['contact']; ?>" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" for="address">Teacher Address<span class="required">*</span>
                            </label>
                            <div class="col-md-7">
                                <input type="text" name="address" id="address" class="form-control" value="<?php echo $row['address']; ?>" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" for="password">Password<span class="required">*</span>
                            </label>
                            <div class="col-md-7">
                                <input type="password" name="password" id="password" class="form-control" value="<?php echo $row['password']; ?>" required="required">
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
<?php }
else if($type==="stu")
{
	
?>

<div class="modal fade" id="modal<?php echo $row['id']; ?>" 
tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" 
aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Student Updation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  
	  <form  class="form-horizontal form-label-left" method="post">

                        <div class="form-group">
                            <label class="control-label col-md-3" for="first-name">Student Name <span class="required">*</span>
                            </label>
                            <div class="col-md-7">
                                <input type="text" id="name" name="name" required="required" value="<?php echo $row['name']; ?>" class="form-control col-md-7 col-xs-12">
								<input type="hidden"name="id" required="required" value="<?php echo $row['id']; ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" for="blck">Block<span class="required">*</span>
                            </label>
                            <div class="col-md-7">
                                <input type="block" name="block" id="block" class="form-control" value="<?php echo $row['block']; ?>" ="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" for="contact">Class Name<span class="required">*</span>
                            </label>
                            <div class="col-md-7">
                                <input type="text" name="class_name" id="class_name" class="form-control" value="<?php echo $row['class_name']; ?>" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" for="address">RollNo<span class="required">*</span>
                            </label>
                            <div class="col-md-7">
                                <input type="text" name="rollno" id="rollno" class="form-control" value="<?php echo $row['rollno']; ?>" required="required">
                            </div>
                        </div>
						 <div class="form-group">
                            <label class="control-label col-md-3" for="password">Phone<span class="required">*</span>
                            </label>
                            <div class="col-md-7">
                                <input type="text" name="phno" id="phno" class="form-control" value="<?php echo $row['phno']; ?>" required="required">
                            </div>
                        </div>
						 <div class="form-group">
                            <label class="control-label col-md-3" for="password">Gender<span class="required">*</span>
                            </label>
                            <div class="col-md-7">
                                <input type="radio" name="gender" id="gender" value="Male" checked />Male
                                <input type="radio" name="gender" id="gender" value="Female" checked />Female
                            </div>
                        </div>
						 <div class="form-group">
                            <label class="control-label col-md-3" for="password">DOB<span class="required">*</span>
                            </label>
                            <div class="col-md-7">
                                <input type="date" name="dob" id="dob" class="form-control" value="<?php echo $row['dob']; ?>" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" for="password">Password<span class="required">*</span>
                            </label>
                            <div class="col-md-7">
                                <input type="text" name="password" id="password" class="form-control" value="<?php echo $row['password']; ?>" required="required">
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

<?php }
else if($type==="subject")
{
	
?>

<div class="modal fade" id="modal<?php echo $row['id']; ?>" 
tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" 
aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Subject</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  
	  <form  class="form-horizontal form-label-left" method="post">

                        <div class="form-group">
                            <label class="control-label col-md-3" for="first-name">Class Name <span class="required">*</span>
                            </label>
                            <div class="col-md-7">
                                <input type="text" id="class_id" name="class_id" required="required" value="<?php echo $row['class_id']; ?>" class="form-control col-md-7 col-xs-12">
								<input type="hidden"name="id" required="required" value="<?php echo $row['id']; ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" for="blck">Block<span class="required">*</span>
                            </label>
                            <div class="col-md-7">
                                <input type="block" name="block" id="block" class="form-control" value="<?php echo $row['block']; ?>" ="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" for="contact">Subject Name<span class="required">*</span>
                            </label>
                            <div class="col-md-7">
                                <input type="text" name="subject" id="subject" class="form-control" value="<?php echo $row['subject']; ?>" required="required">
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
<?php }
else if($type==="classs")
{
	
?>

<div class="modal fade" id="modal<?php echo $row['id']; ?>" 
tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" 
aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Block</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  
	  <form  class="form-horizontal form-label-left" method="post">

                        <div class="form-group">
                            <label class="control-label col-md-3" for="first-name">Class Name <span class="required">*</span>
                            </label>
                            <div class="col-md-7">
                                <input type="text" id="class_name" name="class_name" required="required" value="<?php echo $row['class_name']; ?>" class="form-control col-md-7 col-xs-12">
								<input type="hidden"name="id" required="required" value="<?php echo $row['id']; ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" for="block">Block<span class="required">*</span>
                            </label>
                            <div class="col-md-7">
                                <input type="block" name="block" id="block" class="form-control" value="<?php echo $row['block']; ?>" ="required">
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
<?php } ?>