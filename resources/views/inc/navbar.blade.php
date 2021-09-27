<nav  class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <img src="/images/logo.png" alt="logo" />
      <a class="navbar-brand" href="/">Albatroz<span> Lodge</span></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active"><a href="/" class="nav-link">{{ __('messages.home') }}</a></li>
          <li class="nav-item"><a href="/rooms" class="nav-link">{{ __('messages.chalets') }}</a></li>
          <li class="nav-item"><a href="/restaurant" class="nav-link">{{ __('messages.rest') }}</a></li>
          <li class="nav-item"><a href="/about" class="nav-link">{{ __('messages.about') }}</a></li>
          <li class="nav-item"><a href="/blog" class="nav-link">Blog</a></li>
          <li class="nav-item"><a href="/contact" class="nav-link">{{ __('messages.contact') }}</a></li>
       
            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a class="nav-link" style="cursor: pointer" data-toggle="modal" data-target="#loginModal">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" style="cursor: pointer" data-toggle="modal" data-target="#registerModal">{{ __('messages.register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                        @if (Auth::user()->user_type == 'Administrator' || Auth::user()->user_type == 'Manager' )
                        <a href="/login" class="dropdown-item">{{ __('messages.adminpanel') }}</a>
                        @endif

                    </div>
                </li>
            @endguest

            
<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <span class="flag-icon flag-icon-{{Config::get('languages')[App::getLocale()]['flag-icon']}}"></span> {{ Config::get('languages')[App::getLocale()]['display'] }}
  </a>
  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
  @foreach (Config::get('languages') as $lang => $language)
      @if ($lang != App::getLocale())
              <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}"><span class="flag-icon flag-icon-{{$language['flag-icon']}}"></span> {{$language['display']}}</a>
      @endif
  @endforeach
  </div>
</li>

        </ul>

       
      </div>
    </div>
  </nav>
<!-- END nav -->

@include('partials.login')
@include('partials.register')
@include('partials.review')


