<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="/">Laravel</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ \App\Services\Active::check('') }}">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item {{ \App\Services\Active::check('learn') }}">
                <a class="nav-link" href="{{ route('learn') }}">{{ __('Learn') }}</a>
            </li>
            <li class="nav-item dropdown {{ request()->is('realtime/*') ? 'active' : '' }}">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Realtime</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item {{ \App\Services\Active::check('realtime/template') }}" href="{{ route('template') }}">Vue method One</a>
                    <a class="dropdown-item {{ \App\Services\Active::check('realtime/ajax') }}" href="{{ route('ajax') }}">Vue Ajax method</a>
                    <a class="dropdown-item {{ \App\Services\Active::check('realtime/chart') }}" href="{{ route('chart') }}">Vue Chart Line</a>
                    <a class="dropdown-item {{ \App\Services\Active::check('realtime/pie-chart') }}" href="{{ route('pie-chart') }}">Pie Chart</a>
                    <a class="dropdown-item {{ \App\Services\Active::check('realtime/chat') }}" href="{{ route('chat') }}">Chat</a>
                </div>
            </li>
            <li class="nav-item {{ \App\Services\Active::check('login') }}">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            <li class="nav-item {{ \App\Services\Active::check('register') }}">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
