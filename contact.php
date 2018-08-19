<?php
include("header.php")
?>

<?php
if(isset($_POST["submit"]))
{
	require("config.php");
	$comm = mysqli_query($con,"insert into contact(name, email, message) values('".$_POST['name']."','".$_POST['email']."','".$_POST['message']."')");
	if($comm)
	{
		echo "<script>alert('Successfully Submit')</script>";
	}
	else
	{
		echo "<script>alert('NO')</script>";
		//echo mysql_error($con);
	}
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
										<li><a href="javascript:void(0);"><i class="icon stroke icon-House"></i></a></li>
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
							<div class="col-md-5">
								<section class="section_contacts">
									<h2 class="ui-title-inner decor decor_mod-a">Get in Touch with us</h2>
									<!-- <p>Follow us on Social Media</p> -->
									<ul class="list-social list-inline">
										<li>
											<a href="javascript:void(0);"><i class="icon fa fa-facebook"></i></a>
										</li>
										<li>
											<a href="javascript:void(0);"><i class="icon fa fa-twitter"></i></a>
										</li>
										<li>
											<a href="javascript:void(0);"><i class="icon fa fa-google-plus"></i></a>
										</li>
										<li>
											<a href="javascript:void(0);"><i class="icon fa fa-linkedin"></i></a>
										</li>
										<li>
											<a href="javascript:void(0);"><i class="icon fa fa-behance"></i></a>
										</li>
										<li>
											<a href="javascript:void(0);"><i class="icon fa fa-vimeo"></i></a>
										</li>
										<li>
											<a href="javascript:void(0);"><i class="icon fa fa-whatsapp"></i></a>
										</li>
										<li>
											<a href="javascript:void(0);"><i class="icon fa fa-youtube-play"></i></a>
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
									<h2 class="ui-title-inner decor decor_mod-a">OUR LOCATION</h2>
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
												<input class="form-control" id="name" name="name" type="text" placeholder="Full Name" required>
											</div>
											<div class="col-md-6">
												<input class="form-control" id="email" name="email" type="text" placeholder="Email">
											</div>
											<div class="col-md-6">
												<input class="form-control" id="mobile" name="mobile" type="text" placeholder="Mobile">
											</div>
											<div class="col-xs-12">
												<textarea class="form-control" id="message" name="message" required rows="11"></textarea>
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

