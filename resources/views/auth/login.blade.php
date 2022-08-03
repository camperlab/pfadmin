@extends('layouts.auth')
@section('content')
    <main class="login-form pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">

                    <h3 class="mb-3 fw-normal ms-2">Mail admins login here to administer your domain.</h3>


                    <div class="bg-black bg-white border p-4">
                        <form method="POST" action="{{ route('login.post') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="mb-2 fw-bold" for="username">Login (email):</label>
                                <input
                                    type="text"
                                    id="username"
                                    class="form-control"
                                    name="username"
                                    required
                                    autofocus>
                                @if ($errors->has('username'))
                                    <span class="text-danger">{{ $errors->first('username') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label class="mb-2 fw-bold" for="password">Password:</label>
                                <input
                                    id="password"
                                    class="form-control"
                                    name="password"
                                    required>
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="d-flex justify-content-start">
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
