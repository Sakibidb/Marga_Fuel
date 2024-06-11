<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Admin Login Page - Marga Admin</title>

		<meta name="description" content="Admin login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('backend/assets/font-awesome/4.5.0/css/font-awesome.min.css') }}" />

		<!-- text fonts -->
		<link rel="stylesheet" href="{{ asset('backend/assets/css/fonts.googleapis.com.css') }}" />

		<!-- ace styles -->
		<link rel="stylesheet" href="{{ asset('backend/assets/css/ace.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('backend/assets/css/ace-rtl.min.css') }}" />
	</head>

	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h4 class="header blue lighter bigger">
									<i class="ace-icon fa fa-coffee green"></i>
									Admin Login
								</h4>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<form method="POST" action="{{ route('login') }}">
												@csrf
												<fieldset>
													<label for="mobile" class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input placeholder="Admin mobile" id="mobile" type="mobile" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile" autofocus />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>
													@error('mobile')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
													@enderror

													<label for="password" class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>
													@error('password')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
													@enderror

													<div class="space"></div>

													<div class="clearfix">
														<label for="remember" class="inline">
															<input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="ace" />
															<span class="lbl"> Remember Me</span>
														</label>

														<button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">Login</span>
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>
										</div><!-- /.widget-main -->
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->
							</div><!-- /.position-relative -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div>
		</div><!-- /.main-container -->

		<!-- basic scripts -->
		<script src="{{ asset('backend/assets/js/jquery-2.1.4.min.js') }}"></script>
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='{{ asset('assets/js/jquery.mobile.custom.min.js') }}'>"+"<"+"/script>");
		</script>
	</body>
</html>
