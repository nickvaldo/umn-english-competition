<!DOCTYPE html>
<html lang="en">
<head>
<title>Unicat</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Unicat project">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="{{url('css/bootstrap4/bootstrap.min.css')}}">
<link href="{{url('plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{url('plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('plugins/OwlCarousel2-2.2.1/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('css/main_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('css/responsive.css')}}">
</head>
<body>

<div class="super_container">

	<!-- Header -->

	<header class="header">
		<!-- Header Content -->
		<div class="header_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="header_content d-flex flex-row align-items-center justify-content-start">
							<div class="logo_container">
								<a href="#">
									<div class="logo_text"></div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>		
	</header>

	<!-- Menu -->
	<!-- Home -->
	<!-- Features -->

	<div class="features">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<h2 class="section_title">PRE ELIMINATION TEST</h2>
						<h2 class="section_title">ACCOUNTING WEEK</h2>
					</div>
				</div>
			</div>
			<div class="row features_row">
				
				<!-- Course -->
				<div class="col-lg-4 course_col">
					<div class="course">
						<div class="course_image"><img src="{{url('images/gabungan.png')}}" alt=""></div>
						<div class="course_body">
						</div>
						<div class="course_footer">
							<div class="course_footer_content d-flex flex-row align-items-center justify-content-start">
								<div class="col fill_height">
									<form action = "http://localhost/umn-english-competition2/public/rand"counter_form_content d-flex flex-column align-items-center justify-content-center" action="get">
										<div class="counter_form_title">Login</div>
										<input type="text" class="counter_input" placeholder="Username:" required="required">
										<input type="password" class="counter_input" placeholder="Password:" required="required">
										<button type="submit" class="counter_form_button">Login</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-8 course_col">
					<div class="course">
						<div class="course_body">
							<div class="home_slider_container">
								<div class="owl-carousel owl-theme home_slider">
									<div class="owl-item">
										<div class="course_image"><img src="images/course_1.jpg" alt="" height="385"></div>
									</div>
									<div class="owl-item">
										<div class="course_image"><img src="images/course_2.jpg" alt="" height="385"></div>
									</div>
									<div class="owl-item">
										<div class="course_image"><img src="images/course_3.jpg" alt="" height="385"></div>
									</div>
								</div>
							</div>
							<div class="home_slider_nav home_slider_prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
							<div class="home_slider_nav home_slider_next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Footer -->

	<footer class="footer">
		<div class="footer_background" style="background-image:url(images/footer_background.png)"></div>
		<div class="container">
			<div class="row copyright_row">
				<div class="col">
					<div class="copyright d-flex flex-lg-row flex-column align-items-center justify-content-start">
						<div class="cr_text"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
						<div class="ml-lg-auto cr_links">
							<ul class="cr_list">
								<li><a href="#">Copyright notification</a></li>
								<li><a href="#">Terms of Use</a></li>
								<li><a href="#">Privacy Policy</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
</div>

<script src="{{url('js/jquery-3.2.1.min.js')}}"></script>
<script src="{{url('css/bootstrap4/popper.js')}}"></script>
<script src="{{url('css/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{url('plugins/greensock/TweenMax.min.js')}}"></script>
<script src="{{url('plugins/greensock/TimelineMax.min.js')}}"></script>
<script src="{{url('plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
<script src="{{url('plugins/greensock/animation.gsap.min.js')}}"></script>
<script src="{{url('plugins/greensock/ScrollToPlugin.min.js')}}"></script>
<script src="{{url('plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
<script src="{{url('plugins/easing/easing.js')}}"></script>
<script src="{{url('plugins/parallax-js-master/parallax.min.js')}}"></script>
<script src="{{url('js/custom.js')}}"></script>
</body>
</html>