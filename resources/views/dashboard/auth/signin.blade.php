@extends('dashboard.layouts.master2')
@section('css')
<!-- Sidemenu-respoansive-tabs css -->
<link href="{{URL::asset('dashboard/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
<style>
	.login-form {
		display: none;
	}
</style>
@endsection
@section('content')
		<div class="container-fluid">
			<div class="row no-gutter">
				<!-- The image half -->
				<div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
					<div class="row wd-100p mx-auto text-center">
						<div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
							<img src="{{URL::asset('dashboard/img/media/login.png')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
						</div>
					</div>
				</div>
				<!-- The content half -->
				<div class="col-md-6 col-lg-6 col-xl-5 bg-white">
					<div class="login d-flex align-items-center py-2">
						<!-- Demo content-->
						<div class="container p-0">
							<div class="row">
								<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
									<div class="card-sigin">
										<div class="mb-5 d-flex"> <a href=""><img src="{{URL::asset('dashboard/img/brand/favicon.png')}}" class="sign-favicon ht-40" alt="logo"></a><h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">Va<span>le</span>x</h1></div>
										<div class="card-sigin">
											<div class="main-signup-header">
												@if ($errors->any())
													<div class="alert alert-danger">
														<ul>
															@foreach ($errors->all() as $error)
																<li>{{ $error }}</li>
															@endforeach
														</ul>
													</div>
												@endif
												<select class="form-select" id="selectHowToLogin">
													<option selected>{{trans('dashboard/login.select-login')}}</option>
													<option value="user">{{trans('dashboard/login.user-login')}}</option>
													<option value="admin">{{trans('dashboard/login.admin-login')}}</option>
												  </select>
												  <br>
												  <br>
												  <div class="login-form" id="user">	
													<h4>{{trans('dashboard/login.user-login')}}</h4>
												  	<form method="POST" action="{{ route('login.user') }}">
														@csrf											
														<div class="form-group">
															<label>{{trans('dashboard/login.email')}}</label> <input class="form-control" placeholder="Enter your email" type="email" name="email" :value="old('email')" required autofocus>
															<x-input-error :messages="$errors->get('email')" class="mt-2" />
														</div>
														<div class="form-group">
															<label>{{trans('dashboard/login.password')}}</label> <input class="form-control" placeholder="Enter your password" type="password"
															name="password"
															required autocomplete="current-password">
															<x-input-error :messages="$errors->get('password')" class="mt-2" />
														</div>
														<button class="btn btn-main-primary btn-block">{{trans('dashboard/login.signin')}}</button>
														<div class="row row-xs">
															<div class="col-sm-6">
																<button class="btn btn-block"><i class="fab fa-facebook-f"></i> {{trans('dashboard/login.signin-facebook')}}</button>
															</div>
															<div class="col-sm-6 mg-t-10 mg-sm-t-0">
																<button class="btn btn-info btn-block"><i class="fab fa-twitter"></i> {{trans('dashboard/login.signin-twitter')}}</button>
															</div>
														</div>
													</form>
													<div class="main-signin-footer mt-5">
														<p><a href="">{{trans('dashboard/login.forget-pass')}}</a></p>
														<p>{{trans('dashboard/login.dont-have')}} <a href="{{ url('/' . $page='signup') }}">{{trans('dashboard/login.create-account')}}</a></p>
													</div>
												</div>
												<div class="login-form" id="admin">	
													<h4>{{trans('dashboard/login.admin-login')}}</h4>
													<form method="POST" action="{{ route('login.admin') }}">
														@csrf											
														<div class="form-group">
															<label>{{trans('dashboard/login.email')}}</label> <input class="form-control" placeholder="Enter your email" type="email" name="email" :value="old('email')" required autofocus>
															<x-input-error :messages="$errors->get('email')" class="mt-2" />
														</div>
														<div class="form-group">
															<label>{{trans('dashboard/login.password')}}</label> <input class="form-control" placeholder="Enter your password" type="password"
															name="password"
															required autocomplete="current-password">
															<x-input-error :messages="$errors->get('password')" class="mt-2" />
														</div>
														<button class="btn btn-main-primary btn-block">{{trans('dashboard/login.signin')}}</button>
														<div class="row row-xs">
															<div class="col-sm-6">
																<button class="btn btn-block"><i class="fab fa-facebook-f"></i> {{trans('dashboard/login.signin-facebook')}}</button>
															</div>
															<div class="col-sm-6 mg-t-10 mg-sm-t-0">
																<button class="btn btn-info btn-block"><i class="fab fa-twitter"></i> {{trans('dashboard/login.signin-twitter')}}</button>
															</div>
														</div>
													</form>
													<div class="main-signin-footer mt-5">
														<p><a href="">{{trans('dashboard/login.forget-pass')}}</a></p>
														<p>{{trans('dashboard/login.dont-have')}} <a href="{{ url('/' . $page='signup') }}">{{trans('dashboard/login.create-account')}}</a></p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div><!-- End -->
					</div>
				</div><!-- End -->
			</div>
		</div>
@endsection
@section('js')
<script>
	$('#selectHowToLogin').change(function(){
		var val = $(this).val();
		$('.login-form').each(function(){
			val === $(this).attr('id') ? $(this).show() : $(this).hide();
		});
	});
</script>
@endsection