
            <!-- Navigation -->
            <nav class="navbar navbar-dark bg-primary ">
                <div class="navbar-header" >

                    <a style="color:white;" class="navbar-brand bg-primary" href="/dashboard">Albatroz-Admin</a>
                </div>
               
               

                <ul style="margin-top: 10px;" class="nav navbar-right navbar-top-links">
                    @if (Auth::guest() == false)
                    <li >
                        <button type="button" class="btn btn-primary dropdown-toggle" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
                        </button>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-comment fa-fw"></i> New Comment
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                        <span class="pull-right text-muted small">12 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-envelope fa-fw"></i> Message Sent
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-tasks fa-fw"></i> New Task
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a class="text-center" href="#">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li> 
                    @endif
                    
                    @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                   
                  @else
                    <li class="dropdown">
                        <button type="button" class="btn btn-primary dropdown-toggle" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> {{ Auth::user()->name }} <b class="caret"></b>
                        </button>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="/"><i class="fa fa-home fa-fw "></i>{{ __('messages.home') }}</a>
                            </li>
                            
                            <li class="divider"></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                          
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>                            </li>
                        </ul>
                    </li>
                    @endif

                    <li  class="dropdown">
                        <button type="button" style="color: white" class="btn btn-primary dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="flag-icon flag-icon-{{Config::get('languages')[App::getLocale()]['flag-icon']}}"></span> {{ Config::get('languages')[App::getLocale()]['display'] }}
                        </button>
                        <ul class="dropdown-menu dropdown-user">
                        @foreach (Config::get('languages') as $lang => $language)
                            @if ($lang != App::getLocale())
                                    
                                    <li><a class="dropdown-item" href="{{ route('lang.switch', $lang) }}"><span class="flag-icon flag-icon-{{$language['flag-icon']}}"></span> {{$language['display']}}</a></a>
                                    </li>
                                    @endif
                        @endforeach
                        </ul>
                      </li>
                </ul>
                <!-- /.navbar-top-links -->

                
            </nav>