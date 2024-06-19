
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
<head>
	<meta charset="utf-8" />
	<title> Sign In | RMU </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
	<meta content="Themesbrand" name="author" />
	<!-- App favicon -->
	<link rel="shortcut icon" href="assets/images/favicon.ico">

	<!-- Layout config Js -->
	<script src="assets/js/layout.js"></script>
	<!-- Bootstrap Css -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<!-- Icons Css -->
	<link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
	<!-- App Css-->
	<link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
	<!-- custom Css-->
	<link href="assets/css/custom.min.css" rel="stylesheet" type="text/css" />
	<meta name="csrf-token" content="{{ csrf_token() }}" />

</head>

<body>

		<!-- auth page content -->
		<div class="auth-page-content">
			<div class="container">
			   <div class="row">
					<div class="col-lg-12">
						<div class="text-center mt-sm-5 mb-4 text-white-50">
						</div>
					</div>
				</div>
				<!-- end row -->

				<div class="row justify-content-center">
					<div class="col-md-8 col-lg-6 col-xl-5">
						<div class="card mt-4">

							<div class="card-body p-4">
								<div class="text-center mt-2">
									<h5 class="text-primary">Sign In</h5>
								</div>
								<div class="p-2 mt-4">
									<form>

										<div class="mb-3">
											<label for="username" class="form-label">Email</label>
											<input type="email" class="form-control" id="email" placeholder="Enter email" autocomplete="off" >
										</div>

										<div class="mb-3">
											<label class="form-label" for="password-input">Password</label>
											<div class="position-relative auth-pass-inputgroup mb-3">
												<input type="password" class="form-control pe-5 password-input" placeholder="Enter password" id="password"> <!-- value="123123123" -->
												<button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
											</div>
										</div>

										<div id="auth-error" class="text-center text-danger"></div>

										<div class="mt-4">
											<button id="auth-login" type="button" class="btn btn-success w-100" >Sign In</button>
										</div>
									</form>
								</div>
							</div>
							<!-- end card body -->
						</div>
						<!-- end card -->

					</div>
				</div>
				<!-- end row -->
			</div>
			<!-- end container -->
		</div>
		<!-- end auth page content -->
	</div>
	<!-- end auth-page-wrapper -->

	<!-- JAVASCRIPT -->
	
	
	<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="assets/libs/simplebar/simplebar.min.js"></script>
	<script src="assets/libs/node-waves/waves.min.js"></script>
	<script src="assets/libs/feather-icons/feather.min.js"></script>
	<script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
	<script src="assets/js/plugins.js"></script>

	<!-- particles js -->
	<!-- <script src="assets/libs/particles.js/particles.js"></script> -->
	<!-- particles app js -->
	<!-- <script src="assets/js/pages/particles.app.js"></script> -->
	<!-- password-addon init -->
	<script src="assets/js/pages/password-addon.init.js"></script>

	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/js-custom.js"></script>

	<script>
		$('#auth-login').click(function(event) {
			event.preventDefault();
			sessionStorage.removeItem("sidebar")
			localStorage.removeItem('current_module_id')
			localStorage.removeItem('current_roles')

			$('#auth-login').text('').prop('disabled', true).html(`<i class="bx bx-hourglass bx-spin font-size-16 align-middle me-2"></i>`);
			let newURL = baseUrl.replace('/api','')
		
			$.ajax({
				url: `${ newURL }/sanctum/csrf-cookie`, 
				type: 'GET', 
				success: function (data) { 
					$.ajax({
						url: `${ baseUrl }/login`, 
						type: 'POST', 
						dataType: 'json',
						data: { 
							email : $('#email').val(),
							password : $('#password').val()
						}, 
						success: function (data) { 
							console.log(data.success)
							if(!data.success){
								$('#auth-error').show().html(data.message)
								$('#auth-login').text('Log In').prop('disabled', false)
								
							}else{
								//if success set the token for authorization
								localStorage.setItem('data', JSON.stringify({ token:data.data.token, name:data.data.name, role:data.data.role}))
								
								$('#auth-error').hide().html('')
								$('#auth-login').text('Log In').prop('disabled', false)
								window.location.replace('layouts/dashboard.php')
							}
						// 	login.text('Log In').prop('disabled', false)
						},
						error: function(response) {
							$('#auth-error').show().html(response.responseJSON.message)
							$('#auth-login').text('Log In').prop('disabled', false)
						}
					});
				}
			});	
		});
	</script>
</body>
</html>