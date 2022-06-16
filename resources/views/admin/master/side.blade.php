

<!---NAVBAR VERTICAL--->


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/admin">Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto flex-column vertical-nav">

            <li class="nav-item @if(Request::is('/')) active @endif">
                <a class="nav-link" href="{{url('/')}}" target="_blank">Ver Site</a>
            </li>
            <li class="nav-item @if(Request::path()== 'admin') active @endif">
                <a class="nav-link" href="{{url('/admin')}} ">Administrator<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item @if(Request::is('paginas'))? active : @endif">
                <a class="nav-link" href="{{ url('admin/paginas') }}">Paginas</a>
            </li>
            <li class="nav-item @if(Request::is('Fotografias'))? active : @endif">
                <a class="nav-link" href="{{ url('admin/fotografias') }}">Fotografias</a>
            </li>
            <li class="nav-item @if(Request::is('Videos'))? active : @endif">
                <a class="nav-link" href="{{ url('admin/videos') }}">Videos</a>
            </li>
            <li class="nav-item @if(Request::is('Preços'))? active : @endif">
                <a class="nav-link" href="{{ url('admin/precos') }}">Preços</a>
            </li>
            </li>
        </ul>
  
        <div class="navbar-brand">
        @if (session('status'))
                       <!--- <div class="alert alert-success" role="alert">    -->
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ Auth::user()->name}}
                    {{ __('- you are logged in!') }}
      </div>
        <ul class="navbar-nav ml-auto">
               <!-- Authentication Links -->
               <li class="nav-item">
        <a class="nav-link" href="#">Conta</a>
      </li>
        @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @if (Route::has('register'))
        
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
        @endif
        @else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
        @endguest
        </ul>
        
    </div>
</nav>
