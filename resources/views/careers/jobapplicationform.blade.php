@extends('layouts.app-public')

@section('content')

            @include('includes.header')

            <!-- main-container start -->
			<!-- ================ -->
			<section class="main-container light-translucent-bg">
				
				<div class="container">
					<div class="row">
						@include('flash::message')
						<!-- main start -->
						<!-- ================ -->
						<div class="main col-md-8 col-md-offset-2">

							<!-- name-and-slogan -->
							<div class="site-slogan">
								<span style="font-style: normal;">You are applying for the</span> <strong>{{$job->job_title}}</strong> <span style="font-style: normal;">position. Good Luck!</span>
							</div>

							<div class="object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="300">
								<div class="form-block center-block">
									<h2 class="title">Application Form - {{$job->job_title}} </h2>
									<hr>
									<form class="form-horizontal" role="form" action="{{url('/careers/postjobapplicationform/')}}" method="POST" enctype="multipart/form-data">
									{{ csrf_field() }}

										<input type="hidden" name="job_id" class="form-control" id="inputJodId" value="{{$job->id}}" required>
										

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
											<label for="phone" class="col-sm-3 control-label">Phone Number <span class="text-danger small">*</span></label>
											<div class="col-sm-8">
												<input type="text" name="phone" class="form-control" id="inputUserName" placeholder="Phone Number" required>
												<i class="fa fa-phone form-control-feedback"></i>
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
											<label for="inputStreet" class="col-sm-3 control-label">Address <span class="text-danger small">*</span></label>
											<div class="col-sm-8">
												<textarea type="text" name="street" class="form-control" id="inputStreet" placeholder="Address" required></textarea>
												<i class="fa fa-map-pin form-control-feedback"></i>
											</div>
										</div>
										<div class="form-group has-feedback">
											<label for="inputCity" class="col-sm-3 control-label">City<span class="text-danger small">*</span></label>
											<div class="col-sm-8">
												<input type="text" name="city" class="form-control" id="inputCity" placeholder="Your City" required>
												<i class="fa fa-map-pin form-control-feedback"></i>
											</div>
										</div>
										<div class="form-group has-feedback">
											<label for="inputState" class="col-sm-3 control-label">State<span class="text-danger small">*</span></label>
											<div class="col-sm-8">
												<input type="text" name="state" class="form-control" id="inputState" placeholder="Your State" required>
												<i class="fa fa-map-pin form-control-feedback"></i>
											</div>
										</div>
										<div class="form-group has-feedback">
											<label class="col-sm-3 control-label" style="font-size: 12px;">Why do you think this position is for you?<span class="text-danger small">*</span></label>
											<div class="col-sm-8">
												<textarea type="text" name="reason_qualify" class="form-control" id="inputStreet" placeholder="Please tell us why you believe you are qualified for this position." required></textarea>
												<i class="fa fa-pencil form-control-feedback"></i>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label" for="exampleInputFile">CV Upload</label>
											<input type="file" name="applicant_cv"id="exampleInputFile" required="">
											<p class="help-block">Please upload your cv in pdf or doc format.</p>
										</div>
										
										<div class="form-group">
											<div class="col-sm-offset-3 col-sm-8">
												<div class="well">
												Please review the must-have requirements below:
												<ul class="list-icons">
													@foreach($job_requirements as $requirement)
														@if($requirement->must_have)
															<li><i class="icon-check"></i> {{$requirement->req_description}} </li>
														@endif
													@endforeach
												</ul>
												<div class="checkbox checkbox-success">
													<label>
														<input type="checkbox" name="must_haves" value="0"><input type="checkbox" name="must_haves" value="1" />
														<a><strong>Yes, I meet all the requirements listed above.</strong></a>
													</label>
												</div>
											    </div>
											</div>
										</div>
											
										<div class="form-group">
											<div class="col-sm-offset-3 col-sm-8">
												<div class="g-recaptcha" data-sitekey="{{env('RE_CAPTCHA_SITEKEY')}}"></div>
											</div>
										</div>


										<div class="form-group">
											<div class="col-sm-offset-3 col-sm-8">
												<button type="submit" class="btn btn-default"><strong>Submit Application</strong></button>
											</div>
										</div>
									</form>

									<div class="alert-danger">
                            
                                      <ul>
                                        @foreach($errors->all() as $error)

                                          <li> {{ $error }}</li>

                                        @endforeach

                                      </ul>
								</div>
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