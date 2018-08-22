<?php

if (isset($_POST['submit'])) {
    require 'Controllers/config.php';

    $query = mysqli_query($con,"select * from teacher where email='".$_POST['email']."' and password='".$_POST["password"]."' ");
    if (mysqli_num_rows($query)>0){

        $row = mysqli_fetch_array($query);

        session_start();
        $_SESSION['name']=$row[1];
        $_SESSION['temail']=$row[2];

        header("location:teacherhome.php");
    }
    else{
        $msg = "<strong>Alert!</strong> Wrong Username/Password";
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="favicon2.png" type="image/x-icon" rel="shortcut icon">
    <title>Admin Panel</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">

</head>

<body class="login">
<div>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form method="post" name="login">
                    <h1>Teacher Login Form</h1>
                    <div>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" />
                    </div>
                    <div>
                        <input type="password" name="password" id="password" class="form-control" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;" />
                    </div>
                    <div>
                        <button type="submit" name="submit" class="btn btn-default">Log in</button>
                    </div>


                    <?php if(isset($msg)){?>
                        <div class="alert alert-danger alert-dismissable fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <?php echo $msg; ?>
                        </div>
                    <?php   } ?>

                    <div>
                        <a href="index.php" style="margin: 10px;">Admin Login Here</a>
                    </div>
                    <div class="clearfix"></div>

                    <div class="separator">

                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <h1><i class="fa fa-paw"></i> Admin Panel!</h1>
                            <p>&copy;2018 All Rights Reserved.</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>

    </div>
</div>

<!-- Jquery -->
<script src="vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Jquery Validation -->
<script type="text/javascript" src="vendors/js/validate.min.js"></script>
<!-- Login Js -->
<script src="vendors/js/login.js"></script>
</body>
</html>
