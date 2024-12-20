@extends('layouts.app-public')

@section('content')

            @include('includes.header')

            <!-- main-container start -->
			<!-- ================ -->
			<section class="main-container">

				<div class="container">
					<div class="row">
						@include('flash::message')

						<!-- main start -->
						<!-- ================ -->
						<div class="main object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="300">
							<div class="form-block center-block" style="width: 80%;">
								<h2 class="title">Contact Us</h2>
								<hr>
								<form class="form-horizontal" role="form" action="{{url('/postcontactform/')}}" method="POST">
									{{ csrf_field() }}
									<div class="form-group has-feedback">
										<label for="inputName" class="col-sm-3 control-label">First Name <span class="text-danger small">*</span></label>
										<div class="col-sm-8">
											<input type="text" name="first_name" class="form-control" id="inputName" placeholder="Fisrt Name" required>
											<i class="fa fa-user form-control-feedback"></i>
										</div>
									</div>
									<div class="form-group has-feedback">
										<label for="inputLastName" class="col-sm-3 control-label">Last Name <span class="text-danger small">*</span></label>
										<div class="col-sm-8">
											<input type="text" name="last_name" class="form-control" id="inputLastName" placeholder="Last Name" required>
											<i class="fa fa-user form-control-feedback"></i>
										</div>
									</div>
									
									<div class="form-group has-feedback">
										<label for="inputEmail" class="col-sm-3 control-label">Email <span class="text-danger small">*</span></label>
										<div class="col-sm-8">
											<input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email" required>
											<i class="fa fa-envelope form-control-feedback"></i>
										</div>
									</div>

									<div class="form-group has-feedback">
										<label for="inputPhone" class="col-sm-3 control-label">Phone <span class="text-danger small">*</span></label>
										<div class="col-sm-8">
											<input type="text" name="phone" class="form-control" id="inputPhone" placeholder="Phone" required>
											<i class="fa fa-phone form-control-feedback"></i>
										</div>
									</div>

									<div class="form-group has-feedback">
										<label class="col-sm-3 control-label">Message<span class="text-danger small">*</span></label>
										<div class="col-sm-8">
											<textarea type="text" name="message" class="form-control" id="inputStreet" placeholder="Please enter your message here" required></textarea>
											<i class="fa fa-pencil form-control-feedback"></i>
										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-offset-3 col-sm-8">
											<div class="g-recaptcha" data-sitekey="{{env('RE_CAPTCHA_SITEKEY')}}" style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
										</div>
									</div>

									
									<div class="form-group">
										<div class="col-sm-offset-3 col-sm-8">
											<button type="submit" class="btn btn-default"><strong>Submit</strong></button>
										</div>
									</div>
								</form>
							</div>
						</div>
						<!-- main end -->

					</div>
				</div>
			</section>
			<!-- main-container end -->
           
            @include('includes.footer')

            @include('includes.subfooter')
			
@endsection