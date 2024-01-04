

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title> Advocate Dairy </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

    </head>

    <body class="authentication-bg bg-gradient">

            <div class="account-pages pt-5 mt-5 mb-5">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-lg-6 col-xl-5">
                            <div class="card bg-pattern">
    
                                <div class="card-body p-4">
                                    
                                    <div class="text-center w-75 m-auto">
                                        <a href="index.html">
                                            <span><img src="assets/images/logo-light.png" alt="" height="18"></span>
                                        </a>
                                        <h5 class="text-uppercase text-center font-bold mt-4">Register</h5>
                                    </div>
                                   
                                    @error('email')
                                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                                    
                                      @enderror

                                     @error('phone')
                                      <div class="alert alert-danger text-danger">{{ $message }}</div>
                                      
                                    @enderror

                                    @error('password')
                                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                                    
                                  @enderror
    
                                    <form action="{{ route('register') }}" method="POST" >
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input class="form-control" type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Enter your name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="emailaddress">Email address</label>
                                            <input class="form-control" type="email" id="emailaddress" name="email" value="{{ old('email') }}"  placeholder="Enter your email">
                                        </div>

                                        <div class="form-group">
                                            <label for="phone">Phone Number</label>
                                            <input class="form-control" type="tel" id="phone" name="phone" value="{{ old('phone') }}" required  placeholder="018">
                                        </div>


                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input class="form-control" type="password" name="password" required id="password" placeholder="Enter your password">
                                        </div>

                                        <div class="form-group">
                                            <label for="password_confirmation">Password</label>
                                            <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" required  placeholder="Enter your password">
                                        </div>


                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox checkbox-success">
                                                <input type="checkbox" class="custom-control-input" id="checkbox-signup">
                                                <label class="custom-control-label" for="checkbox-signup">I accept <a href="javascript: void(0);" class="text-dark" name='' >Terms and Conditions</a></label>
                                            </div>
                                        </div>
                                        <div class="form-group mb-0 text-center">
                                            <button class="btn btn-gradient btn-block" type="submit"> Sign Up </button>
                                        </div>
    
                                    </form>
    
                                    <div class="row mt-4">
                                            <div class="col-sm-12 text-center">
                                                <p class="text-muted mb-0">Already registered? <a href="{{ route('login') }}" class="text-dark ml-1"><b>Log In</b></a></p>
                                            </div>
                                        </div>
    
                                </div> <!-- end card-body -->
                            </div>
                            <!-- end card -->
    
                     
    
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end container -->
            </div>
            <!-- end page -->

        <!-- Vendor js -->
        <script src="{{ asset('assets/js/vendor.min.js') }}"></script>

           <!-- Plugin js-->
           <script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>

           <!-- Validation init js-->
           <script src="{{ asset('assets/js/pages/form-validation.init.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('assets/js/app.min.js') }}"></script>
        
    </body>
</html>
