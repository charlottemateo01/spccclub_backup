<?php 
  $hasTeacher =$this->session->has_userdata('teacher_authenticated');
  $teacherData = $this->session->userdata('auth_teacher');
?>
<html lang="en"><head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Club Works</title>
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
          <img alt="image" src="<?=base_url('assets/images/teacher_profile/').$teacherData['picture']?>" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block"><?=$teacherData['fullname']?></div></a>
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
                <a href="teacherboard" class="nav-link"><i class="fas fa-columns"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu" style="display: none;">
                  <li><a class="nav-link" href="index-0.html">General Dashboard</a></li>
                  <li><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>
                </ul>
              </li>
              <li class="menu-header">Starter</li>
              <li class=""><a class="nav-link" href=""><i class="fas fa-user-graduate"></i><span>clubWorks</span></a></li>
              <li><a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i> <span>Credits</span></a></li>
            </ul>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content" style="min-height: 741px;">
        <section class="section">
          <div class="section-header">
            <h1>Club Works</h1>
          </div>
          <div class="section-body">
          <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                  <button class="btn btn-outline-primary " data-toggle="modal" data-target="#modalAddWorks">Add</button>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="tblworks">
                        <thead>
                          <tr>
                            <th>Topic Title</th>
                            <th>Date posted</th>
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
  <div id="modalAddWorks" class="modal fade">
  <div class="modal-dialog">
   <div class="modal-content">
    <form action="" METHOD="POST" id="frm-work" enctype="multipart/form-data">
     <div  style="" class="modal-header">      
      <h4 class="modal-title text-black" id="">Add Works</h4>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
     </div>
     <div class="modal-body row">     
      <div class="form-group col-md-12">
       <label>Topic Title</label>
       <input type="text" id="add_title" name="add_title"   class="form-control"  value="" required>
       <span id ="error_title" class="alert-danger"></span>
     </div>
      <div class="form-group col-md-12">
         <label></label>
         <textarea name="add_detail" id="add_detail" class="form-control" rows="5" > </textarea>
         <span id ="error_detail" class="alert-danger"></span>
      </div>    
      <div class="form-group col-md-12">
         <label>file</label>
         <input type="file" id="add_file" name="add_file"  class="form-control" required>
         <span id ="error_file" name ="error_file" class="alert-danger"></span>
      </div>
     </div>
     <div  style="" class="modal-footer">
     <input type="reset" class="btn btn-danger"  value="Clear">
      <button type="button"  onclick="addClubWork()"  class="btn btn-primary" >Save</button>
     </div>
    </form>
   </div>
  </div>
 </div>
 <!-- Edit Modal HTML -->
 <div id="editTinfo" class="modal fade">
  <div class="modal-dialog">
   <div class="modal-content">
    <form action="" METHOD="POST" id="editTeacher"  enctype="multipart/form-data">
     <div  style="" class="modal-header">      
      <h4 class="modal-title text-black">Edit Teacher Info</h4>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
     </div>
     <div class="modal-body row">     
        <input type="text" id="id" name="id" hidden>
        <input type="text" id="oldp" name="oldp" style="display:none">
        <input type="text" id="oldpassword" name ="oldpassword" style="display:none">
        <div class="form-group col-md-6">
       <label>Student Number</label>
       <input type="number" id="edit_tnumber" name="edit_tnumber"   class="form-control" value="" placeholder="Start-4">
       <span id ="error_editTnumber" class="alert-danger"></span>
    </div>
      <div class="form-group col-md-6">
       <label>FullName</label>
       <input type="text" id="edit_tname" name="edit_tname"   class="form-control"  value="" required>
       <span id ="error_editTname" class="alert-danger"></span>
     </div>
      <div class="form-group col-md-12">
         <label>Email</label>
         <input type="email" id="edit_temail" name="edit_temail"  class="form-control" required>
         <span id ="error_editTemail" class="alert-danger"></span>
      </div>    
      <div class="form-group col-md-12">
         <label>Password</label>
         <input type="password" id="edit_tpassword" name="edit_tpassword"  class="form-control" required>
         <span id ="error_editTpassword" class="alert-danger"></span>
      </div>    
      <div class="form-group col-md-12">
         <label>Profile</label>
         <input type="file" id="edit_tprofile" name="edit_tprofile"  class="form-control" required>
         <span id ="error_editTprofile" class="alert-danger"></span>
      </div>
     </div>
     <div  style="" class="modal-footer">
      <input type="reset" class="btn btn-danger"  value="Clear">
      <button type="button" onclick="editTeacherInfo()"  name="" class="btn btn-primary" >Update</button>
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
    displayClubwork();
});


 

function displayClubwork(){
  $('#tblworks').DataTable({
    destroy: true,
    ajax:"<?=base_url('Mycontroller/displayClubwork')?>",
    columns:
    [
        {data:"title"},
        {data:"dateposted"},
        {data: null, title: 'Action', wrap: true, "render": function (item) { return '<div class="btn-group"><button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Action</button><div class="dropdown-menu"> <a class="dropdown-item" onclick="getTeacherInfo('+item.id+')" href="" data-toggle="modal" data-target="#editTinfo">EDIT</a> <a class="dropdown-item" href="#"  onclick="deleteTeacherInfo('+item.id+')">DELETE</a></div>' } }
    ]
  });
}

function getTeacherInfo(id){

$.post("<?=base_url('Mycontroller/getTeacherInfo')?>",{
   id:id
 },function(data,status){
   var teacherInfo = JSON.parse(data);
   $('#id').val(teacherInfo.id);
   $('#oldp').val(teacherInfo.picture)
   $('#edit_tnumber').val(teacherInfo.teacherNo);
   $('#edit_tname').val(teacherInfo.fullname);
   $('#edit_temail').val(teacherInfo.email);
   $('#edit_tprofile').val(teacherInfo.profile);
   $('#oldpassword').val(teacherInfo.password)
  });
}

function editTeacherInfo(){

    var formData = new FormData($('#editTeacher')[0]);
    $.ajax({
        url:"<?=base_url('Mycontroller/editTeacherInfo')?>",
        type:"POST",
        data:formData,
        processData: false,
        contentType: false,
        success:function(data){
          displayTeacherInfo();
          $('#edit_tnumber').val(null);
          $('#edit_tname').val(null);
          $('#edit_temail').val(null);
          var error = JSON.parse(data);
          if(error.validation ==true){
          //seterror
          var editTnumber_error = error.editTnumber;
          var editTname_error = error.editTname;
          var editTemail_error = error.editTemail;
          var editTpass_error = error.editTpassword;
          //setvalue
          var setvalue_edittnumber = error.setEditTnumber;
          var setvalue_edittname = error.setEditTname;
          var setvalue_edittemail = error.setEditTemail;
          //display_seterror
          $('#error_editTname').html(editTname_error);
          $('#error_editTemail').html(editTemail_error);
          $('#error_editTpassword').html(editTpass_error);
          $('#error_editTnumber').html(editTnumber_error);
          //display_setvalue
          $('#edit_tnumber').val(setvalue_edittnumber);
          $('#edit_tname').val(setvalue_edittname);
          $('#edit_temail').val(setvalue_edittemail);
          //remove error in 3 second
          setTimeout(()=>$('p').remove(),5000);
          setTimeout(()=>$('p').remove(),5000);
          }
          else
          {
            swal(
           'UpdateSuccess!',
           'This Teacher Info updated!',
           'success'
           );
           $('#editTinfo').modal('hide');
          }
        }
    });

    
}

function addClubWork(){
    
    var formData = new FormData($('#frm-work')[0]);

    $.ajax({
        url:"<?=base_url('Mycontroller/addClubWork')?>",
        type:"POST",
        data:formData,
        processData: false,
        contentType: false,
        success:function(data){
         displayClubwork();
          $('#add_title').val(null);
          $('#add_detail').val(null);
          var error = JSON.parse(data);
          if(error.validation ==true){
          //seterror
          var title_error= error.title;
          var detail_error = error.detail;
          //setvalue
          var setvalue_title = error.settitle;
          var setvalue_detail = error.setdetail;
          //display_seterror
          $('#error_title').html(title_error);
          $('#error_detail').html(detail_error);
          //display_setvalue
          $('#add_title').val(setvalue_title);
          $('#add_detail').val(setvalue_detail);
          //remove error in 5 second
          setTimeout(()=>$('p').remove(),5000);
          setTimeout(()=>$('p').remove(),5000);

          }
          else if(error.validation ==false)
          {
            swal(
           'Success!',
           'You Add New Work!',
           'success'
           )
            $('#modalAddWorks').modal('hide');
            $('#frm-work')[0].reset();
          }
        }
    });

    
}

function deleteTeacherInfo(id){
  var con = confirm("Are you sure do you want to delete!");
  if(con == true){
      $.ajax({
      url:"<?=base_url('Mycontroller/deleteTeacherInfo')?>",
      type:"POST",
      data: {id:id},
      success:function(data,status){
        displayTeacherInfo();
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
