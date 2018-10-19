@yield('content')
<footer class="footer">

			<!--style="background-image:url(images/footer_background.png)"-->

			<div class="footer_background"></div>

			<div class="container">

                Supported By :
                
                
                    @foreach($sponsors as $sponsor)
                
                    <img src="{{URL::to($sponsor->image)}}" height="100px">
                    
                    @endforeach
				<!--<img src="assets/upload/sponsor/lC7v0OKFu9NzQ2qQIK1Ual67IFLPf1kVxPyQ7IvQ.png" height="100px"> -->

				<div class="row copyright_row">

					<div class="col">



						<div class="copyright d-flex flex-lg-row flex-column align-items-center justify-content-start">

							<div class="cr_text">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

								Copyright &copy;
								<script>
									document.write(new Date().getFullYear());
								</script> All rights reserved | This template is made with
								<i class="fa fa-heart-o" aria-hidden="true"></i> by
								<a href="https://colorlib.com" target="_blank">Colorlib</a>

								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</div>

							<div class="ml-lg-auto cr_links">

								<ul class="cr_list">

									<li>
										<a href="#">Copyright notification</a>
									</li>

									<li>
										<a href="#">Terms of Use</a>
									</li>

									<li>
										<a href="#">Privacy Policy</a>
									</li>

								</ul>

							</div>

						</div>

					</div>

				</div>

			</div>

		</footer>