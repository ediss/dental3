<!--

author: W3layouts

author URL: http://w3layouts.com

License: Creative Commons Attribution 3.0 Unported

License URL: http://creativecommons.org/licenses/by/3.0/

-->

<!DOCTYPE html>

<html lang="srb">

<head>

<title>Balša Božović - Kontakt</title>

<!-- for-mobile-apps -->

<meta name="viewport" content="width=device-width, initial-scale=1">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="keywords" content="Balsa Bozovic kontakt" />



<link rel="canonical" href="https://balsabozovic.rs/kontakt.php">

    <script>

        addEventListener("load", function () {

            setTimeout(hideURLbar, 0);

        }, false);



        function hideURLbar() {

            window.scrollTo(0, 1);

        }

    </script>

	

	<!-- css files -->

    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' /><!-- bootstrap css -->

    <link href="css/style.css" rel='stylesheet' type='text/css' /><!-- custom css -->

    <link href="css/fontawesome-all.css" rel="stylesheet"><!-- fontawesome css -->

	<!-- //css files -->

	

	<!-- google fonts -->

	<link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">

	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">

	<!-- //google fonts -->

	

	<!-- scrolling script -->

	<script>

		jQuery(document).ready(function($) {

			$(".scroll").click(function(event){		

				event.preventDefault();

				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);

			});

		});

	</script> 

	<!-- //scrolling script -->
	<!-- kod -->



	<?php include('kod-analitike.php');?>



	<!-- //kod -->
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body>

	<!-- header -->



	<?php include('header-1.php');?>



	<!-- //header -->



<!-- contact -->

<section class="mail pt-5">

	<div class="container pt-sm-5 pt-2">

		<h2 class="heading text-center mb-sm-5 mb-4">Kontakt </h2>

		<div class="row agileinfo_mail_grids">

			<div class="col-lg-8 agileinfo_mail_grid_right">

				<form action="kontakt-forma.php" method="post">

					<div class="row">

						<div class="col-md-6 wthree_contact_left_grid pr-md-0">

							<div class="form-group">

								<input type="text" name="name" class="form-control" placeholder="Ime" required="">

							</div>

							<div class="form-group">

								<input type="email" name="email" class="form-control" placeholder="E-mail" required="">

							</div>

						</div>

					</div>

					<div class="form-group">

						<textarea name="message" placeholder="Poruka" class="form-control" required=""></textarea>

					</div>
					<div class="g-recaptcha" data-sitekey="6Ldo2XUUAAAAADBFnbJyStsSlbOilmPUQJ8PD41n"></div><br/>

					<div class="submit-buttons">

						<input type="submit" value="Pošalji">

					</div>

				</form>

			</div>

			<div class="col-lg-4 col-md-6 mt-lg-0 mt-4 contact-img">

				<img src="images/balsa-bozovic-kontakt.jpg" class="img-fluid" alt="Balsa Bozovic" />

			</div>

		</div>

	</div>

</section>

<!-- //contact -->



	<!-- footer -->



	<?php include('footer.php');?>



	<!-- //footer -->



<!--model-forms-->

<!--/Login-->

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">

	<div class="modal-dialog modal-dialog-centered" role="document">

		<div class="modal-content">

			<div class="modal-header text-center">

				<button type="button" class="close" data-dismiss="modal" aria-label="Close">

					<span aria-hidden="true">&times;</span>

				</button>

			</div>

			<div class="modal-body">



				<div class="login px-4 mx-auto mw-100">

					<h5 class="text-center mb-4">Login Now</h5>

					<form action="#" method="post">

						<div class="form-group">

							<label class="mb-2">Email address</label>

							<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" required="">

							<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>

						</div>

						<div class="form-group">

							<label class="mb-2">Password</label>

							<input type="password" class="form-control" id="exampleInputPassword1" placeholder="" required="">

						</div>

						<div class="form-check mb-2">

							<input type="checkbox" class="form-check-input" id="exampleCheck1">

							<label class="form-check-label" for="exampleCheck1">Check me out</label>

						</div>

						<button type="submit" class="btn btn-primary submit mb-4">Sign In</button>

						<p class="text-center pb-4">

							<a href="#" data-toggle="modal" data-target="#exampleModalCenter2"> Don't have an account?</a>

						</p>

					</form>

				</div>

			</div>



		</div>

	</div>

</div>

<!--//Login-->

<!--/Register-->

<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-hidden="true">

	<div class="modal-dialog modal-dialog-centered" role="document">

		<div class="modal-content">

			<div class="modal-header text-center">

				<button type="button" class="close" data-dismiss="modal" aria-label="Close">

					<span aria-hidden="true">&times;</span>

				</button>

			</div>

			<div class="modal-body">

				<div class="login px-4 mx-auto mw-100">

					<h5 class="text-center mb-4">Register Now</h5>

					<form action="#" method="post">

						<div class="form-group">

							<label>First name</label>



							<input type="text" class="form-control" id="validationDefault01" placeholder="" required="">

						</div>

						<div class="form-group">

							<label>Last name</label>

							<input type="text" class="form-control" id="validationDefault02" placeholder="" required="">

						</div>



						<div class="form-group">

							<label class="mb-2">Password</label>

							<input type="password" class="form-control" id="password1" placeholder="" required="">

						</div>

						<div class="form-group">

							<label>Confirm Password</label>

							<input type="password" class="form-control" id="password2" placeholder="" required="">

						</div>



						<button type="submit" class="btn btn-primary submit mb-4">Register</button>

						<p class="text-center pb-4">

							<a href="#">By clicking Register, I agree to your terms</a>

						</p>

					</form>



				</div>

			</div>



		</div>

	</div>

</div>

<!--//Register-->

<!--//model-forms-->

    <!-- js -->

    <script src="js/jquery-2.2.3.min.js"></script>

    <script src="js/bootstrap.js"></script>

    <!-- //js -->

	

	<script src="js/smoothscroll.js"></script><!-- Smooth scrolling -->



    <!-- start-smoth-scrolling -->

    <script src="js/move-top.js"></script>

    <script src="js/easing.js"></script>

    <script>

        jQuery(document).ready(function ($) {

            $(".scroll").click(function (event) {

                event.preventDefault();

                $('html,body').animate({

                    scrollTop: $(this.hash).offset().top

                }, 900);

            });

        });

    </script>

    <script>

        $(document).ready(function () {

            /*

			var defaults = {

				  containerID: 'toTop', // fading element id

				containerHoverID: 'toTopHover', // fading element hover id

				scrollSpeed: 1200,

				easingType: 'linear' 

			 };

			*/



            $().UItoTop({

                easingType: 'easeOutQuart'

            });



        });

    </script>

    <!-- //end-smoth-scrolling -->



</body>

</html>