
            <!-- Navigation -->
            <nav class="navbar navbar-dark bg-primary ">
                <div class="navbar-header" >

                    <a style="color:white;" class="navbar-brand bg-primary" href="/dashboard">Albatroz-Admin</a>
                </div>
               
               

                <ul style="margin-top: 10px;" class="nav navbar-right navbar-top-links">
                    @if (Auth::user())
                    <li >
                        <button type="button" class="btn btn-primary dropdown-toggle" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell fa-fw"></i>
                            <span class="badge badge-danger badge-counter">{{ Auth::user()->unreadNotifications->count() }}</span>
                            <b class="caret"></b>
                        </button>
                        <ul class="dropdown-menu dropdown-alerts">
                            
                                
                            
                            @forelse (Auth::user()->unreadNotifications as $notifications)
                                @if($notifications->data == 1 )
                                <li>
                                    <a  data-toggle="modal" data-target="#requestsModal">
                                        <div>
                                            <i class="fa fa-tasks fa-fw"></i> New Reservation Requests

                                        </div>
                                    </a>
                                </li>
                               @endif
                              
                               @empty 
                               <li><a>There are no new notifications</a></li>

                            @endforelse
                               
                           
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


            <div class="modal fade" id="requestsModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="requestsModal">{{ __('New Reservation Requests') }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @foreach (Auth::user()->unreadNotifications as $notifications)
                            @if($notifications->data == 1)
                            <div class="alert alert-success" role="alert">
                                [{{ $notifications->created_at }}] User  has just registered.
                                <a href="/markAsRead/{{ $notifications->id }}" id="mark-as-read" class="float-right mark-as-read" data-id="{{ $notifications->id }}">
                                    Mark as read
                                </a>
                            </div>
                    
                            
                                <a href="#" id="mark-all">
                                    Mark all as read
                                </a>
                            
                           @endif
                          
                         
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>



            