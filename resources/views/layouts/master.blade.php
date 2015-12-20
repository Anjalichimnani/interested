<!doctype html>
<html>
<head>

    <title>
        @yield('title','Interested')
    </title>

    <meta charset='utf-8'>

    <link rel="stylesheet" href="https://bootswatch.com/darkly/bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <link href="/css/Style.css" type='text/css' rel='stylesheet'>

    {{-- For CSS or anything else in head --}}
    @yield('head')


</head>
<body>

    @if(\Session::has('flash_message'))
        <div class='flash_message'>
            {{ \Session::get('flash_message') }}
        </div>
    @endif

    <div id="eventCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#eventCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#eventCarousel" data-slide-to="1"></li>
            <li data-target="#eventCarousel" data-slide-to="2"></li>
            <li data-target="#eventCarousel" data-slide-to="3"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="/images/Special.jpg" alt="Life event">
          <div class="carousel-caption">
                @if(Auth::check())
                    <h2 style="color:#800000"> Hi, {{ $user->name }} </h2>
                    <h3 style="color:#FFF"> Welcome to Events. Mark Your Interests and <br> Get Started </h3>
                @endif
          </div>
        </div>

        <div class="item">
          <img src="/images/Corporate.jpg" alt="Corporate Event">
          <div class="carousel-caption">
              @if(Auth::check())
                  <h2 style="color:#800000"> Hi, {{ $user->name }} </h2>
                  <h3 style="color:#FFF"> Welcome to Events. Mark Your Interests and <br> Get Started </h3>
              @endif
          </div>
        </div>

        <div class="item">
          <img src="/images/Fun.jpg" alt="Fun Event">
          <div class="carousel-caption">
              @if(Auth::check())
                  <h2 style="color:#800000"> Hi, {{ $user->name }} </h2>
                  <h3 style="color:#FFF"> Welcome to Events. Mark Your Interests and <br> Get Started </h3>
              @endif
          </div>
        </div>

        <div class="item">
          <img src="/images/Technical.jpg" alt="Technical Event">
          <div class="carousel-caption">
              @if(Auth::check())
                  <h2 style="color:#800000"> Hi, {{ $user->name }} </h2>
                  <h3 style="color:#FFF"> Welcome to Events. Mark Your Interests and <br> Get Started </h3>
              @endif
          </div>
        </div>

    </div>


</div>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <ul class="nav navbar-nav">
                    @if(Auth::check())
                        <li><a class="navbar-brand" href="/">Home</a></li>
                        <li><a class="navbar-brand" href='/interests'>Interested</a></li>
                        <li><a class="navbar-brand" href='/event/create'>Create</a></li>
                        <li><a class="navbar-brand" href='/organizers'>Organized</a></li>
                        <li><a class="navbar-brand" href='/users'>People</a></li>
                        <li><a class="navbar-brand" href='/logout'>Logout {{ $user->name }}</a></li>
                    @else
                        <li><a class="navbar-brand" href="/">Home</a></li>
                        <li><a class="navbar-brand" href='/login'>Login</a></li>
                        <li><a class="navbar-brand" href='/register'>Register</a></li>
                    @endif
                </ul>

            </div>
        </div>
    </nav>

    <section>
        {{-- Main Page Content will be yielded here --}}
        @yield('content')
    </section>

    <footer>
        &copy; Harvard Extension School - Dynamic Web Applications - {{ date('Y') }}
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    {{-- Yield any page specific JS files or anything else you might want at the end of the body --}}
    @yield('body')

</body>
</html>
