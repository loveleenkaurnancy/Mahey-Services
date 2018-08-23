<?php
include("header.php");
require("admin/Controllers/config.php");

if(isset($_POST["submit"]))
{
	$name = $_POST['name'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$message = $_POST['message'];

	$query = mysqli_query($con,"insert into contact(name, email,mobile, message) values ('$name', '$email', '$mobile', '$message')");
	if($query)
	{
		$msg = "Successfully Submit";
	}
	else
	{
		echo mysqli_error($con);
	}




$to = "maheyservices@gmail.com";
$subject = "Contact Form ";

$message = "
<html>
<head>
<title>Contact Form</title>
</head>
<body>
<table>
<tr>
<th>Name</th>
<td>$name</td>
</tr>

<tr>
<th>Email</th>
<td>$email</td>
</tr>

<tr>
<th>Mobile</th>
<td>$mobile</td>
</tr>

<tr>
<th>Message</th>
<td>$message</td>
</tr>

</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: '. $email . "\r\n";
//$headers .= 'From: $email\r\nReply-to: $email'."\r\n";

mail($to,$subject,$message,$headers);



}
?>


				<div class="wrap-title-page">
					<div class="container">
						<div class="row">
							<div class="col-xs-12"><h1 class="ui-title-page">contact us</h1></div>
						</div>
					</div><!-- end container-->
				</div><!-- end wrap-title-page -->


				<div class="section-breadcrumb">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<div class="wrap-breadcrumb clearfix">
									<ol class="breadcrumb">
										<li><a href="home"><i class="icon stroke icon-House"></i></a></li>
										<li class="active">CONTACT Us</li>
									</ol>
								</div>
							</div>
						</div><!-- end row -->
					</div><!-- end container -->
				</div><!-- end section-breadcrumb -->


				<main class="main-content">

					<div class="container">
						<div class="row">

						<?php if(isset($msg)){?>
                		<div class="alert alert-success alert-dismissable fade in">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	             			<?php echo $msg; ?>
                		</div>
						<?php   } ?>
						
							<div class="col-md-5">
								<section class="section_contacts">
									<h2 class="ui-title-inner decor decor_mod-a">Get in Touch with us</h2>
									<!-- <p>Follow us on Social Media</p> -->
									<ul class="list-social list-inline">
										<li>
											<a href="https://www.facebook.com/" target="_blank"><i class="icon fa fa-facebook"></i></a>
										</li>
										<li>
											<a href="https://www.twitter.com" target="_blank"><i class="icon fa fa-twitter"></i></a>
										</li>
										<li>
											<a href="https://plus.google.com/" target="_blank"><i class="icon fa fa-google-plus"></i></a>
										</li>
										<li>
											<a href="https://www.linkedin.com" target="_blank"><i class="icon fa fa-linkedin"></i></a>
										</li>
										<!-- <li>
											<a href="javascript:void(0);"><i class="icon fa fa-behance"></i></a>
										</li>
										<li>
											<a href="javascript:void(0);"><i class="icon fa fa-vimeo"></i></a>
										</li>
										<li>
											<a href="javascript:void(0);"><i class="icon fa fa-whatsapp"></i></a>
										</li> -->
										<li>
											<a href="https://www.youtube.com" target="_blank"><i class="icon fa fa-youtube-play"></i></a>
										</li>
									</ul>
									<ul class="list-contacts list-unstyled">
										<li class="list-contacts__item">
											<i class="icon stroke icon-Phone2"></i>
											<div class="list-contacts__inner">
												<div class="list-contacts__title">PHONE</div>
												<div class="list-contacts__info">+91-98551-65444<p>+91-98556-65444</p></div>
											</div>
										</li>
										<li class="list-contacts__item">
											<i class="icon stroke icon-Mail"></i>
											<div class="list-contacts__inner">
												<div class="list-contacts__title">EMAIL</div>
												<div class="list-contacts__info">maheyservices@gmail.com</div>
											</div>
										</li>
										<li class="list-contacts__item">
											<i class="icon stroke icon-WorldWide"></i>
											<div class="list-contacts__inner">
												<div class="list-contacts__title">WEB</div>
												<div class="list-contacts__info">www.maheyservices.com</div>
											</div>
										</li>
										<li class="list-contacts__item">
											<i class="icon stroke icon-House"></i>
											<div class="list-contacts__inner">
												<div class="list-contacts__title">location</div>
												<div class="list-contacts__info">Model House <br>Jalandhar, Punjab-144004</div>
											</div>
										</li>
									</ul>
								</section><!-- end section_contacts -->
							</div><!-- end col -->

							<div class="col-md-7">
								<div class="section_map">
									<h2 class="ui-title-inner decor decor_mod-a">LOCATE US</h2>
									<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13635.537279354028!2d75.54441178206262!3d31.306942253049645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391a5ae01379de91%3A0xcb3ff12ddd4032f0!2sModel+House%2C+Jalandhar%2C+Punjab!5e0!3m2!1sen!2sin!4v1534695120737" width="670" height="505" frameborder="0" style="border:0;display: block;max-width: 100%;" allowfullscreen></iframe>
									
								</div>
							</div><!-- end col -->
						</div><!-- end row -->
					</div><!-- end container -->


					<section class="section_contacts-form">
						<div class="container">
							<div class="row">
								<div class="col-sm-8">
									<h2 class="ui-title-block">Send <strong>Us Message</strong></h2>
									<div class="wrap-subtitle">
										<div class="ui-subtitle-block ui-subtitle-block_w-line">If you have some feedback or want to ask any questions</div>
									</div><!-- end wrap-title -->
									<form class="form-contact ui-form" method="post">
										<div class="row">
											<div class="col-xs-12">
												<input class="form-control" id="name" name="name" type="text" placeholder="Full Name" required pattern='[A-Za-z \\s]*' title="Enter Characters">
											</div>
											<div class="col-md-6">
												<input class="form-control" id="email" name="email" type="email" placeholder="Email">
											</div>
											<div class="col-md-6">
												<input class="form-control" id="mobile" name="mobile" type="text" placeholder="Mobile" required pattern= "[0-9]{10}" title="Enter 10 digit Mobile Number">
											</div>
											<div class="col-xs-12">
												<textarea class="form-control" id="message" name="message" placeholder="Message" required rows="11" pattern='[A-Za-z \\s]*' title="Enter Characters"></textarea>
												<button type="submit" name="submit" class="btn btn-primary btn-effect">SEND NOW</button>
											</div>
										</div>
									</form>
								</div><!-- end col -->


								<div class="col-sm-4">
									<a href="javascript:void(0);" class="support">
										<img class="img-responsive" src="assets/media/support/1.jpg" height="248" width="330" alt="Foto">
										<div class="support__title"><i class="icon stroke icon-Headset"></i>live support available</div>
									</a>
								</div><!-- end col -->

							</div><!-- end row -->
						</div><!-- end container -->
					</section><!-- end section_contacts-form -->

				</main><!-- end main-content -->


<?php
include("footer.php");
?>

