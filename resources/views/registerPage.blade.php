@extends('layouts.masterLayoutLogin')


@section('content')


<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
            <div class="col-lg-7">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                    </div>
                    <form method="POST" action="{{ url('register') }}">
                        @csrf
                        
                        <div class="form-group">
                            <label for="is_admin" class=" col-form-label text-md-end">{{ __('Role') }}</label>
                            <select id="is_admin"  class="form-control @error('is_admin') is-invalid @enderror" aria-label="Select Role"  name="is_admin" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                <option selected>Open this select menu</option>
                                <option value="1">Admin</option>
                                <option value="0">User</option>
                                
                              </select>
                            @error('is_admin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name" class=" col-form-label text-md-end">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" aria-label="Your Name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email" class=" col-form-label text-md-end">{{ __('Email') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" aria-label="Your Email" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                        <label for="password" class=" col-form-label text-md-end">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" aria-label="Your Pasword" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation" class=" col-form-label text-md-end">{{ __('Password Confirmation') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                      
                        <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        
                    </form>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                    </div>
                    <div class="text-center">
                        <a class="small" href="/login">Already have an account? Login!</a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection