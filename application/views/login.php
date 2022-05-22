<html lang="en"><head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?=base_url('')?>/node_modules/bootstrap-social/bootstrap-social.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?=base_url('assets/css/style.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/css/components.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/css/videobg.css')?>">

  <style>
      .bg{
        background-image: url(<?=base_url('assets/images/background/bgspcc1.png')?>);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: left;
      }
  </style>
</head>

<body class="sidebar-gone ">

<div class="home">
        <video autoplay  loop muted>
          <source src="https://spcc.edu.ph/assets/mp4/home.mp4" type="video/mp4" />
        </video>
        <div class="overlay"></div>
        <div class="home-content">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-4 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="<?=base_url('assets/images/logo/spcc.png')?>" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>
            
            <div class="card  frm">
              <div class="card-header"><h4 class="text-white">Login</h4></div>

              <div class="card-body">
              <form method="POST" action="adminlogin" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="email" class="text-white">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required="" autofocus="">
                    <div class="invalid-feedback">
                      Please fill in your email
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label text-white">Password</label>
                      <div class="float-right">
                        <a href="auth-forgot-password.html" class="text-small text-white">
                          Forgot Password?
                        </a>
                      </div>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required="">
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
                <div class="form-group">
                  <button class ="btn btn-primary btn-block btn-lg" data-toggle="modal" data-target="#exampleModal">Student Registration</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
  <!---------register modal ----->
  <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Student Registration</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
           <div class="row">
             <div class="form-group col-6">
               <label for="first_name">StudentNo</label>
               <input id="stdnumber" type="number" class="form-control" name="stdnumber" autofocus="">
             </div>
             <div class="form-group col-6">
               <label for="last_name">Full Name</label>
               <input id="fullname" type="text" class="form-control" name="fullname">
             </div>
             <div class="form-group col-6">
               <label for="last_name">Age</label>
               <input id="age" type="number" class="form-control" name="age">
             </div>
             <div class="form-group col-6">
               <label>Gender</label>
               <select class="form-control selectric">
                 <option value="Male">Male</option>
                 <option value="Female">Female</option>
               </select>
             </div>
           </div>
           
           <div class="form-group">
             <label for="email">Email</label>
             <input id="email" type="email" class="form-control" name="email">
             <div class="invalid-feedback">
             </div>
           </div>

           <div class="row">
             <div class="form-group col-6">
               <label>ContactNo</label>
               <input type="number" class="form-control">
             </div>
             <div class="form-group col-6">
               <label>Address</label>
               <input type="text" class="form-control">
             </div>
           </div>

           <div class="row">
             <div class="form-group col-6">
               <label for="password" class="d-block">Password</label>
               <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
               <div id="pwindicator" class="pwindicator">
                 <div class="bar"></div>
                 <div class="label"></div>
               </div>
             </div>
             <div class="form-group col-6">
               <label for="password2" class="d-block">Password Confirmation</label>
               <input id="password2" type="password" class="form-control" name="password-confirm">
             </div>
           </div>

           <div class="form-group">
             <div class="custom-control custom-checkbox">
               <input type="checkbox" name="agree" class="custom-control-input" id="agree">
               <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
             </div>
           </div>

           <div class="form-group">
             <button type="submit" class="btn btn-primary btn-lg btn-block">
               Register
             </button>
           </div>
         </form>
      </div>
    </div>
  </div>
</div>
  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?=base_url('assets/js/stisla.js')?>"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="<?=base_url('assets/js/scripts.js')?>"></script>
  <script src="<?=base_url('assets/js/custom.js')?>"></script>

  <!-- Page Specific JS File -->


</body>
</html>