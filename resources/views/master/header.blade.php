<header class="header">
    <nav class="navbar navbar-expand-lg navbar-light order-lg-1">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav main-navbar justify-content-center">
                <li class="nav-item">
                    <a class="nav-link main-nav @if (Request::is('/')) active @endif"
                        href="{{ url('/') }}">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link main-nav @if (Request::is('sobre')) active @endif"
                        href="{{ url('sobre') }}">Sobre</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link main-nav @if (Request::is('fotografias')) active @endif"
                        href="{{ url('fotografias') }}">Fotografias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link main-nav @if (Request::is('videos')) active @endif"
                        href="{{ url('videos') }}">Filmes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link main-nav @if (Request::is('corporate')) active @endif"
                        href="{{ url('corporate') }}">Corporate</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link main-nav @if (Request::is('precos')) active @endif"
                        href="{{ url('precos') }}">Preços</a>
                </li>
                </li>
                <li class="nav-item">
                    <a class="nav-link main-nav @if (Request::is('contactos')) active @endif"
                        href="{{ url('contactos') }}">Contactos</a>
                </li>
            </ul>
        </div>

        </div>
    </nav>
    <a class="navbar-brand order-lg-0" href="/">
        <img class="img-logo" src="/img/logofinal.png" />
    </a>

</header>
