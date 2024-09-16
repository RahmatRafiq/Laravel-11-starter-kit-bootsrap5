@extends('layouts.guest')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-4 col-lg-5 col-sm-6 col-12">
        <form method="POST" action="{{ route('register') }}" class="my-5">
          @csrf
          <div class="border rounded-2 p-4 mt-5">
            <div class="login-form">
              <a href="index.html" class="mb-4 d-flex">
                <img src="assets/images/logo.svg" class="img-fluid login-logo" alt="Earth Admin Dashboard" />
              </a>
              <h5 class="fw-light mb-5">Create your admin account.</h5>
              <div class="mb-3">
                <label class="form-label" for="name">Your Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name"
                  value="{{ old('name') }}" />
              </div>
              <div class="mb-3">
                <label class="form-label">Your Email</label>
                <input type="text" name="email" id="email" class="form-control" placeholder="Enter your email"
                  value="{{ old('email') }}" />
              </div>
              <div class="mb-3">
                <label class="form-label">Your Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" />
              </div>
              <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                  placeholder="Re-enter password" />
              </div>
              <div class="d-flex align-items-center justify-content-between">
                <div class="form-check m-0">
                  <input class="form-check-input" type="checkbox" id="termsConditions" name="termsConditions" />
                  <label class="form-check-label" for="termsConditions">
                    I agree to the <a href="#" class="text-blue text-decoration-underline">Terms & Conditions</a>
                  </label>
                </div>
              </div>
              <div class="d-grid py-3 mt-4">
                <button type="submit" class="btn btn-lg btn-primary">
                  Signup
                </button>
              </div>
              <div class="text-center pt-4">
                <span>Already have an account?</span>
                <a href="login.html" class="text-blue text-decoration-underline ms-2">
                  Login</a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
