<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Visa Test</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{url('/')}}/user/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{url('/')}}/user/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{url('/')}}/user/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{url('/')}}/user/assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Register</h3>
                <form method="POST" action="{{route('userStore')}}">
                  @csrf
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control p_input">
                  </div>
                  <div class="form-group d-flex align-items-center justify-content-between">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input"> Remember me </label>
                    </div>
                    <input type="hidden" name="role" value="user" class="form-check-input">

                  </div>
                  @if($errors->any())
                  @forelse($errors->all() as $error)
                      <div id='wrong-credentials' class='text-danger text-error text-center h4'><b>{{$error}}</b></div>
                  @empty
                  @endforelse	
                  @endif
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Submit</button>
                  </div>
                  
                  <p class="sign-up text-center">Already have an Account?<a href="{{route('login')}}"> Login</a></p>
                  
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{url('/')}}/user/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{url('/')}}/user/assets/js/off-canvas.js"></script>
    <script src="{{url('/')}}/user/assets/js/hoverable-collapse.js"></script>
    <script src="{{url('/')}}/user/assets/js/misc.js"></script>
    <script src="{{url('/')}}/user/assets/js/settings.js"></script>
    <script src="{{url('/')}}/user/assets/js/todolist.js"></script>
    <!-- endinject -->
  
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