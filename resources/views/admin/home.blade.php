@extends('admin.layouts.app')
@section('content')
    @include('admin.includes.sidebar')
    @include('admin.includes.top-nav')
        <!-- page content -->
        @include('admin.includes.top-info')

         <div class="row">
              <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Create User</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    @if (session('status'))
                      <div class="alert alert-success">
                        {{ session('status') }}
                      </div>
                    @endif
                    <form class="form-horizontal form-label-left" method="POST" action="{{ route('admin.users.store') }}">
                      {{ csrf_field() }}

                      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="control-label col-md-4" for="name">Name</label>
                        <div class="col-md-6">
                          <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                          @if ($errors->has('name'))
                            <span class="help-block">
                              <strong>{{ $errors->first('name') }}</strong>
                            </span>
                          @endif
                        </div>
                      </div>

                      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label class="control-label col-md-4" for="email">Email</label>
                        <div class="col-md-6">
                          <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                          @if ($errors->has('email'))
                            <span class="help-block">
                              <strong>{{ $errors->first('email') }}</strong>
                            </span>
                          @endif
                        </div>
                      </div>

                      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label class="control-label col-md-4" for="password">Password</label>
                        <div class="col-md-6">
                          <input id="password" type="password" class="form-control" name="password" required>
                          @if ($errors->has('password'))
                            <span class="help-block">
                              <strong>{{ $errors->first('password') }}</strong>
                            </span>
                          @endif
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-4" for="password-confirm">Confirm Password</label>
                        <div class="col-md-6">
                          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-4">Admin User</label>
                        <div class="col-md-6">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" name="is_admin" value="1" {{ old('is_admin') ? 'checked' : '' }}>
                              Grant admin access
                            </label>
                          </div>
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                          <button type="submit" class="btn btn-success">Create User</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

         <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Users Table<small></small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>User Code</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Date Created</th>
                          <th>status</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                        @foreach($users as $user)
                          <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->registration_code}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at}}</td>
                            <td>
                              @if($user->is_admin == 1)
                                Admin User
                              @else
                                User
                              @endif
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
