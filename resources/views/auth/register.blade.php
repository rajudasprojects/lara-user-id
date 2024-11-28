@extends('layout.app')
@section('content')

<div class="container">
    <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card form-holder">
                    <div class="card-body">
                        <h1>Register Form</h1>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group mt-2">
                                    <label for="user_nm">Name</label>
                                    <input type="text" name="user_nm" id="user_nm" class="form-control" placeholder="Name" required>
                                    @if($errors->has('user_nm'))
                                        <p class="text-denger">{{ $errors->first('user_nm') }}</p>
                                    @endif
                                </div>

                                <div class="form-group mt-2">
                                    <label for="user_id">User Id</label>
                                    <input type="text" name="user_id" id="user_id" class="form-control" placeholder="User id" required>
                                    @if($errors->has('user_id'))
                                        <p class="text-denger">{{ $errors->first('user_id') }}</p>
                                    @endif
                                </div>

                                <div class="form-group mt-2" >
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                                    @if($errors->has('password'))
                                        <p class="text-denger">{{ $errors->first('password') }}</p>
                                    @endif
                                </div>

                                <div class="form-group mt-2" >
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                                </div>
                                <div class="form-group mt-4" >
                                    <button type="submit" class="btn btn-primary">Register</button>
                                </div> 
                            </form>

                    </div>
                </div>
            </div>
    </div>
</div>
@endsection