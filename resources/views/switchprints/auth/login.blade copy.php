<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="{{ asset('switchprints') }}/css/global.css" />
    <link rel="stylesheet" href="{{ asset('switchprints') }}/css/login.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600&display=swap"
    />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,600;1,100&display=swap"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="login">
      <header class="navigation">
        <div class="auth-container">
          <div class="auth-container-child"></div>
          <div class="user-auth-wrapper">
            <div class="user-auth">
              <div class="sign-in-block">
                <img
                  class="user-254-1-icon"
                  loading="lazy"
                  alt=""
                  src="{{ asset('switchprints') }}/public/user254-1.svg"
                />
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
        <form class="header" action="" method="post">
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
            <div class="form">
              <div class="email">Email</div>
              <input class="input-field form-control" type="email" placeholder="Enter your email address"/>
            </div>
            <div class="password-field">
              <div class="form1">
                <div class="email">Password</div>
                <input class="input-field form-control" type="password" placeholder="*****************"/>
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
  </body>
</html>
