<html lang="en"><head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
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
              <?php
        $flashdata="";
        $unsetflash_data="";
        if($this->session->flashdata('c_danger'))
        {
          $flashdata=$this->session->flashdata('c_danger');
          $unsetflash_data="c_danger";
          $alert_danger = 'class="alert alert-danger alert-dismissible text-center"';
        }
        else
        {
          $flashdata=$this->session->flashdata('c_success');
          $alert_danger = 'class="alert alert-success alert-dismissible text-center"';
          $unsetflash_data="c_success";
        }
      ?>
       <?php if($flashdata):?>
          <div <?=$alert_danger?> role="alert" id="hide">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
           <i class="icon fa fa-cheack"></i> <?= $flashdata?>
          </div>
          <?php unset($_SESSION[$unsetflash_data]);?>
        <?php  endif; ?>
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
                  <button class ="btn btn-primary btn-block btn-lg" data-toggle="modal" data-target="#modalRegister">Student Registration</button>
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
<div class="modal fade" id="modalRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Student Registration</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     
      <form method="POST" id="frmRegister" enctype="multipart/form-data">
           <div class="row">
             <div class="form-group col-6">
               <label for="first_name">StudentNo</label>
               <input type="number" class="form-control" id="add_studentnum" name="add_studentnum" autofocus="" placeholder="Start-4">
               <span id ="error_stdno" class="alert-danger"></span>
              </div>
             <div class="form-group col-6">
               <label for="last_name">Full Name</label>
               <input  type="text" class="form-control" id="add_fname" name="add_fname">
               <span id ="error_fname" class="alert-danger"></span>
              </div>
             <div class="form-group col-6">
               <label for="last_name">Age</label>
               <input  type="number" class="form-control" id="add_age" name="add_age">
               <span id ="error_age" class="alert-danger"></span>
              </div>
             <div class="form-group col-6">
               <label>Gender</label>
               <select class="form-control selectric" id="add_gender" name="add_gender">
                 <option value="Male">Male</option>
                 <option value="Female">Female</option>
               </select>
             </div>
             <span id ="error_gender" class="alert-danger"></span>
           </div>
           

           <div class="form-group">
             <label for="email">Email</label>
             <input type="email" class="form-control" id="add_email" name="add_email">
             <span id ="error_email" class="alert-danger"></span>
            </div>

           <div class="form-group">
             <label for="email">Profile</label>
             <input id="add_profile" type="file" class="form-control"  name="add_profile">
             <span id ="error_profile" name ="error_profile" class="alert-danger"></span>
           </div>

           <div class="row">
             <div class="form-group col-12">
               <label for="password" class="d-block">Password</label>
               <input  type="password" class="form-control pwstrength" data-indicator="pwindicator" id="add_password" name="add_password">
               <div id="pwindicator" class="pwindicator">
                 <div class="bar"></div>
                 <div class="label"></div>
               </div>
               <span id ="error_password" class="alert-danger"></span>
             </div>
           </div>

           <div class="form-group">
             <div class="custom-control custom-checkbox">
               <input type="checkbox" name="agree" class="custom-control-input" id="agree">
               <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
             </div>
           </div>

           <div class="form-group">
             <button type="button" onclick="addStdInfo()" class="btn btn-primary btn-lg btn-block">
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="<?=base_url('assets/js/scripts.js')?>"></script>
  <script src="<?=base_url('assets/js/custom.js')?>"></script>
  
  <!-- Page Specific JS File -->
  <script>
    function addStdInfo(){
    var formData = new FormData($('#frmRegister')[0]);

    $.ajax({
        url:"<?=base_url('Mycontroller/addStdInfo')?>",
        type:"POST",
        data:formData,
        processData: false,
        contentType: false,
        success:function(data){
          $('#add_studentnum').val(null);
          $('#add_fname').val(null);
          $('#add_email').val(null);
          $('#add_gender').val(null);
          $('#add_age').val(null);
          var error = JSON.parse(data);
          if(error.validation ==true){
          //seterror
          var studentNo_error = error.studentNo;
          var fname_error = error.fname;
          var email_error = error.email;
          var pass_error = error.password;
          var gender_error = error.gender;
          var age_error = error.age;
          var profile_error = error.profile;
          //setvalue
          var setvalue_studentNo = error.setstudentNo;
          var setvalue_fname = error.setfname;
          var setvalue_email = error.setemail;
          var setvalue_gender = error.setgender;
          var setvalue_age = error.setage;
          var setvalue_pass = error.setpassword;
          //display_seterror
          $('#error_fname').html(fname_error);
          $('#error_email').html(email_error);
          $('#error_password').html(pass_error);
          $('#error_age').html(age_error);
          $('#error_gender').html(gender_error);
          $('#error_stdno').html(studentNo_error);
          $('#error_profile').html(profile_error);
          //display_setvalue
          $('#add_studentnum').val(setvalue_studentNo);
          $('#add_fname').val(setvalue_fname);
          $('#add_email').val(setvalue_email);
          $('#add_gender').val(setvalue_gender);
          $('#add_age').val(setvalue_age);
          $('#add_password').val(setvalue_pass);
          //remove error in 5 second
          setTimeout(()=>$('p').remove(),5000);
          setTimeout(()=>$('p').remove(),5000);
          $('#frmRegister')[0].reset();
          }
          else if(error.validation ==false)
          {
            swal(
           'Success!',
           'You Are Now Registered!',
           'success'
           )
            $('#modalRegister').modal('hide');
            $('#frmRegister')[0].reset();
          }
        }
    });
}
  </script>
</body>
</html>
