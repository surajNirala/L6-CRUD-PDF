<!DOCTYPE html>
<html>
<head>
    <title>Books Management</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
</head>
<body>
  
<div class="container">
	<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="pull-right">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                            
                                {{ Auth::user()->name }}
                            
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                <input type="submit" class="btn btn-info" value="Logout">
                                    </form>
                    </ul>
                </div>
            </div>
        </nav>
    @yield('content')
</div>
   
</body>
</html>