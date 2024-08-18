<!DOCTYPE html>
<html>
  @include('head.head')

<body>

<section class="py-3 py-md-5">
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
        <div class="card border border-light-subtle rounded-3 shadow-sm mt-5">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <center>
              <h1  aria-current="page">tailwebs.</h1>
            </center>
            
            <form method="POST" action="{{ route('login.post') }}">

              @csrf

              @session('error')
                  <div class="alert alert-danger" role="alert"> 
                      {{ $value }}
                  </div>
              @endsession

              <input type="hidden" name="update_id" id="update_id">
              <div class="form-group">
                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                      <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"></path>
                      </svg>
                    </span>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com" required>
                  </div>
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
             
              <div class="form-group">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
                      <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2M5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1"/>
                      </svg>
                    </span>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" value="" placeholder="Password" required>
                    <span class="input-group-text password-toggle-icon" ><i class="fas fa-eye"></i></span>
                  </div>
                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>

              <div class="form-group">
                <div class="d-flex gap-2 justify-content-between">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" name="rememberMe" id="rememberMe">
                    <label class="form-check-label text-secondary" for="rememberMe">
                      Keep me logged in
                    </label>
                  </div>
                  <a href="#!" class="link-primary text-decoration-none">{{ __('forgot password?') }}</a>
              </div>
                <div class="form-group">
                  <center>
                    <button type="submit" class="modal-button-login" >{{ __('Login') }}</button>
                  </center>
                </div>
              <div class="form-group">
                <p class="m-0 text-secondary text-center">Don't have an account? <a href="{{ route('register') }}" class="link-primary text-decoration-none">Sign up</a></p>
              </div>
              
              
              
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  const passwordField = document.getElementById("password");
const togglePassword = document.querySelector(".password-toggle-icon i");

togglePassword.addEventListener("click", function () {
  if (passwordField.type === "password") {
    passwordField.type = "text";
    togglePassword.classList.remove("fa-eye");
    togglePassword.classList.add("fa-eye-slash");
  } else {
    passwordField.type = "password";
    togglePassword.classList.remove("fa-eye-slash");
    togglePassword.classList.add("fa-eye");
  }
});
</script>

</body>
</html>