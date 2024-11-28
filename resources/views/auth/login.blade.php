@extends('layout.app')
@section('content')

    <div class="container">
    <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card form-holder">
                    <div class="card-body">
                        <h1>Login Form</h1>
                            @if(Session::has('error'))
                                <p class="text-denger">{{ Session::get('error') }}</p>
                            @endif
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group mt-2">
                                    <label for="user_id">User Id </label>
                                    <input type="user_id" name="user_id" id="user_id" class="form-control" placeholder="user_id" required>
                                    @if($errors->has('user_id'))
                                        <p class="text-denger">{{ $errors->first('user_id') }}</p>
                                    @endif
                                </div>

                                <div class="form-group mt-2">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                                    @if($errors->has('password'))
                                        <p class="text-denger">{{ $errors->first('password') }}</p>
                                    @endif
                                </div>
                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </div>
                            </form>


                    </div>
                </div>
            </div>
    </div>
    </div>
@endsection