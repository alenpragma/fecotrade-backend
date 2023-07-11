

<!doctype html>
<html lang="en" >
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
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

                        <h2 class="text-center mb-4">Sign Up</h2>
                        <form method="POST" action="{{ route('register') }}">
                          @csrf
                           <p>Register here to join Fecotrade community</p>
                           <div class="row">
                              <div class="col-md-6 mb-4">
                                  <div class="form-floating mb-3">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        <label for="firstName">Name</label>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                              </div>
                              <div class="col-md-6 mb-4">
                                 <div class="form-floating mb-3">
                                        <input id="user_name" type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{ old('user_name') }}" required autocomplete="suer_name" autofocus>
                                        <label for="lastName">Username</label>
                                        @error('user_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6 mb-4">
                                  <div class="form-floating mb-3">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                        <label for="floatingInput">Email</label>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                              </div>
                              @if(isset($_GET['ref']))
                              <div class="col-md-6 mb-4">
                                 <div class="form-floating mb-3">
                                       <input type="text" class="form-control" value="{{$_GET['ref']}}" name="sponsor" id="sponsor" placeholder="Sponsor Username">
                                       <label for="sponsor">Sponsor</label>
                                 </div>
                                 <div id="suggestUser"></div>
                              </div>
                              @else
                              <div class="col-md-6 mb-4">
                                 <div class="form-floating mb-3">
                                       <input type="text" class="form-control" name="sponsor" id="sponsor" placeholder="Sponsor Username">
                                       <label for="sponsor">Sponsor</label>
                                 </div>
                                 <div id="suggestUser"></div>
                              </div>
                              @endif

                           </div>
                           <div class="row">
                              <div class="col-md-6 mb-4">
                                  <div class="form-floating mb-2">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                        <label for="Password">Password</label>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                              </div>
                              <div class="col-md-6 mb-4">
                                  <div class="form-floating mb-2">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        <label for="confirmpassword">Confirm-password</label>
                                    </div>
                              </div>
                           </div>



                           </div>
                           <div class="form-check d-flex justify-content-center  mb-2">
                              <input type="checkbox" class="form-check-input" id="agree">
                              <label class="ms-1 form-check-label" for="agree">I agree with the terms of
                                 use</label>
                           </div>
                           <div class="text-center">
                              <button type="submit" class="btn btn-primary">Sign Up</button>
                           </div>
                           <!-- <div class="text-center mt-3">
                              <p>or sign in with others account?</p>
                           </div> -->
                           <!-- <div class="d-flex justify-content-center">
                                 <ul class="list-group list-group-horizontal list-group-flush">
                                    <li class="list-group-item border-0 bg-transparent">
                                       <a href="#"><img src="../../assets/images/brands/01.png" class="img-fluid avatar avatar-30 avatar-rounded" alt="fb"></a>
                                    </li>
                                    <li class="list-group-item border-0 bg-transparent">
                                       <a href="#"><img src="../../assets/images/brands/02.png" class="img-fluid avatar avatar-30 avatar-rounded" alt="gm"></a>
                                    </li>
                                    <li class="list-group-item border-0 bg-transparent">
                                       <a href="#"><img src="../../assets/images/brands/03.png" class="img-fluid avatar avatar-30 avatar-rounded" alt="im"></a>
                                    </li>
                                    <li class="list-group-item border-0 bg-transparent">
                                       <a href="#"><img src="../../assets/images/brands/04.png" class="img-fluid avatar avatar-30 avatar-rounded" alt="li"></a>
                                    </li>
                                 </ul>
                              </div> -->
                        </form>
                        <div class="new-account mt-3 text-center">
                           <p>Already have an Account <a class="text-primary" href="{{route('login')}}">Sign in</a>
                           </p>
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
      <!-- <script src="{{asset('assets/js/app.js')}}"></script> -->


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
    <script>
    $("body").on("keyup", "#sponsor", function () {
    //alert('success');
        let searchData = $("#sponsor").val();
        if (searchData.length > 0) {
            $.ajax({
                type: 'POST',
                url: '{{route("get-sponsor")}}',
                data: {search: searchData},
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (result) {
                    $('#suggestUser').html(result.success)
                    console.log(result.data)
                    // if (result.data) {
                    //     $("#position").val("");
                    //     $("#placement_id").val("");
                    //     $("#position").removeAttr('disabled');
                    // } else {
                    //     $("#position").val("");
                    //     $("#placement_id").val("");
                    //     $('#position').prop('disabled', true);
                    // }
                }
            });
        }
        if (searchData.length < 1) $('#suggestUser').html("")
    })


    </script>
  </body>
</html>
