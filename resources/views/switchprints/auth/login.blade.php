@extends('switchprints.layouts.guest')
@push('styles')
<link rel="stylesheet" href="{{ asset('switchprints') }}/css/login.css" />
@endpush
@section('content')
    <div class="login">
      <header class="navigation">
        <div class="auth-container">
          <div class="auth-container-child"></div>
          <div class="user-auth-wrapper">
            <div class="user-auth">
              <div class="sign-in-block">
                <img class="user-254-1-icon" loading="lazy" alt="" src="{{ asset('switchprints') }}/public/user254-1.svg" />
              </div>
              <a class="sign-in">Sign in</a>
            </div>
          </div>
        </div>
        <div class="content">
          <img class="content-child" alt="" src="{{ asset('switchprints') }}/public/group-1.svg" />
        </div>
      </header>
      <section class="main">
        <form class="header" action="{{route('login')}}" method="post">
          @csrf
          <div class="header-child"></div>
          <div class="title-block-wrapper">
            <div class="title-block">
              <h1 class="log-into-your">Log into your account</h1>
              <div class="welcome-message">
                <div class="welcome-back">Welcome back!</div>
              </div>
            </div>
          </div>
          <div class="login-form">
            <div class="form">      @if ($errors->has('email'))
                  <span class="text-danger">{{ $errors->first('email') }}</span>
              @endif
              <div class="email">Email</div>
              <input class="input-field form-control" name="email" type="email" placeholder="Enter your email address"/>
              <!-- Display Error Message -->
        
            </div>
            <div class="password-field">
              <div class="form1">
                <div class="email">Password</div>
                <input class="input-field form-control" name="password" type="password" placeholder="*****************"/>
              </div>
              <img class="hidden-12115-1-icon" loading="lazy" alt="" src="{{ asset('switchprints') }}/public/hidden12115-1.svg"/>
            </div>
          </div>
          <div class="forgot-password">
            <div class="forgot-password1" id="forgotPasswordText">
              Forgot password?
            </div>
          </div>
          <div class="action-button">
            <button class="sign-in-button" id="signInButton" type="submit">
              <div class="sign-in1">Sign in</div>
            </button>
            <!-- <div class="registration-call">
              <div class="dont-have-an-account-parent" id="groupContainer">
                <div class="dont-have-an">Don’t have an account?</div>
                <div class="register1">Register</div>
              </div>
            </div> -->
          </div>
        </form>
      </section>
    </div>
<!-- Content end --> 
@endsection