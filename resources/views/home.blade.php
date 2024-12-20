@extends('layouts.app-private')
@section('content')
    @include('includes.private.sidebar')
    @include('includes.private.top-nav')
        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-suitcase" style="color:#F3BB45;"></i></div>
                  <div class="count">{{@$job_applications->count()}}</div>
                  <h3>Job Applications</h3>
                  <p>There are a total of {{@$job_applications->count()}} applications</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-envelope" style="color:#F3BB45;"></i></div>
                  <div class="count">{{@$contactus->count()}}</div>
                  <h3>Contact Submissions</h3>
                  <p>There are a total of {{@$contactus->count()}} submission</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-users" style="color:#F3BB45;"></i></div>
                  <div class="count">{{@$users->count()}}</div>
                  <h3>All Users</h3>
                  <p>There are a total of {{@$users->count()}} users</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-user-plus" style="color:#F3BB45;"></i></div>
                  <div class="count">{{@$users->count()}}</div>
                  <h3>Admin Users</h3>
                  <p>There are a total of {{@$users->count()}} admin users</p>
                </div>
              </div>
            </div>
          <!-- /top tiles -->

         

        </div>
        <!-- /page content -->   
    @include('includes.private.footer')                     
@endsection


