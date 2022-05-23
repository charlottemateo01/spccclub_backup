<?php 
  $hasAdmin =$this->session->has_userdata('admin_authenticated');
  $adminData = $this->session->userdata('auth_admin');
?>
<html lang="en"><head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Admin Information</title>
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
<body class="">
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
                <ul class="dropdown-menu" style="display: none;">
                  <li><a class="nav-link" href="index-0.html">General Dashboard</a></li>
                  <li><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>
                </ul>
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
            <h1>Admin Information</h1>
          </div>
          <div class="section-body">
          <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                  <button class="btn btn-outline-primary " data-toggle="modal" data-target="#modaladdAdmin">Add</button>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="AdminInfoTbl">
                        <thead>
                          <tr>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Picture</th>
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
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>
  <!-- add Modal HTML -->
  <div id="modaladdAdmin" class="modal fade">
  <div class="modal-dialog">
   <div class="modal-content">
    <form action="" METHOD="POST" id="frmAdmin" enctype="multipart/form-data">
     <div  style="" class="modal-header">      
      <h4 class="modal-title text-black" id="">Add Admin</h4>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
     </div>
     <div class="modal-body row">     
      <div class="form-group col-md-12">
       <label>FullName</label>
       <input type="text" id="add_admin" name="add_admin"   class="form-control"  value="" required>
       <span id ="error_aname" class="alert-danger"></span>
     </div>
      <div class="form-group col-md-12">
         <label>Email</label>
         <input type="email" id="add_aemail" name="add_aemail" autocomplete="email"  class="form-control" required>
         <span id ="error_aemail" class="alert-danger"></span>
      </div>    
      <div class="form-group col-md-12">
         <label>Password</label>
         <input type="password" id="add_apassword" name="add_apassword"  autocomplete="current-password"  class="form-control" required>
         <span id ="error_apassword" class="alert-danger"></span>
      </div>    
      <div class="form-group col-md-12">
         <label>Profile</label>
         <input type="file" id="add_aprofile" name="add_aprofile"  class="form-control" required>
         <span id ="error_aprofile" name ="error_tprofile" class="alert-danger"></span>
      </div>
     </div>
     <div  style="" class="modal-footer">
     <input type="reset" class="btn btn-danger"  value="Clear">
      <button type="button"  onclick="addAdmin()"  class="btn btn-primary" >Save</button>
     </div>
    </form>
   </div>
  </div>
 </div>
 <!-- Edit Modal HTML -->
 <div id="modalEdit" class="modal fade">
  <div class="modal-dialog">
   <div class="modal-content">
    <form action="" METHOD="POST" id="frmEdit"  enctype="multipart/form-data">
     <div  style="" class="modal-header">      
      <h4 class="modal-title text-black">Edit Admin</h4>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
     </div>
     <div class="modal-body row">     
        <input type="text" id="id" name="id" hidden>
        <input type="text" id="oldp" name="oldp" style="display:none">
        <input type="text" id="oldpassword" name ="oldpassword" style="display:none">
      <div class="form-group col-md-12">
       <label>FullName</label>
       <input type="text" id="edit_addmin" name="edit_addmin"   class="form-control"  value="" required>
       <span id ="error_editAdd" class="alert-danger"></span>
     </div>
      <div class="form-group col-md-12">
         <label>Email</label>
         <input type="email" id="edit_aemail" name="edit_aemail"  class="form-control" required>
         <span id ="error_editAemail" class="alert-danger"></span>
      </div>    
      <div class="form-group col-md-12">
         <label>Password</label>
         <input type="password" id="edit_apassword" name="edit_apassword"  class="form-control" required>
         <span id ="error_editApassword" class="alert-danger"></span>
      </div>    
      <div class="form-group col-md-12">
         <label>Profile</label>
         <input type="file" id="edit_aprofile" name="edit_aprofile"  class="form-control" required>
         <span id ="error_editAprofile" class="alert-danger"></span>
      </div>
     </div>
     <div  style="" class="modal-footer">
      <input type="reset" class="btn btn-danger"  value="Clear">
      <button type="button" onclick="editAdmin()"  name="" class="btn btn-primary" >Update</button>
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
  displayAdmin();
});


 

function displayAdmin(){
  $('#AdminInfoTbl').DataTable({
    destroy: true,
    ajax:"<?=base_url('Mycontroller/displayAdmin')?>",
    columns:[
        {data:"fullname"},
        {data:"email"},
        {data:"picture"},
        {data: null, title: 'Action', wrap: true, "render": function (item) { return '<div class="btn-group"><button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Action</button><div class="dropdown-menu"> <a class="dropdown-item" onclick="getAdmin('+item.id+')" href="" data-toggle="modal" data-target="#modalEdit">EDIT</a> <a class="dropdown-item" href="#"  onclick="deleteAdmin('+item.id+')">DELETE</a></div>' } }
    ]
  });
}

function getAdmin(id){

$.post("<?=base_url('Mycontroller/getAdmin')?>",{
   id:id
 },function(data,status){
   var admin = JSON.parse(data);
   $('#id').val(admin.id);
   $('#oldp').val(admin.picture)
   $('#edit_addmin').val(admin.fullname);
   $('#edit_aemail').val(admin.email);
   $('#edit_aprofile').val(admin.profile);
   $('#oldpassword').val(admin.password)
  });
}

function editAdmin(){

    var formData = new FormData($('#frmEdit')[0]);
    $.ajax({
        url:"<?=base_url('Mycontroller/editAdmin')?>",
        type:"POST",
        data:formData,
        processData: false,
        contentType: false,
        success:function(data){
          displayAdmin();
          $('#edit_addmin').val(null);
          $('#edit_aemail').val(null);
          var error = JSON.parse(data);
          if(error.validation ==true){
          //seterror
          var editTname_error = error.editTname;
          var editTemail_error = error.editTemail;
          //setvalue
          var setvalue_edittname = error.setEditTname;
          var setvalue_edittemail = error.setEditTemail;
          //display_seterror
          $('#error_editAdd').html(editTname_error);
          $('#error_editAemail').html(editTemail_error);

          //display_setvalue
          $('#edit_addmin').val(setvalue_edittname);
          $('#edit_aemail').val(setvalue_edittemail);
          //remove error in 3 second
          setTimeout(()=>$('p').remove(),5000);
          setTimeout(()=>$('p').remove(),5000);
          }
          else
          {
            swal(
           'UpdateSuccess!',
           'This Admin Info updated!',
           'success'
           );
           $('#modalEdit').modal('hide');
           $('#frmEdit')[0].reset();
          }
        }
    });

    
}

function addAdmin(){

    var formData = new FormData($('#frmAdmin')[0]);
   
    $.ajax({
        url:"<?=base_url('Mycontroller/addAdmin')?>",
        type:"POST",
        data:formData,
        processData: false,
        contentType: false,
        success:function(data){
          displayAdmin();
          $('#add_admin').val(null);
          $('#add_apassword').val(null);
          $('#add_email').val(null);
          var error = JSON.parse(data);
          if(error.validation==true){
          //seterror
          var tnumber_error = error.tnumber;
          var tname_error = error.tname;
          var temail_error = error.temail;
          var tpass_error = error.tpassword;
          //setvalue
          var setvalue_tnumber = error.settnumber;
          var setvalue_tname = error.settname;
          var setvalue_temail = error.settemail;
          var setvalue_tpass = error.settpassword;
          //display_seterror
          $('#error_').html(tname_error);
          $('#error_aemail').html(temail_error);
          $('#error_apassword').html(tpass_error);
          //display_setvalue
          $('#add_admin').val(setvalue_tname);
          $('#add_aemail').val(setvalue_temail);
          //remove error in 5 second
          setTimeout(()=>$('p').remove(),5000);
          setTimeout(()=>$('p').remove(),5000);
          }
          else if(error.validation==false)
          {
            swal(
           'Success!',
           'You Add New Admin!',
           'success'
           )
            $('#modaladdAdmin').modal('hide');
            $('#frmAdmin')[0].reset();
          }
        }
    });

    
}

function deleteAdmin(id){
  var con = confirm("Are you sure do you want to delete!");
  if(con == true){
      $.ajax({
      url:"<?=base_url('Mycontroller/deleteAdmin')?>",
      type:"POST",
      data: {id:id},
      success:function(data,status){
        displayAdmin();
          swal(
           'Deleted!',
           'You Delete One Record !',
           'success'
           )
      }
   });
  }
    
}

</script>
</body>
</html>
