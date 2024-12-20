@extends('admin.layouts.app')
@section('content')
    @include('admin.includes.sidebar')
    @include('admin.includes.top-nav')
        <!-- page content -->
        @include('admin.includes.top-info')
        
         <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                
                <div class="clearfix"></div>
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Editing Documentation - {{$post->post_title}}</h2>
                        
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <br />
                        <form  enctype="multipart/form-data" method="post" action="{{ url('/admin/updateeditdocumentation', [$post->id]) }}" data-parsley-validate class="form-horizontal form-label-left">
                          {{ csrf_field() }}
                          <input type="hidden" name="user_id" value="{{ $post->user_id }}" >
                          <input type="hidden" name="category_id" value="{{ $post->category_id }}" >

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="post-title">Title/Description <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="post_tile" name="post_title" required="required" class="form-control col-md-7 col-xs-12" value="{{ $post->post_title }}">
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Documentation/Details <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <textarea class="summernote form-control col-md-7 col-xs-12" id="postBody" name="post_body">{!! $post->post_body !!}</textarea>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Show Profile Picture <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="hidden" name="show_profile_picture" value="0"><input type="checkbox" name="show_profile_picture" value="1" /><span style="color: darkred;">Include my profile picture with this post</span>
                            </div>
                          </div>

                         
                          <div class="ln_solid"></div>
                          <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                              <button type="submit" class="btn btn-success" id="ajaxSubmitNewDocStudents">Update Documentation</button>
                            </div>
                          </div>

                        </form>
                        @if (count($errors) > 0)
                              
                          <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                          </div>

                        @endif
                      </div>
                    </div>
                  </div>
                </div>
                
              </div>

         
        </div>
        <!-- /page content -->   
    @include('admin.includes.footer')                     
@endsection
