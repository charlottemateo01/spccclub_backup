<?php 
  $hasAdmin =$this->session->has_userdata('admin_authenticated');
  $adminData = $this->session->userdata('auth_admin');
?>
<html lang="en"><head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Dashboard</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link href="<?=base_url('assets/css/dataTables.bootstrap4.min.css')?>" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?=base_url('assets/css/style.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/css/components.css')?>">
</head>
<body class="sidebar-gone">
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown show"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user" aria-expanded="true">
          <img alt="image" src="<?=base_url('assets/images/admin/').$adminData['picture']?>" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block"><?=$adminData['fullname']?></div></a>
            <div class="dropdown-menu dropdown-menu-right ">
             <a href="features-settings.html" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="logout" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar" tabindex="1" style="overflow: hidden; outline: none;">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">SPCC</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="nav-item dropdown">
              <a href="dashboard" class="nav-link"><i class="fas fa-columns"></i><span>Dashboard</span></a>
               
              </li>
              <li class="menu-header">Starter</li>
           
              <li class=""><a class="nav-link" href="studentinfo"><i class="fas fa-user-graduate"></i><span>Student Info</span></a></li>
              <li class=""><a class="nav-link" href="teacherInfo"><i class="fas fa-user"></i> <span>Teachers Info</span></a></li>
              <li class=""><a class="nav-link" href="admininfo"><i class="fas fa-user-check"></i><span>Admin Info</span></a></li>
              <li class=""><a class="nav-link" href="club"><i class="fas fa-address-card"></i> <span>Club Info</span></a></li>
              <li><a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i> <span>Credits</span></a></li>
            </ul>

        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content" style="min-height: 741px;">
        <section class="section">
          <div class="section-header">
            <h1>Student Information</h1>
          </div>
          <div class="section-body">
          <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                  <button class="btn btn-outline-primary " data-toggle="modal" data-target="#addStdInfo">Add</button>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="StdInfoTbl">
                        <thead>
                          <tr>
                            <th>Student No</th>
                            <th>Full Name</th>
                            <th>Gender</th>
                            <th>Age</th>
                            <th>email</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
         <div class="bullet"></div> 
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>
  <!-- add Modal HTML -->
  <div id="addStdInfo" class="modal fade">
  <div class="modal-dialog">
   <div class="modal-content">
    <form action="" METHOD="POST" id="addstudent" enctype="multipart/form-data">
     <div  style="" class="modal-header">      
      <h4 class="modal-title text-black" id="">Add Student</h4>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
     </div>
     <div class="modal-body row">     
      <div class="form-group col-md-6">
       <label>Student Number</label>
       <input type="number" id="add_studentnum" name="add_studentnum"   class="form-control" value="" placeholder="Start-4">
       <span id ="error_stdno" class="alert-danger"></span>
    </div>
      <div class="form-group col-md-6">
       <label>FullName</label>
       <input type="text" id="add_fname" name="add_fname"   class="form-control"  value="" required>
       <span id ="error_fname" class="alert-danger"></span>
     </div>
      <div class="form-group col-md-6">
       <label>Age</label>
       <input type="number" id="add_age" name="add_age"  class="form-control" value="" required>
       <span id ="error_age" class="alert-danger"></span>
     </div>    
      <div class="form-group col-md-6">
       <label>Gender</label>
       <select class="form-control" id="add_gender"  name="add_gender" required>
          <option value="Male" >Male</option>
          <option value="Female">Female</option>
        </select>
        <span id ="error_gender" class="alert-danger"></span>
      </div> 
      <div class="form-group col-md-12">
         <label>Email</label>
         <input type="email" id="add_email" name="add_email"  class="form-control" required>
         <span id ="error_email" class="alert-danger"></span>
      </div>    
      <div class="form-group col-md-12">
         <label>Password</label>
         <input type="password" id="add_password" name="add_password"  class="form-control" required>
         <span id ="error_password" class="alert-danger"></span>
      </div>    
      <div class="form-group col-md-12">
         <label>Profile</label>
         <input type="file" id="add_profile" name="add_profile"  class="form-control" required>
         <span id ="error_profile" name ="error_profile" class="alert-danger"></span>
      </div>
     </div>
     <div  style="" class="modal-footer">
     <input type="reset" class="btn btn-danger"  value="Clear">
      <button type="button"  onclick="addStdInfo()"  class="btn btn-primary" >Save</button>
     </div>
    </form>
   </div>
  </div>
 </div>
 <!-- Edit Modal HTML -->
 <div id="editStdInfo" class="modal fade">
  <div class="modal-dialog">
   <div class="modal-content">
    <form action="" METHOD="POST" id="editStdNo"  enctype="multipart/form-data">
     <div  style="" class="modal-header">      
      <h4 class="modal-title text-black">Edit Student Info</h4>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
     </div>
     <div class="modal-body row">     
        <input type="text" id="id" name="id" hidden>
        <input type="text" id="oldp" name="oldp" style="display:none">
        <div class="form-group col-md-6">
       <label>Student Number</label>
       <input type="number" id="edit_studentnum" name="edit_studentnum"   class="form-control" value="" placeholder="Start-4">
       <span id ="error_edit_stdno" class="alert-danger"></span>
    </div>
      <div class="form-group col-md-6">
       <label>FullName</label>
       <input type="text" id="edit_fname" name="edit_fname"   class="form-control"  value="" required>
       <span id ="error_edit_fname" class="alert-danger"></span>
     </div>
      <div class="form-group col-md-6">
       <label>Age</label>
       <input type="number" id="edit_age" name="edit_age"  class="form-control" value="" required>
       <span id ="error_edit_age" class="alert-danger"></span>
     </div>    
      <div class="form-group col-md-6">
       <label>Gender</label>
       <select class="form-control" id="edit_gender"  name="edit_gender" required>
          <option value="Male" >Male</option>
          <option value="Female">Female</option>
        </select>
        <span id ="error_edit_gender" class="alert-danger"></span>
      </div> 
      <div class="form-group col-md-12">
         <label>Email</label>
         <input type="email" id="edit_email" name="edit_email"  class="form-control" required>
         <span id ="error_edit_email" class="alert-danger"></span>
      </div>    
      <div class="form-group col-md-12">
         <label>Password</label>
         <input type="password" id="edit_password" name="edit_password"  class="form-control" required>
         <span id ="error_edit_password" class="alert-danger"></span>
      </div>    
      <div class="form-group col-md-12">
         <label>Profile</label>
         <input type="file" id="edit_profile" name="edit_profile"  class="form-control" required>
         <span id ="error_edit_profile" class="alert-danger"></span>
      </div>
     </div>
     <div  style="" class="modal-footer">
      <input type="reset" class="btn btn-danger"  value="Clear">
      <button type="button" onclick="editStdInfo()"  name="" class="btn btn-primary" >Update</button>
     </div>
    </form>
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
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="<?=base_url('assets/css/dataTables.bootstrap4.min.js')?>"> </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<!-- Page level custom scripts -->
<script src="<?=base_url('assets/css/demo/datatables-demo.js')?>"></script>
  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="<?=base_url('assets/js/scripts.js')?>"></script>
  <script src="<?=base_url('assets/js/custom.js')?>"></script>

  <!-- Page Specific JS File -->

<div id="ascrail2000" class="nicescroll-rails nicescroll-rails-vr" style="width: 8px; z-index: 892; cursor: default; position: fixed; top: 0px; left: 242px; height: 849px; opacity: 0; display: none;"><div class="nicescroll-cursors" style="position: relative; top: 0px; float: right; width: 6px; height: 0px; background-color: rgb(66, 66, 66); border: 1px solid rgb(255, 255, 255); background-clip: padding-box; border-radius: 5px;"></div></div><div id="ascrail2000-hr" class="nicescroll-rails nicescroll-rails-hr" style="height: 8px; z-index: 892; top: 841px; left: 0px; position: fixed; cursor: default; display: none; width: 242px; opacity: 0;"><div class="nicescroll-cursors" style="position: absolute; top: 0px; height: 6px; width: 0px; background-color: rgb(66, 66, 66); border: 1px solid rgb(255, 255, 255); background-clip: padding-box; border-radius: 5px; left: 0px;">
</div>
</div>
<script>
 $(document).ready(function(){
  
    displayStdInfo();
});


function delete_selected(){
  $('.delete_checkbox').on("click",function(){
      if($(this).is(':checked'))
      {
          $(this).closest('tr').addClass('removeRow');
      }
      else
      {
          $(this).closest('tr').removeClass('removeRow');
      }
  });
}

 //display the student info to the data table  

function displayStdInfo(){
  $('#StdInfoTbl').DataTable({
    destroy: true,
    ajax:"<?=base_url('Mycontroller/displayStdInfo')?>",
    columns:[
        {data:"studentNo"},
        {data:"fullname"},
        {data:"gender"},
        {data:"age"},
        {data:"email"},
        {data: null, title: 'Action', wrap: true, "render": function (item) { return '<div class="btn-group"><button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Action</button><div class="dropdown-menu"> <a class="dropdown-item" onclick="getStdInfo('+item.id+')" href="" data-toggle="modal" data-target="#editStdInfo">EDIT</a> <a class="dropdown-item" href="#"  onclick="deleteStdInfo('+item.id+')">DELETE</a></div>' } }
    ]
  });
}

function getStdInfo(id){

$.post("<?=base_url('Mycontroller/getStdInfo')?>",{
   id:id
 },function(data,status){
   var StdInfo = JSON.parse(data);
   $('#id').val(StdInfo.id);
   $('#oldp').val(StdInfo.picture)
   $('#edit_studentnum').val(StdInfo.studentNo);
   $('#edit_fname').val(StdInfo.fullname);
   $('#edit_age').val(StdInfo.age);
   $('#edit_gender').val(StdInfo.gender)
   $('#edit_email').val(StdInfo.email);
   $('#edit_profile').val(StdInfo.profile);
  });
   $('#editModal').modal('show');
}

function editStdInfo(){
    
    var studentNo = $('#edit_studentnum').val();
    var fname = $('#edit_fname').val();
    var email = $('#edit_email').val();
    var gender = $('#edit_gender').val();
    var age = $('#edit_age').val();
    var password = $('#edit_password').val();
    var profile = $("#edit_profile")[0].files[0];


    var formData = new FormData($('#editStdNo')[0]);
    $.ajax({
        url:"<?=base_url('Mycontroller/editStdInfo')?>",
        type:"POST",
        data:formData,
        processData: false,
        contentType: false,
        success:function(data){
          displayStdInfo();
          $('#edit_studentnum').val(null);
          $('#edit_fname').val(null);
          $('#edit_email').val(null);
          $('#edit_gender').val(null);
          $('#edit_age').val(null);
          $('#edit_profile').val(null);
          var error = JSON.parse(data);
          if(error.validation ==true){
          //seterror
          var studentNo_error = error.studentNo;
          var fname_error = error.fname;
          var email_error = error.email;
          var pass_error = error.password;
          var gender_error = error.gender;
          var age_error = error.age;
          //setvalue
          var setvalue_studentNo = error.setstudentNo;
          var setvalue_fname = error.setfname;
          var setvalue_email = error.setemail;
          var setvalue_gender = error.setgender;
          var setvalue_age = error.setage;
          var setvalue_pass = error.setpassword;
          //display_seterror
          $('#error_edit_fname').html(fname_error);
          $('#error_edit_email').html(email_error);
          $('#error_edit_password').html(pass_error);
          $('#error_edit_age').html(age_error);
          $('#error_edit_gender').html(gender_error);
          $('#error_edit_stdno').html(studentNo_error);
          //display_setvalue
          $('#edit_studentnum').val(setvalue_studentNo);
          $('#edit_fname').val(setvalue_fname);
          $('#edit_email').val(setvalue_email);
          $('#edit_gender').val(setvalue_gender);
          $('#edit_age').val(setvalue_age);
          $('#edit_password').val(setvalue_pass);
          //remove error in 3 second
          setTimeout(()=>$('p').remove(),5000);
          setTimeout(()=>$('p').remove(),5000);
          $('#editStdInfo')[0].reset();
          }
          else
          {
           
            swal(
           'UpdateSuccess!',
           'This Student Info updated!',
           'success'
           )
           $('#editStdInfo').modal('hide');
           $('#editStdInfo')[0].reset();
         
          }
        }
    });

    
}

function addStdInfo(){
    
    var studentNo = $('#add_studentnum').val();
    var fname = $('#add_fname').val();
    var email = $('#add_email').val();
    var gender = $('#add_gender').val();
    var age = $('#add_age').val();
    var password = $('#add_password').val();
    var profile = $("#add_profile").val();


    var formData = new FormData($('#addstudent')[0]);

    $.ajax({
        url:"<?=base_url('Mycontroller/addStdInfo')?>",
        type:"POST",
        data:formData,
        processData: false,
        contentType: false,
        success:function(data){
          displayStdInfo();
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
          }
          else if(error.validation ==false)
          {
            swal(
           'Success!',
           'You Add New Student!',
           'success'
           )
            $('#addStdInfo').modal('hide');
            $('#addstudent')[0].reset();
          }
        }
    });

    
}

function deleteStdInfo(id){
  var con = confirm("Are you sure do you want to delete!");
  if(con == true){
      $.ajax({
      url:"<?=base_url('Mycontroller/deleteStdInfo')?>",
      type:"POST",
      data: {id:id},
      success:function(data,status){
          displayStdInfo();
          swal(
           'Deleted!',
           'You Delete One Record !',
           'success'
           )
      }
   });
  }

  function displayStdTInfo(){
  $('#StdInfoTbl').DataTable({
    destroy: true,
    ajax:"<?=base_url('Mycontroller/displayStdInfo')?>",
    columns:[
        {data:"studentNo"},
        {data:"fullname"},
        {data:"gender"},
        {data:"age"},
        {data:"email"},
        {data: null, title: 'Action', wrap: true, "render": function (item) { return '<div class="btn-group"><button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Action</button><div class="dropdown-menu"> <a class="dropdown-item" onclick="getStdInfo('+item.id+')" href="" data-toggle="modal" data-target="#editStdInfo">EDIT</a> <a class="dropdown-item" href="#"  onclick="deleteStdInfo('+item.id+')">DELETE</a></div>' } }
    ]
  });
}
    
}

</script>
</body>
</html>
