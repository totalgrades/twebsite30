@extends('admin.layouts.app')
@section('content')
    @include('admin.includes.sidebar')
    @include('admin.includes.top-nav')
        <!-- page content -->
        @include('admin.includes.top-info')
        
         <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <button type="button" class="btn btn-danger pull-right" id="newCategory">New Category</button>

                <div class="clearfix"></div>
                <div class="row" id="newCategoryRow" style="display: none;">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Add New Category</h2>
                        
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <br />
                        <form id="newCategoryForm" enctype="multipart/form-data" method="post" action="/admin/documentation/storenewcategory" data-parsley-validate class="form-horizontal form-label-left">
                          {{ csrf_field() }}
                          <input type="hidden" name="category_id" value="1" >
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="category_name" name="category_name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Description <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <textarea class="form-control col-md-7 col-xs-12" id="category_description" name="category_description"></textarea>
                            </div>
                          </div>
                         
                          <div class="ln_solid"></div>
                          <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                              <button class="btn btn-primary" type="button" id="closeNewCategory">Close</button>
                              <button type="submit" class="btn btn-success" id="ajaxSubmitNewCategory">Add Category</button>
                            </div>
                          </div>

                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <script type="text/javascript">
                  jQuery(document).ready(function(){

                                                  
                      $("#newCategory").click(function(){
                         $("#newCategoryRow").show(1000);
                      });
                      $("#closeNewCategory").click(function(){
                         $("#newCategoryRow").hide(1000);
                      });
                   });

                  $(function () {
                      $('#ajaxSubmitNewCategory').submit(function (e) {
                          e.preventDefault()  // prevent the form from 'submitting'
                          var url = e.target.action  // get the target
                          var formData = $(this).serialize() // get form data
                          $.post(url, formData, function (response) { // send; response.data will be what is returned
                              location.reload();
                          })
                      })
                  })

                </script>

                <div class="x_panel">
                  <div class="x_title">
                    <h2>Category Table<small></small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Description</th>
                          <th>Date Created</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                        @foreach($categories as $category)
                          <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->category_name}}</td>
                            <td>{{$category->category_description}}</td>
                            <td>{{$category->created_at}}</td>
                            <td>
                               <a class="btn btn-warning" id="editCategory-{{$category->id}}" role="button">Edit</a>
                               <a class="btn btn-danger" href="{{ url('admin/documentation/deletecategory/'.$category->id) }}" role="button">Delete</a>
                               <div class="row">
                            
                                <div class="col-md-12">
                                
                                <form class="form-horizontal" method="post" action="{{ url('/admin/documentation/storeeditcategory',[$category->id]) }}" id="ajaxFormEditCategory-{{$category->id}}" style="display: none;">
                                  {{ csrf_field() }}

                                  <div class="form-group" >
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category_name">Category Name </label>
                                    <input type="text" class="form-control col-md-7 col-xs-12" id="category_name" name="category_name" value="{{$category->category_name}}" required="">
                                  </div>
                                  <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="exampleTextarea">Description</label>
                                  <textarea id="category_description" class="form-control col-md-7 col-xs-12" name="category_description" required="">{{$category->category_description}}</textarea>
                                </div>
                                  <div class="form-group g-mb-25">
                                   <button type="submit" class="btn btn-success" id="ajaxSubmitEditCategory-{{$category->id}}">Update</button>
                                   <button type="button" class="btn btn-danger" id="ajaxCloseEditCategory-{{$category->id}}">Close</button>
                                 </div>
                                </form>
                                <!-- End General Controls -->
                               </div> 
                                <script>
                                   jQuery(document).ready(function(){
                                     $("#ajaxFormEditCategory-{{$category->id}}").addClass("noDisplay");
                                     
                                     $("#ajaxSubmitEditCategory-{{$category->id}}").click(function(){
                                        $("#ajaxFormEditCategory-{{$category->id}}").hide(1000);
                                     });
                                     $("#editCategory-{{$category->id}}").click(function(){
                                        $("#ajaxFormEditCategory-{{$category->id}}").show(1000);
                                     });
                                     $("#ajaxCloseEditCategory-{{$category->id}}").click(function(){
                                        $("#ajaxFormEditCategory-{{$category->id}}").hide(1000);
                                     });
                                  });
                                       $(function () {
                                           $('#ajaxFormEditCategory-{{$category->id}}').submit(function (e) {
                                               e.preventDefault()  // prevent the form from 'submitting'
                                               var url = e.target.action  // get the target
                                               var formData = $(this).serialize() // get form data
                                               $.post(url, formData, function (response) { // send; response.data will be what is returned
                                                   location.reload();
                                               })
                                           })
                                       })
                                   </script>
                            
                          </div>
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
