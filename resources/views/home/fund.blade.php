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
                <h3 class="card-title text-left mb-3">Hi, {{auth()->user()->username}}, Fill the form to fund your account</h3>
                <form id="paymentForm" action="{{route('transaction.store')}}" method="post">
                  @csrf
                  <div class="form-group">
                    <label>Email *</label>
                    <input type="text" name="email" id="email" class="form-control p_input">

                    <input type="hidden" name="user" value="{{auth()->user()->id}}" id="user">
                    <input type="hidden" name="type" value="deposit" id="user">
                  </div>
                  <div class="form-group">
                    <label>Amount *</label>
                    <input type="tel" name="amount" id="amount" class="form-control p_input">
                  </div>
                  <div class="form-group d-flex align-items-center justify-content-between">
                    @if($errors->any())
                    @forelse($errors->all() as $error)
                        <div id='wrong-credentials' class='text-danger text-error text-center h4'><b>{{$error}}</b></div>
                    @empty
                    @endforelse	
                    @endif
                    
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn" id="pay" onclick="payWithPaystack()" >Pay</button>
                    <button type="submit" class="btn btn-info btn-block enter-btn" >Back</button>
                  
                  </div>
                  
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://js.paystack.co/v1/inline.js"></script> 
    <script>
      const paymentForm = document.getElementById('pay');
      paymentForm.addEventListener("click", payWithPaystack, false);
      function payWithPaystack(e) {
        e.preventDefault();
        let handler = PaystackPop.setup({
          key: 'pk_test_e7da411f982f7d1b4cfe6020c518e166f49023b1', // Replace with your public key
          email: document.getElementById("email").value,
          amount: document.getElementById("amount").value * 100,
          ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
          // label: "Optional string that replaces customer email"
          onClose: function(){
            alert('Window closed.');
          },
          callback: function(response){
            token = document.getElementsByName("_token");//$('#token').html();
            for(var i = 0; i < token.length; i++){
              var csrf = token[i].value;
            }       
            let message = 'Payment complete! Reference: ' + response.reference;
            alert(message);  
          }
        });
        handler.openIframe();

        $.ajax({
          url:"{{route('store_transaction')}}",
          method:"POST",
          dataType:"json",
          encode: true,
          data: {
              "amount":document.getElementById("amount").value , "user":document.getElementById("user").value, "type":document.getElementById("type").value, "_token":csrf

          },
          
          success: function(data){
            
            swal({
            position: "top-end",
            type: "success",
            title: data.message,
            showConfirmButton: true,

            })
          },
          error: function(data) { 
            swal({
            position: "top-end",
            type: "error",
            title: data.message,
            showConfirmButton: true,
            timer: 3500
            
            }); 
          } 
          
        })
      }
        
    </script>
  </body>
</html>