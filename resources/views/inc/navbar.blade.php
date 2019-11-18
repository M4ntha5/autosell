<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">
      @guest
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'AutoSell') }}
        </a>
      @else
        <a class="navbar-brand" href="{{ url('/home') }}">
            {{ config('app.name', 'AutoSell') }}
        </a>
      @endguest
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->

            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="/about">Apie</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/ads">Skelbimai</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/orders">Mano uzsakymai</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/users">Users</a>
              </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="/signin">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="sinup">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                  <li class="nav-item">
                    <a class="nav-link" href="/orders">Mano uzsakymai</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/users">Users</a>
                  </li>


                    <li class="nav-item dropdown">
                          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                              {{ JWTAuth::user()->email }} <span class="caret"></span>
                          </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">


                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
