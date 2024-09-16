@extends('layouts.guest')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-4 col-lg-5 col-sm-6 col-12">
        <form method="POST" action="{{ route('login') }}" class="my-5">
          @csrf
          <div class="border rounded-2 p-4 mt-5">
            <div class="login-form">
              <a href="index.html" class="mb-4 d-flex">
                <img src="{{ asset('assets/images/logo.svg') }}" class="img-fluid login-logo"
                  alt="Earth Admin Dashboard" />
              </a>
              <h5 class="fw-light mb-5">Sign in to access dashboard.</h5>
              <div class="mb-3">
                <label class="form-label">Your Email</label>
                <input type="email" class="form-control" name="email" placeholder="Enter your email"
                  value="{{ old('email') }}" />
              </div>
              <div class="mb-3">
                <label class="form-label">Your Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter password"/>
              </div>
              <div class="d-flex align-items-center justify-content-between">
                <div class="form-check m-0">
                  <input class="form-check-input" type="checkbox" value="" id="rememberPassword" name="remember">
                  <label class="form-check-label" for="rememberPassword">Remember</label>
                </div>
                <a href="{{ route('password.request') }}" class="text-blue text-decoration-underline">Lost password?</a>
              </div>
              <div class="d-grid py-3 mt-4">
                <button type="submit" class="btn btn-lg btn-primary">
                  Login
                </button>
              </div>
                <div class="text-center pt-4">
                    <span>Don't have an account?</span>
                    <a href="{{ route('register') }}" class="text-blue text-decoration-underline ms-2">
                    Register</a>
                </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
