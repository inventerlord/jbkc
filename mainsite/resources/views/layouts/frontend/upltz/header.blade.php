<div class="text-center">
    <a class="" href="https://jbizsolutions.com/"><img style="width: 320px" src="{{ asset('public/logo.png') }}"
            alt=""></a>

</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #ffffff!important">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="nv-right navbar-nav mr-auto">
            <li class="nav-item hc active">
                <a class="nav-link" href="{{ url('/') }}"><i class="fa fa-home"></i> <span
                        class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item hc dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="consultancy" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Consultancy
                </a>
                <div class="dropdown-menu" aria-labelledby="consultancy">
                    <a class="dropdown-item" href="{{ route('buisness.consult') }}">Business Consultancy</a>
                    <a class="dropdown-item" href="{{ route('it.consult') }}">IT Consultancy</a>
                </div>
            </li>
            <li class="nav-item hc dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="corporate" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Corporate Training
                </a>
                <div class="dropdown-menu" aria-labelledby="corporate">
                    <a class="dropdown-item" href="{{ route('buisness.corpo') }}">Business Training</a>
                    <a class="dropdown-item" href="{{ route('it.corpo') }}">IT Training</a>
                </div>
            </li>
            <li class="nav-item hc dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="corporate" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Professional Training
                </a>
                <div class="dropdown-menu" aria-labelledby="corporate">
                    <a class="dropdown-item" href="{{ route('buisness.prof') }}">Business Training</a>
                    <a class="dropdown-item" href="{{ route('it.prof') }}">IT Training</a>
                </div>
            </li>
            <li class="nav-item hc dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="corporate" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Academic
                </a>
                <div class="dropdown-menu" aria-labelledby="corporate">
                    <a class="dropdown-item" href="{{ route('buisness.scho') }}">Business School</a>
                    <a class="dropdown-item" href="#">IT School</a>
                </div>
            </li>
            <li class="nav-item hc">
                <a class="nav-link" href="{{ url('#') }}">
                    E-Solutions
                </a>

            </li>
            <li class="nav-item hc">
                <a class="nav-link" href="{{ url('#') }}">
                    Events
                </a>

            </li>

        </ul>
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item hc" style="padding-right: 10px;padding-left: 10px">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item hc" style="padding-right: 10px;padding-left: 10px">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item hc dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        @if (Auth::user()->role->id == 1 || Auth::user()->role->id == 3)
                            <a class="dropdown-item" href="{{ route('dashboard') }}">
                                {{ __('Dashboard') }}
                            </a>
                        @endif
                    </div>
                </li>
            @endguest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('contactform.form') }}"
                    style="background-color: #b5363a;padding: 3px 5px;border-radius: 20px;color: white;">
                    Contact US
                </a>

            </li>
        </ul>
    </div>
</nav>
