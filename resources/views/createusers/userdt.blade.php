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
<nav class="navbar navbar-expand-sm bg-primary navbar-light">
    <div class="container-fluid">
        <h1 class="text-white">Test Lab Lara</h1>
        <ul class="navbar-nav ms-auto">
        <li class="nav-item">
            <a class="nav-link text-white active" href="{{ url('/home') }}">Home</a>
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

@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block text-right">
        <strong>{{ $message }}</strong>
    </div>
@endif

<div class="container">
    <div class="text-right">
        <a href="create/user" class="btn btn-dark mt-2">Add User</a>
    </div>
    <div>
        <table class="table table-hover mt-3">
            <thead>
              <tr>
                <th>Sl.No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Image</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)

              <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->address }}</td>
                <td>
                    <img src="userimages/{{ $user->image }}" class="rounded-circle" width="30" height="30">
                </td>
                <td>
                    <a href="users/{{ $user->id }}/edit" class="btn btn-primary btn-sm">Edit</a>

                    <form method="POST" class="d-inline" action="users/{{ $user->id }}/delete">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
              </tr>
              @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
