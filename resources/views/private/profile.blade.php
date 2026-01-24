@extends('layouts.app-private')
@section('content')
    @include('includes.private.sidebar')
    @include('includes.private.top-nav')
        <div class="right_col" role="main">
          <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Update Password</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  @if (session('status'))
                    <div class="alert alert-success">
                      {{ session('status') }}
                    </div>
                  @endif

                  <form class="form-horizontal form-label-left" method="POST" action="{{ route('private.profile.password') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
                      <label class="control-label col-md-4" for="current-password">Current Password</label>
                      <div class="col-md-6">
                        <input id="current-password" type="password" class="form-control" name="current_password" required autocomplete="current-password">
                        @if ($errors->has('current_password'))
                          <span class="help-block">
                            <strong>{{ $errors->first('current_password') }}</strong>
                          </span>
                        @endif
                      </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                      <label class="control-label col-md-4" for="password">New Password</label>
                      <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                        @if ($errors->has('password'))
                          <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                          </span>
                        @endif
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-4" for="password-confirm">Confirm New Password</label>
                      <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                      </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-success">Update Password</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    @include('includes.private.footer')
@endsection
