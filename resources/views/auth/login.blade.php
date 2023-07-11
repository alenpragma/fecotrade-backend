


<!doctype html>
<html lang="en" >
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <?php
      $company =App\Models\Company::first();
       ?>
         @if($company->company_name != null)
           <title>{{$company->company_name}}</title>
           @else
    <title>Company Name</title>
    @endif

      <!-- Favicon -->
      <link rel="shortcut icon" href="{{asset('assets1/images/favicon.ico')}}" />
      <link rel="stylesheet" href="{{asset('assets1/css/libs.min.css')}}">
      <link rel="stylesheet" href="{{asset('assets1/css/coinex.css?v=1.0.0')}}">  </head>
  <body class="" data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
    <!-- loader Start -->
    <div id="loading">
      <div class="loader simple-loader">
          <div class="loader-body"></div>
      </div>    </div>
    <!-- loader END -->
      <div style="background-image:  url('../../assets/images/auth/01.png')" >
        <div class="wrapper">
<section class="vh-100 bg-image">
    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-md-6 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="auth-form">
                          <div class="text-center">
                            @if($company->company_icon != null)
                            <img
                              src="{{asset("storage/Company/$company->company_image")}}"
                              alt="image"

                              width="100"

                            />
                            @else

                            @endif
                          </div>
                                <h2 class="text-center mb-4">Sign In</h2>
                                <form method="POST" action="{{ route('login') }}">
                                  @csrf
                                    <p>Member, sign in to continue</p>
                                    <div class="form-floating mb-3">
                                        <input id="user_name" type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{ old('user_name') }}" required autocomplete="user_name" autofocus>
                                        <label for="floatingInput">Username</label>
                                        @error('user_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                     <div class="form-floating mb-2">
                                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        <label for="Password">Password</label>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="d-flex justify-content-between  align-items-center flex-wrap">
                                        <div class="form-group">
                                            <div class="form-check">

                                                  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="Remember">Remember me?</label>
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            @if (Route::has('password.request'))

                                                  <a class="btn btn-link" href="{{ route('password.request') }}">Forgot Password?</a>

                                            @endif
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Sign In</button>
                                    </div>
                                    <!-- <div class="text-center mt-3">
                                        <p>or sign in with others account?</p>
                                    </div> -->
                                     <!-- <div class="d-flex justify-content-center ">
                                        <ul class="list-group list-group-horizontal   list-group-flush">
                                            <li class="list-group-item bg-transparent border-0">
                                            <a href="#"><img src="{{asset('assets/images/brands/01.png')}}" class="img-fluid avatar avatar-30 avatar-rounded" alt="img60"></a>
                                            </li>
                                            <li class="list-group-item bg-transparent border-0">
                                            <a href="#"><img src="{{asset('assets/images/brands/02.png')}}" class="img-fluid avatar avatar-30 avatar-rounded" alt="gm"></a>
                                            </li>
                                            <li class="list-group-item bg-transparent border-0">
                                            <a href="#"><img src="{{asset('assets/images/brands/03.png')}}" class="img-fluid avatar avatar-30 avatar-rounded" alt="im"></a>
                                            </li>
                                            <li class="list-group-item bg-transparent border-0">
                                            <a href="#"><img src="{{asset('assets/images/brands/04.png')}}" class="img-fluid avatar avatar-30 avatar-rounded" alt="li"></a>
                                            </li>
                                        </ul>
                                    </div> -->
                                </form>
                                <div class="new-account mt-3 text-center">
                                    <p>Don't have an account? <a class="" href="{{route('register')}}">Click
                                            here to sign up</a></p>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
        </div>
      </div>


    <!-- Backend Bundle JavaScript -->
    <script src="{{asset('assets1/js/libs.min.js')}}"></script>
    <!-- widgetchart JavaScript -->
    <script src="{{asset('assets1/js/charts/widgetcharts.js')}}"></script>
    <!-- fslightbox JavaScript -->
    <script src="{{asset('assets1/js/fslightbox.js')}}"></script>
    <!-- app JavaScript -->
    <script src="{{asset('assets1/js/app.js')}}"></script>
    <!-- apexchart JavaScript -->
    <script src="{{asset('assets1/js/charts/apexcharts.js')}}"></script>
  </body>
</html>
