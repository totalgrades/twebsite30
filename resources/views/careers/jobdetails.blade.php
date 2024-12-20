@extends('layouts.app-public')

@section('content')

            @include('includes.header')

            <!-- main-container start -->
			<!-- ================ -->
			<section class="main-container">

				<div class="container">
					<div class="row">

						<!-- main start -->
						<!-- ================ -->
						<div class="main col-md-10">

							<!-- page-title start -->
							<!-- ================ -->
							<h1 class="page-title">Position: {{@$job->job_title}}</h1>
							<!-- page-title end -->

							<!-- blogpost start -->
							<article class="clearfix blogpost full">
								<div class="blogpost-body">
									<div class="side">
										<div class="post-info">
											<span>Closes</span>
											<span class="day">{{@$job->date_closing->day}}</span>
											<span class="month">{{@$job->date_closing->format('M')}}</span>

										</div>
										
									</div>
									<div class="blogpost-content">
										<header>
											<div class="submitted">
												<strong>
												<i class="fa fa-clock-o pr-5"></i> Closing <a href="#">{{@$job->date_closing->diffForHumans()}}</a> &nbsp;&nbsp;&nbsp;
												<i class="fa fa-money pr-5"></i><a href="#">{{@$job->job_salary}}</a></div>
												</strong>
										</header>
										
										<strong><p>{{@$job->job_type}}</p></strong>
										<p>{{@$job->intro}}</p>
										<h3>{{@$job->about_us_title}}</h3>
										<p>{{@$job->about_us}}</p>
										<h3>{{@$job->d_and_r_title}}</h3>
										<p>{{@$job->duties_and_responsibilities}}</p>
										<h3>Requirements:</h3>
										<ul class="list-icons">
											@foreach($job_requirements as $requirement)
											<li><i class="icon-check"></i> {{$requirement->req_description}} </li>
											@endforeach
										</ul>
										<br>
										<p>{{@$job->afterword}}</p>
										

										
									</div>
								</div>
								<footer class="clearfix">
									<a href="{{ asset('/careers/jobapplicationform/'.Crypt::encrypt($job->id)) }}">
									<button type="button" class="btn btn-warning btn-lg btn-block">APPLY NOW</button>
									</a>
								</footer>
							</article>
							<!-- blogpost end -->
						</div>
						<!-- main end -->

					</div>
				</div>
			</section>
			<!-- main-container end -->
           
            @include('includes.footer')

            @include('includes.subfooter')
			
@endsection