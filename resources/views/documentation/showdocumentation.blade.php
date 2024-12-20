@extends('layouts.app-public')

@section('content')

    @include('includes.header')

         <!-- main-container start -->
			<!-- ================ -->
			<section class="main-container">

				<div class="container">
					<div class="row">
						@if (count($errors) > 0)
							<div class="alert alert-danger">
	                            <ul>
	                                @foreach ($errors->all() as $error)
	                                    <li>{{ $error }}</li>
	                                @endforeach
	                            </ul>
	                          </div>

            			@endif

						<!-- main start -->
						<!-- ================ -->
						<div class="main col-md-8">

							<!-- page-title start -->
							<!-- ================ -->
							<h1 class="page-title"> {{ $post->post_title }}</h1>
							<!-- page-title end -->

							<!-- blogpost start -->
							<article class="clearfix blogpost full">
								<div class="blogpost-body">
									<div class="side">
										<div class="post-info">
											<span class="day">{{$post->created_at->day}}</span>
											<span class="month">{{substr($post->created_at->format('F'), 0,3)}} {{$post->created_at->year}}</span>
										</div>
										<div id="affix">
											<span class="share">Share This</span>
											<ul class="social-links clearfix">
												<li class="facebook">
													<a href="#"><i class="fa fa-facebook"></i></a>
												</li>
												<li class="twitter">
													<a href="#"><i class="fa fa-twitter"></i></a>
												</li>
											</ul>
										</div>
									</div>
									<div class="blogpost-content">
										<header>
											<div class="submitted">
												@if($post->category->category_name == "Questions")
														<strong>Question submitted {{$post->created_at->diffForHumans()}}</strong>
												@else
													<i class="fa fa-user pr-5"></i> by <a href="#">{{$post->user->name}}</a>
												@endif
												
											</div>
										</header>

										{!! $post->post_body !!}

									</div>
								</div>
								<footer class="clearfix">
									<ul class="links pull-left">
										<li><i class="fa fa-comment-o pr-5"></i> <a href="#">{{$post->comments->count()}} comments</a></li> 
										<!--<li><i class="fa fa-tags pr-5"></i> <a href="#">tag 1</a>, <a href="#">tag 2</a>, <a href="#">long tag 3</a> </li>-->
									</ul>
									<ul class="links pull-right">
										<li><i class="fa fa-edit pr-5"></i> <a href="#leaveCommentForm">Leave a Comment</a></li>
										
									</ul>

									
								</footer>
							</article>
							<!-- blogpost end -->

							<!-- comments start -->
							<div class="comments">
								<h2 class="title">There are {{$post->comments->count()}} comments</h2>

								<!-- comment start -->
								@foreach($comments as $comment)

									@if($comment->post_id == $post->id)

										<div class="comment clearfix">
											<div class="comment-content">
												<div class="comment-meta">By <a href="#">{{$comment->name}}</a> | {{$comment->created_at->diffForHumans()}}</div>
												<div class="comment-body clearfix">
													<p>{{$comment->post_comment}}</p>



													<button type="button" class="btn btn-primary pull-right" id="commentReply-{{$comment->id}}"><i class="fa fa-reply"></i> Reply</button>

													<!-- comments reply form start -->
													<div class="comments-form col-md-10 pull-right" id="replyCommentFormDiv-{{$comment->id}}" style="display: none;">
														<hr>
														<form enctype="multipart/form-data" method="post" action="{{ url('documentation/addreply', [$comment->id]) }}">
															 {{ csrf_field() }}

											              	<input type="hidden" name="comment_id" value="{{ $comment->id }}" >
											              	
															<div class="form-group has-feedback">
																<label for="name4">Full Name<span class="text-danger small">*</span></label>
																<input type="text" class="form-control" id="name" name="name" placeholder="" required>
																<i class="fa fa-user form-control-feedback"></i>
															</div>

															<div class="form-group has-feedback">
																<label for="name4">Email<span class="text-danger small">*</span></label>
																<input type="email" class="form-control" id="email" name="email" placeholder="" required>
																<i class="fa fa-envelope-o form-control-feedback"></i>
															</div>
															
															<div class="form-group has-feedback">
																<label for="message4">Your reply to {{$comment->name}}'s Comment<span class="text-danger small">*</span></label>
																<textarea class="form-control" rows="8" id="reply" name="reply" placeholder="" required></textarea>
																<i class="fa fa-comment-o form-control-feedback"></i>
															</div>

															<div class="form-group">
																<div class="g-recaptcha" data-sitekey="{{env('RE_CAPTCHA_SITEKEY')}}" style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
															</div>

															<button type="button" class="btn btn-danger" id="submitCommentReply-{{$comment->id}}">Close</button>
															<input type="submit" value="Submit" class="btn btn-default">
														</form>
														
													</div>
													<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
													<script type="text/javascript">
													  jQuery(document).ready(function(){
                      
													      $("#commentReply-{{$comment->id}}").click(function(){
													         $("#replyCommentFormDiv-{{$comment->id}}").show(1000);
													      });

													      $("#submitCommentReply-{{$comment->id}}").click(function(){
													         $("#replyCommentFormDiv-{{$comment->id}}").hide(1000);
													      });
													   });
													</script>
													<!-- comments reply form end -->
												</div>
											</div>

										@foreach($replies as $reply)

											@if($reply->comment_id == $comment->id)

												<!-- reply reply start -->
												<div class="comment clearfix">
													<div class="comment-content clearfix">
														<div class="comment-meta">By <a href="#">{{$reply->name}} <i class="fa fa-mail-forward"></i> {{$reply->comment->name}}</a> | {{$reply->created_at->diffForHumans()}}</div>
														<div class="comment-body clearfix">
															<p>{{$reply->reply}}</p>
															
															<!-- replies reply form start -->
																<div class="comments-form col-md-10 pull-right" id="replyReplyFormDiv-{{$reply->id}}" style="display: none;">
																	<hr>
																	<form enctype="multipart/form-data" method="post" action="{{ url('documentation/addreplyreply', [$reply->id]) }}">
																		 {{ csrf_field() }}

														              	<input type="hidden" name="comment_id" value="{{ $reply->id }}" >
														              	
																		<div class="form-group has-feedback">
																			<label for="name4">Full Name<span class="text-danger small">*</span></label>
																			<input type="text" class="form-control" id="name" name="name" placeholder="" required>
																			<i class="fa fa-user form-control-feedback"></i>
																		</div>

																		<div class="form-group has-feedback">
																			<label for="name4">Email<span class="text-danger small">*</span></label>
																			<input type="email" class="form-control" id="email" name="email" placeholder="" required>
																			<i class="fa fa-envelope-o form-control-feedback"></i>
																		</div>
																		
																		<div class="form-group has-feedback">
																			<label for="message4">Your reply to {{$reply->name}}'s reply<span class="text-danger small">*</span></label>
																			<textarea class="form-control" rows="8" id="replyreply" name="replyreply" placeholder="" required></textarea>
																			<i class="fa fa-comment-o form-control-feedback"></i>
																		</div>

																		<div class="form-group">
																			<div class="g-recaptcha" data-sitekey="{{env('RE_CAPTCHA_SITEKEY')}}" style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
																		</div>

																		<input type="submit" value="Submit" class="btn btn-default" id="submitreplyReply-{{$reply->id}}">
																	</form>
																	
																</div>
																<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
																<script type="text/javascript">
																  jQuery(document).ready(function(){
			                      
																      $("#replyReply-{{$reply->id}}").click(function(){
																         $("#replyReplyFormDiv-{{$reply->id}}").show(1000);
																      });

																      $("#submitReplyReply-{{$reply->id}}").click(function(){
																         $("#replyReplyFormDiv-{{$reply->id}}").hide(1000);
																      });
																   });
																</script>
																<!-- replies reply form end -->
														</div>
													</div>
												</div>
												<!-- reply reply end -->

											@endif
										@endforeach

										</div>
										<!-- comment end -->
									@endif
								@endforeach

							</div>
							<!-- comments end -->

							<!-- comments form start -->
							<div class="comments-form" id="leaveCommentForm">
								<h2 class="title">Add your comment</h2>
								<form enctype="multipart/form-data" method="post" action="{{ url('documentation/addcomment', [$post->id]) }}">
									 {{ csrf_field() }}

					              	<input type="hidden" name="post_id" value="{{ $post->id }}" >
					              	
									<div class="form-group has-feedback">
										<label for="name4">Full Name<span class="text-danger small">*</span></label>
										<input type="text" class="form-control" id="name" name="name" placeholder="" required>
										<i class="fa fa-user form-control-feedback"></i>
									</div>

									<div class="form-group has-feedback">
										<label for="name4">Email<span class="text-danger small">*</span></label>
										<input type="email" class="form-control" id="email" name="email" placeholder="" required>
										<i class="fa fa-envelope-o form-control-feedback"></i>
									</div>
									
									<div class="form-group has-feedback">
										<label for="message4">Your Comment<span class="text-danger small">*</span></label>
										<textarea class="form-control" rows="8" id="post_comment" name="post_comment" placeholder="" required></textarea>
										<i class="fa fa-comment-o form-control-feedback"></i>
									</div>

									<div class="form-group">
										<div class="g-recaptcha" data-sitekey="{{env('RE_CAPTCHA_SITEKEY')}}" style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
									</div>

									<input type="submit" value="Submit" class="btn btn-default">
								</form>
								
							</div>
							<!-- comments form end -->

						</div>
						<!-- main end -->

						<!-- sidebar start -->
						@include('documentation.sidebar')
						<!-- sidebar end -->

					</div>
				</div>
			</section>
			<!-- main-container end --> 

    @include('includes.footer')

@endsection
