

						<!-- sidebar start -->
						<aside class="col-md-3 col-md-offset-1">
							<div class="sidebar">
								<div class="block clearfix">
									<h3 class="title">Sidebar menu</h3>
									<div class="separator"></div>
									<nav>
										<ul class="nav nav-pills nav-stacked">

											@foreach($categories as $category)

												<li {{{ (Request::is('documentation/alldocumentation/'.$category->id) ? 'class=active' : '') }}}>
													<a href="{{url('/documentation/alldocumentation/'.$category->id)}}">{{$category->category_name}} ({{$posts->where('category_id', $category->id)->count()}})</a>
												</li>

											@endforeach
											
										</ul>
									</nav>
								</div>
								<!-- <div class="block clearfix">
									<h3 class="title">Latest tweets</h3>
									<div class="separator"></div>
									<ul class="tweets">
										<li>
											<i class="fa fa-twitter"></i>
											<p><a href="#">@lorem</a> ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, aliquid, et molestias nesciunt <a href="#">http://t.fd/adfasdfasd</a>.</p><span>16 hours ago</span>
										</li>
										<li>
											<i class="fa fa-twitter"></i>
											<p><a href="#">@lorem</a> ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, aliquid, et molestias nesciunt <a href="#">http://t.fd/adfasdfasd</a>.</p><span>16 hours ago</span>
										</li>
									</ul>
								</div> -->
							
							</div>
						</aside>
						<!-- sidebar end -->

					