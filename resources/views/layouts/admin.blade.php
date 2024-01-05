<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title> Advocate Diary </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico')}}">

          <!-- third party css -->
          <link href="{{ asset('assets/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
          <link href="{{ asset('assets/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
          <link href="{{ asset('assets/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
   
      
         

          <link href="{{ asset('assets/libs/rwd-table/rwd-table.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('assets/libs/jquery-toast/jquery.toast.min.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />



        @yield('css')

    </head>

    <body >

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


         <!-- Required datatable js -->
         <script src="{{ asset('assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
         <script src="{{ asset('assets/libs/datatables/dataTables.bootstrap4.min.js') }}"></script>
         <!-- Buttons examples -->
         <script src="{{ asset('assets/libs/datatables/dataTables.buttons.min.js') }}"></script>
         <script src="{{ asset('assets/libs/datatables/buttons.bootstrap4.min.js') }}"></script>
         <script src="{{ asset('assets/libs/jszip/jszip.min.js') }}"></script>
         <script src="{{ asset('assets/libs/pdfmake/pdfmake.min.js') }}"></script>
         <script src="{{ asset('assets/libs/pdfmake/vfs_fonts.js') }}"></script>
         <script src="{{ asset('assets/libs/datatables/buttons.html5.min.js') }}"></script>
         <script src="{{    asset('assets/libs/datatables/buttons.print.min.js') }}"></script>
 
         <!-- Responsive examples -->
         <script src="{{ asset('assets/libs/datatables/dataTables.responsive.min.js') }}"></script>
         <script src="{{ asset('assets/libs/datatables/responsive.bootstrap4.min.js') }}"></script>
        
        
       
         <!-- Datatables init -->
         <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>





    <!-- Toast js -->
    <script src="{{ asset('assets/libs/jquery-toast/jquery.toast.min.js') }}"></script>
     <!-- toastr init js-->
     <script src="{{ asset('assets/js/pages/toastr.init.js') }}"></script>
    <!-- Plugin js-->
    <script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>

    <!-- Validation init js-->
    <script src="{{ asset('assets/js/pages/form-validation.init.js') }}"></script>


  
        
    <!-- Init js -->
    <script src="{{ asset('assets/js/pages/responsive-table.init.js') }}"></script>
     
        <!-- App js -->
        <script src="{{ asset('assets/js/app.min.js') }}"></script>
        
        @yield('js')

        <script>
            @if (Session::has('message'))
    
                var type = ("{{ Session::get('type') }}");
    
                var message = ("{{ Session::get('message') }}");
                switch (type) {
                case 'success':
                toastr.success(message);
                break;
                case 'warning':
                toastr.warning(message);
                break;
                case 'error':
                toastr.error(message);
                break;
                case 'info':
                toastr.info(message);
                break;
                }
    
            @endif


        </script>
    </body>
</html>