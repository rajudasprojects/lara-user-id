<!DOCTYPE html>
<html lang="en">
<head>
  <title>Learning Lara</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

@if (Route::has('login'))
    <div>
        @auth
        <nav class="navbar navbar-expand-sm bg-primary navbar-light">
            <div class="container-fluid ">
                <h1 class="text-white">Test Lab Lara</h1>
              <ul class="navbar-nav ms-auto">
                <li class="nav-item ">
                  <a class="nav-link active text-white" href="{{ url('/home') }}">Home</a>
                </li>
               <li class="nav-item">
                  <a class="nav-link text-white" href="{{ route('user.detail') }}">User Details</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="{{ route('logout') }}">Logout</a>
                </li>
              </ul>
            </div>
        </nav>

        @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
            @endif
        @endauth
    </div>
@endif

</body>
</html>
