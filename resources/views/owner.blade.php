<!DOCTYPE html>
<html>
<head>
    <title>Online Food Review</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>

        body { 
          background: url(images/bk2.jpg) no-repeat center center fixed; 
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;

          background-size: cover;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #e3f2fd;">
        <div class="container">
            <a class="navbar-brand mr-auto" href="#">Online Food Review</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="/ownerLogin">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ownerRegisterView') }}">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/">Switch to Customer Page</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('myRestaurantReview') }}">My Restaurant Review</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ownerSignout') }}">Log Out</a>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')

</body>

</html>