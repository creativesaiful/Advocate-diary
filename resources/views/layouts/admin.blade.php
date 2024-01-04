<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title> Advocate Diary </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico')}}">

        <!-- App css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('assets/libs/jquery-toast/jquery.toast.min.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />



        @yield('css')

    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            
           @include('components.top-bar')



           @include('components.left-bar')

            
           

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        @yield('content')
                        
                    </div> <!-- end container-fluid -->

                </div> <!-- end content -->

                

             @include('components.footer')

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

       

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="{{ asset('assets/js/vendor.min.js') }}"></script>


    <!-- Toast js -->
    <script src="{{ asset('assets/libs/jquery-toast/jquery.toast.min.js') }}"></script>
     <!-- toastr init js-->
     <script src="{{ asset('assets/js/pages/toastr.init.js') }}"></script>
        <!-- App js -->
        <script src="{{ asset('assets/js/app.min.js') }}"></script>

        @yield('js')

        
    </body>
</html>