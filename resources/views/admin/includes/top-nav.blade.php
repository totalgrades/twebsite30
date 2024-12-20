<!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              
              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{asset('/gentelella/build/images/img.jpg')}}" alt="">{{Auth::user()->name}}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    
                    <li>
                      <a href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                              <i class="fa fa-btn fa-sign-out"></i>Logout
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                  </li>
                  </ul>
                </li>

             
                
                @if(Auth::user()->is_admin)
                <li role="presentation">
                  <a href="{{url('/admin/home')}}" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-user-plus"></i>Admin
                  </a>
                </li>
                @endif

              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->