<!DOCTYPE html>

<html lang="en">

<head>

<title>Accounting Week UMN</title>

<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="description" content="Accounting Week UMN">

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

					<div style"margin: 20px 10px 0px 0px">	
						@foreach($logos as $logo)
						
						<img style="margin: 20px 0px 0px 10px" src="{{URL::to($logo->image)}}" height="110px"alt="">
						
						@endforeach
						</div>	
				<?php if(session('user')['deleted'] != 1): ?>
				<center><h1>WELCOME!</h1></center>

				<br>

				<center><h2><u>Profile Kelompok</u></h2>

				</br>

				<h3>

					Nama Kelompok : <?php echo session('user')['team_name']; ?> </br>

					Nama Anggota : <?php 
					$sname = session('user')['students_name'];
					
					$sname = json_encode($sname, true);
					$sname = json_decode($sname,true);
					$sname = implode(', ', array_flatten($sname));
					
					foreach ((array)$sname as $students){
						echo $sname;
					}
					?></br>

					Asal Sekolah/Perguruan Tinggi : <?php echo session('user')['institution_name']; ?> </br>

					Alamat Sekolah/Perguruan Tinggi : <?php echo session('user')['institution_address']; ?></br>

				</h3>

				

				<input type="submit" class="counter_form_button" value="Lanjut" onclick="location.href='{{URL::to('/rule_page')}}'"/>
			<?php else: ?>
				<center><h3>
					Akun anda terblokir atau didelete </br>
					mohon untuk menhubungi administrator atau pihak panitia</br>
					untuk login menggunakan akun ini</br>
					mohon maaf atas ketidak nyamanannya.</br></br>
					Panitia Accounting Week UMN
				</h3></center>
				</div>
			<?php endif ?>
			</div>

		</div>

	</div>

	<!-- Footer -->



	@extends('layout.institution.footer')

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