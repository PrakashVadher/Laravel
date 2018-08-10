<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <!-- <script src="https://use.fontawesome.com/9712be8772.js"></script> -->
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <div class="navbar-header">

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>


                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                 <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>                        
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                        @else
                            
                            @role('Admin')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('permissions.index') }}">
                                    Permissions
                                </a>                                          
                                </li>
                            @endrole

                            @role('Admin')
                                <li class="nav-item">                                    
                                    <a class="nav-link" href="{{ route('roles.index') }}">
                                        Roles
                                    </a>                                    
                                </li>
                            @endrole

                            @role('Admin')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('users.index') }}">
                                            Users
                                    </a>                                         
                                </li>
                            @endrole

                            @role('Author|Admin')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('posts.index') }}">
                                        Posts
                                    </a>                                            
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('posts.create') }}">
                                        Create Post
                                    </a>                                            
                                </li>
                            @endrole 

                            <li class="nav-item dropdown">
                                <a href="#"  class="dropdown-toggle logout-menu" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <!-- <span class="caret"></span> -->
                                </a>                               

                                <ul class="dropdown-menu" role="menu">
                                    <li>                                        
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>                                  
                                
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @if(Session::has('flash_message'))
            <div class="container">      
                <div class="alert alert-success"><em> {!! session('flash_message') !!}</em>
                </div>
            </div>
        @endif 

        <div class="row">
            <div class="col-md-8 col-md-offset-2">              
                @include ('errors.list') {{-- Including error file --}}
            </div>
        </div>

        @yield('content')

    </div>    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>