@extends('admin.layouts.app')
@section('content')
    @include('admin.includes.sidebar')
    @include('admin.includes.top-nav')
        <!-- page content -->
        @include('admin.includes.top-info')

         <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Schools Registration Table<small></small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>School Name</th>
                          <th>Portal Name</th>
                          <th>School Rep's name</th>
                          <th>Phone</th>
                          <th>Email</th>
                          <th>Address</th>
                          <th>City</th>
                          <th>State</th>
                          <th>About school</th>
                          <th>Read Policy</th>
                          <th>Date Created</th>
                          <th>status</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                        @foreach($school_registrations as $key => $reg)
                          <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$reg->school_name}}</td>
                            <td>{{$reg->preferedDomainName}}</td>
                            <td>{{$reg->full_name}}</td>
                            <td>{{$reg->phone}}</td>
                            <td>{{$reg->email}}</td>
                            <td>{{$reg->school_address}}</td>
                            <td>{{$reg->city}}</td>
                            <td>{{$reg->state}}</td>
                            <td>{{$reg->about_school}}</td>
                            <td>
                              @if($reg->must_agree == 1)
                                YES
                              @else
                                NO
                              @endif
                            </td>
                            <td>{{$reg->created_at->toFormattedDateString()}}</td>
                            <td>
                              <a class="btn btn-info" href="#" role="button">Approved</a>
                            </td>
                            <td>
                              <a class="btn btn-danger" href="#" role="button">Delete</a>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

         
        </div>
        <!-- /page content -->   
    @include('admin.includes.footer')                     
@endsection
