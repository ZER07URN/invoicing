		<!-- content page -->
		<?php
		$bu = base_url();
		?>
		<div class="container-fluid h-100 h-sm-auto">
			<div class="row h-100 h-sm-auto">
				<div class="col-12 col-md-12 h-md-100  h-sm-auto order-2 order-md-1">
					<div class="row align-items-center h-100 h-sm-auto">
						<div class="col-10 col-md-10 col-lg-8 col-xl-6 mx-auto">
							<h1 class="font-weight-light mb-3 mt-4 content-color-secondary text-left">Invoicing<span class="font-weight-normal content-color-primary">PRO</span></h1>
							<h4 class="font-weight-light mb-4 content-color-secondary text-left">Welcome back,<br>Please sign in to your account.</h4>
							<div class="card mb-2">
								<div class="card-body p-0">
									<label for="inputEmail" class="sr-only">Email address</label>
									<input type="email" id="email" name="email" class="form-control form-control-lg border-0" placeholder="Email address" required="" autofocus="">
									<hr class="my-0">
									<label for="inputPassword" class="sr-only">Password</label>
									<input type="password" id="password" name="password" class="form-control form-control-lg border-0" placeholder="Password" required="">
								</div>
								<tr>
									<?php echo $captcha['image'] ?>
									<!-- <input type="text" name="captcha"> -->
									<input class="form-control" type="text" name="captcha" id="captcha">
									<input type="hidden" id="code" value="<?php echo $captcha['word'] ?>" name="code">
								</tr>
							</div>
							<div class="my-4 row">
								<div class="col-12 col-md">
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="customCheck1" checked>
										<label class="custom-control-label" for="customCheck1">Remember Me</label>
									</div>
								</div>
								<div class="col-12 col-md text-right">
									<!-- <a href="#" class="content-color-primary">Forgot Password?</a> -->
								</div>
							</div>
							<div class="text-left mb-4">
								<button class="btn btn-success btn-block pink-gradient" type="submit" id="loginBtn">Login</button>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- content page ends -->
		<script type="text/javascript">
			document.addEventListener("DOMContentLoaded", function(event) {

				$('[data-toggle="tooltip"]').tooltip();
				$(".preloader").fadeOut();

				$('#loginBtn').on('click', function() {


					var email = $('#email').val();
					var password = $('#password').val();
					var code = $('#code').val();
					var captcha = $('#captcha').val();

					// console.log(code, captcha);

					if (email == '' || password == '' || captcha == '') {
						Swal.fire({
							icon: 'error',
							title: 'Maaf!',
							text: 'Harap Lengkapi Semua Field!',
						})
					} else {
						$('#loginBtn').html('<i class="fas fa-spinner fa-spin"></i> Tunggu..');
						// $('#loginBtn').prop('disabled', true);
						// alert("gagal-")
						$.ajax({
							type: "POST",
							dataType: 'json',
							url: "<?php echo $bu; ?>Login/login_proses",
							data: {
								email: email,
								password: password,
								captcha: captcha,
								code: code,
							},
						}).done(function(e) {
							console.log(e);
							if (e.status) {
								$('#username').val('');
								$('#password').val('');
								$('#captcha').val('');

								Swal.fire({
									title: 'Sukses!',
									text: e.message,
									icon: 'success',
									confirmButtonText: 'Cool'
								})
								// window.location = '<?= $bu ?>Landing';

								setTimeout(() => {
									window.location = '<?= $bu ?>Landing';
								}, 1800);

							} else {
								Swal.fire({
									title: 'gagal!',
									text: e.message,
									icon: 'error',
									confirmButtonText: 'Cool'
								})
							}
						}).fail(function(e) {
							Swal.fire({
								title: 'gagal!',
								text: e.message,
								icon: 'error',
								confirmButtonText: 'Cool'
							})
						}).always(function() {
							toAlert();
							resetButton()
						});
					}
					// return false;;
				});

				function resetButton() {
					$('#loginBtn').html('Login');
					$('#loginBtn').prop('disabled', false);
				}

				function toAlert() {
					$('html, body').animate({
						scrollTop: $('#alertNotif').offset().top - 75
					}, 500);
				}
				// console.log("ddd")
			});
		</script>
