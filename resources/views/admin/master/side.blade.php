    <div id="wrapper" class="toggled" >
        <div class="overlay">

        </div>

        <!-- Sidebar -->
        <nav class="navbar navbar-inverse fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <div class="sidebar-header">
                    <div class="sidebar-brand">
                        <a target="_blank" rel="noopener noreferrer" href="{{url('/')}}">Ver site</a>
                    </div>
                </div>
                <li class="@if(Request::path()== 'admin') active @endif"><a href="{{url('/admin')}}">Home</a></li>
                <li class="@if(Request::is('admin/paginas')) active @endif"><a class="pages-icon" href="{{ url('admin/paginas') }}">Paginas</a></li>
                <li class="@if(Request::is('admin/fotografias')) active @endif"><a href="{{ url('admin/fotografias') }}">Fotografias</a></li>
                <li class="@if(Request::is('admin/videos')) active @endif"><a class="video-icon" href="{{ url('admin/videos') }}">Videos</a></li>
                <li class="@if(Request::is('admin/precos')) active @endif"><a href="{{ url('admin/precos') }}">Preços</a></li>
                <li class="dropdown">
                    <a href="#settings" class="dropdown-toggle"  data-toggle="dropdown">Utilizador<span class="caret"></span></a>
                    <ul class="dropdown-menu animated fadeInLeft" role="menu">
                        <div class="dropdown-header">Definições</div>
                        <li><a class="user-settings" href="#videos">Gestão</a></li>
                        <li><a class="logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /#sidebar-wrapper -->
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <button type="button" class="hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
                <span class="hamb-top"></span>
                <span class="hamb-middle"></span>
                <span class="hamb-bottom"></span>
            </button>
        </div>
        <div class="container">
            <div class="row">
