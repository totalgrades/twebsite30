@extends('admin.layouts.app')
@section('content')
    @include('admin.includes.sidebar')
    @include('admin.includes.top-nav')
        <!-- page content -->
        @include('admin.includes.top-info')
        
         <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <button type="button" class="btn btn-primary pull-right" id="newDoc-{{$category->id}}">New Documentation - {{$category->category_name}}</button>

                <div class="clearfix"></div>
                <div class="row" id="newDocRow-{{$category->id}}" style="display: none;">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Add New Documentation</h2>
                        
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <br />
                        <form id="newDocStudentsForm" enctype="multipart/form-data" method="post" action="{{ url('/admin/documentation/storenewdocpost', [$category->id]) }}" data-parsley-validate class="form-horizontal form-label-left">
                          {{ csrf_field() }}
                          <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" >
                          <input type="hidden" name="category_id" value="{{ $category->id }}" >

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="post-title">Title/Description <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="post_tile" name="post_title" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Documentation/Details <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <textarea class="summernote form-control col-md-7 col-xs-12" id="postBody" name="post_body"></textarea>
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
                              <button class="btn btn-primary" type="button" id="closeNewDoc-{{$category->id}}">Close</button>
                              <button type="submit" class="btn btn-success" id="ajaxSubmitNewDocStudents">Publish Documentation</button>
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
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <script type="text/javascript">
                  jQuery(document).ready(function(){

                                                  
                      $("#newDoc-{{$category->id}}").click(function(){
                         $("#newDocRow-{{$category->id}}").show(1000);
                      });
                      $("#closeNewDoc-{{$category->id}}").click(function(){
                         $("#newDocRow-{{$category->id}}").hide(1000);
                      });
                   });
                </script>

                <div class="x_panel">
                  <div class="x_title">
                    <h2>Documentation Table - {{$category->category_name}}<small></small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Title</th>
                          <th>Added By</th>
                          <th>Date Created</th>
                          <th>status</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                        @foreach($posts->where('category_id', $category->id) as $key=>$post)
                          <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->post_title}}</td>
                            <td>{{$post->user->name}}</td>
                            <td>{{$post->created_at}}</td>
                            <td>
                              @if($post->approved == 1)
                                Approve
                              @else
                                Pending...
                              @endif
                            </td>
                            <td>
                              @if($post->user->id == 1 || $post->user->id == Auth::user()->id)
                                <a class="btn btn-warning" href="{{url('admin/editdocumentation/'.$post->id)}}" role="button">Edit</a>
                                <a class="btn btn-danger" href="{{url('admin/deletedocpost/'.$post->id)}}" role="button" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                              @else
                                <a class="btn btn-danger" href="#" role="button" disabled>Edit</a>
                                <a class="btn btn-danger" href="#" role="button" disabled>Delete</a>
                              @endif

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
