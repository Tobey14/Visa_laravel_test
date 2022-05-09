<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Visa Test</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ url ('/')}}/user/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ url ('/')}}/user/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ url ('/')}}/user/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="{{ url ('/')}}/user/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{ url ('/')}}/user/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ url ('/')}}/user/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ url ('/')}}/user/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ url ('/')}}/user/assets/images/favicon.png" />
  </head>



  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html --> <!-- sidebar starts -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">


          <!-- logo starts -->
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="{{route('dashboard')}}"><img style="" src="{{ url ('/')}}/user/assets/images/logo-mini.svg" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="{{route('dashboard')}}"><img src="{{ url ('/')}}/user/assets/images/logo-mini.svg" alt="logo" /></a>
        </div>

            <!-- logo ends -->

        
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="{{ url ('/')}}/user/assets/images/faces/face15.jpg" alt="">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal">{{auth()->user()->username}}</h5>
                  <span>{{auth()->user()->role}}</span>
                </div>
              </div>
              <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
              <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-settings text-primary"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-onepassword  text-info"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-calendar-today text-success"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                  </div>
                </a>
              </div>
            </div>
          </li>


          <!-- main sidebar starts -->
          
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
        @if(auth()->user()->role == 'user')
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{route('dashboard')}}">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
        @else

          <li class="nav-item menu-items">
            <a class="nav-link" href="{{route('admin')}}">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Users</span>
            </a>
          </li>
        @endif

          
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#flexible-user" aria-expanded="false" aria-controls="auth">
              <span class="menu-icon">
                <i class="mdi mdi-security"></i>
              </span>
              <span class="menu-title">Account</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="flexible-user">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('logout')}}"> Logout </a></li>
              </ul>
            </div>
          </li>

       
        </ul>
      </nav>


      <!-- sidebar ends -->



      <!-- partial --> <!-- top menu -->

      
      <div class="container-fluid page-body-wrapper">
        



        
        <div class="main-panel">



            @yield('home')




            
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ url ('/')}}/user/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ url ('/')}}/user/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="{{ url ('/')}}/user/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="{{ url ('/')}}/user/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="{{ url ('/')}}/user/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="{{ url ('/')}}/user/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ url ('/')}}/user/assets/js/off-canvas.js"></script>
    <script src="{{ url ('/')}}/user/assets/js/hoverable-collapse.js"></script>
    <script src="{{ url ('/')}}/user/assets/js/misc.js"></script>
    <script src="{{ url ('/')}}/user/assets/js/settings.js"></script>
    <script src="{{ url ('/')}}/user/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ url ('/')}}/user/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->



    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/js/bootstrap.min.js"></script>
     
    <script>
        $(document).ready( function(){
            
            setTimeOut(function(){
              $('.text-error').fadeOut('slow');
            },5000)
            
            
        })
        
    </script>
  </body>
</html>