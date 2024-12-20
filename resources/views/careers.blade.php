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
						<div class="main col-md-12">

							<!-- page-title start -->
							<!-- ================ -->
							<h1 id="tables" class="page-title">Job Openings</h1>
							<br>
							<!-- page-title end -->

							<table class="table table-hover">
								<thead>
									<tr>
										<th>#</th>
										<th>Job Title</th>
										<th>Date Posted</th>
										<th>Closing Date</th>
										<th>Apply</th>
									</tr>
								</thead>
								<tbody>
									@foreach($jobs as $key=>$job)
									<tr>
										<td>{{@$key+1}}</td>
										<td>{{@$job->job_title}}</td>
										<td>{{@$job->created_at->toFormattedDateString()}}</td>
										<td>
											{{@$job->date_closing->toFormattedDateString()}}
											<font color="#d3b61c"><strong>({{@$job->date_closing->diffForHumans()}})</strong></font>
										</td>
										<td>
											<a href="{{asset('/careers/jobdetails/'.Crypt::encrypt($job->id)) }}" class="btn radius btn-info btn-sm"><strong>Apply</strong></a>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						<!-- main end -->
					</div>
				</div>
			</section>
			<!-- main-container end -->
           
            @include('includes.footer')

            @include('includes.subfooter')
			
@endsection