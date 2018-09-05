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
				
					<div class="col-lg-4">
						<div class="course">
							<div class="imageLogo"><img src="{{url('images/gabungan.png')}}" alt="" height="100px" ></div>
						</div>
					</div>
					<div class="col-lg-5">
						<div class="course">
							<div class="timer">
								<h2 id="demo"></h2>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="course">
							<div class="timer">
							
							</div>
						</div>
					</div>
			</div>
			<div class="row features_row">
				<div class="col-lg-9 course_col">
					<div class="course">
						<div class="course_body">
							<h3><?php echo$quest[0]->question; ?></h3>				
						</div>
						<form action = "http://localhost/umn-english-competition2/public/edit/<?php echo $quest[0]->id; ?>" id="radiobuttoncollection" method= "post">
							<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
						<div class="course_body">
								<div class="radio">
								  <label><input type="radio" name="optradio" id="A" value="A"><?php echo$quest[0]->first_opt; ?></label>
								</div>
								<div class="radio">
								  <label><input type="radio" name="optradio" id="B" value="B"><?php echo$quest[0]->second_opt; ?></label>
								</div>
								<div class="radio">
								  <label><input type="radio" name="optradio" id="C" value="C"><?php echo$quest[0]->third_opt; ?></label>
								</div>
								<div class="radio">
								  <label><input type="radio" name="optradio" id="D" value="D"><?php echo$quest[0]->forth_opt; ?></label>
								</div>
						</div>
						<div class="course_body">
							<div class="row">
								<div class="col-lg-6">
									<input type="submit" class="counter_form_button" name="isijwb" value="Prev"/>
								</div>
								<div class="col-lg-6">
									<input type="submit" class="counter_form_button" name="isijwb" value="Next"/>
								</div>
							</div>
						</div>
						
					</div>
					
				</div>
				<div class="col-lg-3 course_col">
					<div class="course">
						<div class="course_body">
							<div style="height:350px;overflow:auto">
							<table style="width:100%">
							<?php
								$col = 0;
								foreach($showresult as $shows){
									if($col%4 == 0) { echo "<tr>"; }
									if($shows->answer_user == '0' or $shows->answer_user == ''){
										echo "<td><input type='submit' class=\"btn btn-danger custom\" name='isijwb' value='",$shows->number_soal,"' onclick=\"location.href='",url('edit',$shows->number_soal),"\"/></td>";
										//echo "<td><a href=\"http://localhost/umn-english-competition2/public/edit/",$shows->number_soal,"\" class=\"btn btn-danger custom\" role=\"button\">",$shows->number_soal,"</a></td>";
									}
									else{
										echo "<td><input type='submit' class=\"btn btn-success custom\" name='isijwb' value='",$shows->number_soal,"' onclick=\"location.href='",url('edit',$shows->number_soal),"\"/></td>";
										//echo $quest[($col+($row*4))]->soal_id;
										//echo "<td><a href=\"http://localhost/umn-english-competition2/public/edit/",$shows->number_soal,"\" class=\"btn btn-success custom\" role=\"button\">",$shows->number_soal,"</a></td>";
									}
									if($col%4 == 3) { echo "</tr>"; }
									$col++;
								}
							?>
							</table>
							</form>
							</div>
						</div>
						<div class="course_body">
							<button type="button" class="counter_form_button" data-toggle="modal" data-target="#myModal">Selesai</button>
						</div>
					</div>
				</div>
			</div>
			<!-- Modal -->
			<div id="myModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				  </div>
				  <div class="modal-body">
					<h4>Anda Yakin ingin menyudahi test ini?.</h4>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" onclick="location.href='{{url('score_page')}}'">Yes</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
				  </div>
				</div>

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
<script>
	var asd = <?php echo$quest[0]->answer_user;?>;
	if(asd != 0){
		document.forms["radiobuttoncollection"]["<?php echo$quest[0]->answer_user;?>"].checked=true;
	}
	
</script>
<script>
// Set the date we're counting down to
var countDownDate = new Date("<?php echo$quest[0]->time_close;?>").getTime();
// Update the count down every 1 second
var x = setInterval(function() {
    // Get todays date and time
    var now = new Date().getTime();
    // Find the distance between now an the count down date
    var distance = countDownDate - now;
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    // Output the result in an element with id="demo"
    document.getElementById("demo").innerHTML = days + "d " + hours + "h "
    + minutes + "m " + seconds + "s ";
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
    }
}, 1000);
</script>

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