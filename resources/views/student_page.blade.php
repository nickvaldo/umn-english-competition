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
									<!--<div class="logo_text">Unic<span>at</span></div>-->
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
			<div class="row features_row">
				<!-- Course -->
				<div class="col-lg-12">
				<img src="{{url('images/gabungan.png')}}" alt="">
				<center><h1>WELCOME!</h1></center>
				<br>
				<center><h2><u>Profile Kelompok</u></h2>
				</br>
				<h3>
					Nama Kelompok : <?php echo session('user')['team_name']; ?> </br>
					Nama Anggota : ? </br>
					Asal Sekolah/Perguruan Tinggi : </br>
					Alamat Sekolah/Perguruan Tinggi :</br>
				</h3>
				
				<input type="submit" class="counter_form_button" value="Lanjut" onclick="location.href='{{URL::to('/rule_page')}}'"/>
				</div>
			</div>
		</div>
	</div>
	<!-- Footer -->

	<footer class="footer">
		<!--style="background-image:url(images/footer_background.png)"-->
		<div class="footer_background"></div>
		<div class="container">
			Supported By :  <img src="http://www.carlogos.org/logo/Mitsubishi-logo-2000x2500.png" height="100px">
							<img src="http://www.pngall.com/wp-content/uploads/2016/04/Toyota-Logo-PNG-Clipart.png" height="100px">
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
<script src="js/custom.js"></script>
</body>
</html>