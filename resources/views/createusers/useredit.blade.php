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
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card mt-3 p-3">
                <h2 class="text-primary">Edit User: {{ $useredit->name }}</h2>

                <form  method="POST" action="/users/{{ $useredit->id }}/update" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $useredit->name) }}">
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $useredit->email) }}">
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $useredit->phone) }}">
                        @if ($errors->has('phone'))
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <textarea name="address" id="address" class="form-control" >{{ old('address', $useredit->address) }}</textarea>
                        @if ($errors->has('address'))
                            <span class="text-danger">{{ $errors->first('address') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="phone">Image:</label>
                        <input type="file" name="image" id="image" class="form-control">
                        @if ($errors->has('image'))
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                        @endif
                    </div>

                        <button type="submit" class="btn btn-primary mt-2">Submit</button>

                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
