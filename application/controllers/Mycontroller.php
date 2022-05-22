<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mycontroller extends CI_Controller{


    public function loginpage(){

        $this->load->view('login');
    }

    public function  login(){

        $this->form_validation->set_rules('email','Email Address','trim|required|valid_email');
        $this->form_validation->set_rules('password','Password','trim|required|md5');
        if($this->form_validation->run()==FALSE)
        {
            $this->loginpage();
        }
        else
        {
            $data=array(
            'email'=>$this->input->post('email'),
            'password'=>$this->input->post('password')
            );

            $userlogin= $this->Mymodel->login($data);
            if($userlogin !== FALSE)
            {
                $auth_adminuser=array(
                    'email'=>$userlogin->email,
                    'fullname'=>$userlogin->fullname,
                    'picture'=>$userlogin->picture
                );
                $this->session->set_userdata('admin_authenticated','1');
                $this->session->set_userdata('auth_admin',$auth_adminuser);
                redirect('dashboard');
              
            }     
            else
            {
               // $this->session->set_flashdata('c_danger','Invalid email or password');
                //$this->loginpage();

                echo"Invalid";

               
            }

        }
    }
    public function dashBoard()
    {
        $data ['totalStudent'] = $this->Mymodel->totalStudent();
        $this->load->view('adminpage/dashboard',$data);
    }
    public function logout()
    {
        $this->session->unset_userdata('auth_admin');
        $this->session->unset_userdata('admin_authenticated');
        redirect('adminlogin');
    }

    public function displayStudentpage()
    {
        $this->load->view('adminpage/studentinfo');
    }

    public function getStdInfo(){
        $id = $_POST['id'];
        $result = $this->Mymodel->getStdInfo($id);
        $response = array();
        foreach($result->result() as $row){
           $response = $row;
        }
        echo json_encode($response);

    }
    public function addStdInfo(){
        
        extract($_POST);
        $this->form_validation->set_rules('add_fname','Fname','trim|required|min_length[5]|max_length[20]|is_unique[student_info.fullname]');
        $this->form_validation->set_rules('add_age', 'Age','trim|required');
        // $this->form_validation->set_rules('add_profile', 'Profile','required');
        $this->form_validation->set_rules('add_gender', 'Gender','trim|required');
        $this->form_validation->set_rules('add_email', 'Email','trim|required|is_unique[student_info.email]|valid_email');
        $this->form_validation->set_rules('add_password', 'Password ','trim|required|md5');
        $this->form_validation->set_rules('add_studentnum', 'StudentNo','trim|required|is_unique[student_info.studentNo]|min_length[8]|max_length[8]');
        if($this->form_validation->run()==true){

            $file_name = $_FILES['add_profile']['name'];
            $new_file = time()."".str_replace(' ','-',$file_name);
      
            $config= ['upload_path'   => './assets/images/student_profile/',
                      'allowed_types' => 'gif|jpg|png|jpeg',
                      'file_name' => $new_file,
                     ];
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('add_profile')) 
            {
                // $imageError = array('error' => $this->upload->display_errors());
                // $this->session->set_flashdata('staf_status_danger',$imageError['error']);
                //  $upload_validation = array(
                //      'upload_error' =>$this->upload->display_errors(),
                //      'validation' => 'upload'
                //  );
                //  echo json_encode($upload_validation);
            }
            else
            {
                $data = array(
                    'studentNo' => $add_studentnum,
                    'fullname' => $add_fname,
                    'gender' => $add_gender,
                    'age' => $add_age,
                    'email' => $add_email,
                    'password' =>$this->input->post('add_password'),
                    'picture' =>$new_file
                   );
                   $this->Mymodel->addStdInfo($data);
                   $form_validation= array(
                       'validation'=>false,
                   );
                   echo json_encode($form_validation);
            }

        }
        else
        {
            $form_validation = array(
                'studentNo' => form_error('add_studentnum'), 
                'email' => form_error('add_email'),
                'password' =>form_error('add_password'),
                'age' => form_error('add_age'),
                'fname' => form_error('add_fname'),
                'gender' => form_error('add_gender'),
                // 'profile' => form_error('add_profile'),
                'setstudentNo' => set_value('add_studentnum'),
                'setfname' => set_value('add_fname'),
                'setage' => set_value('add_age'),
                'setgender' => set_value('add_gender'),
                'setemail' => set_value('add_email'),
                'setpassword' =>set_value('add_password'),
                'validation' => true
            );
            echo json_encode($form_validation);
        }
        
    }
    public function editStdInfo(){
        
        extract($_POST);
        $this->form_validation->set_rules('edit_fname','Fname','trim|required|min_length[5]|max_length[20]');
        $this->form_validation->set_rules('edit_age', 'Age','trim|required');
        $this->form_validation->set_rules('edit_gender', 'Gender','trim|required');
        $this->form_validation->set_rules('edit_email', 'Email','trim|required|valid_email');
        $this->form_validation->set_rules('edit_password', 'Password ','trim|required|md5');
        $this->form_validation->set_rules('edit_studentnum', 'StudentNo','trim|required|min_length[8]|max_length[8]');
        if($this->form_validation->run()==true)
        {

            $old_filename = $this->input->post('oldp');
            $new_filename = $_FILES['edit_profile']['name'];
            
            if($new_filename == TRUE)
            {
                $update_filename = time()."_".str_replace(' ','-', $new_filename);
                $config= ['upload_path'   => './assets/images/student_profile/',
                'allowed_types' => 'gif|jpg|png',
                'file_name' =>  $update_filename,
                ];
                $this->load->library('upload', $config);
                if( $this->upload->do_upload('edit_profile'))
                {
                    if(file_exists("./assets/images/student_profile/".$old_filename))
                    {
                        unlink("./assets/images/student_profile/".$old_filename);
                       
                    }
                }
            }
            else
            {
                $update_filename = $old_filename;
               
            }
            $data = array(
                'id' => $this->input->post('id'),
                'studentNo' => $edit_studentnum,
                'fullname' => $edit_fname,
                'gender' => $edit_gender,
                'age' => $edit_age,
                'email' => $edit_email,
                'password' =>$this->input->post('edit_password'),
                'picture' =>$update_filename
               );
               $this->Mymodel->updateStdInfo($data);
               $form_validation= array(
                   'validation' =>false,
               );
               echo json_encode($form_validation);
                
        }
        else
        {
            $form_validation = array(
                'studentNo' => form_error('edit_studentnum'), 
                'email' => form_error('edit_email'),
                'password' =>form_error('edit_password'),
                'age' => form_error('edit_age'),
                'fname' => form_error('edit_fname'),
                'gender' => form_error('edit_gender'),
                'setstudentNo' => set_value('edit_studentnum'),
                'setfname' => set_value('edit_fname'),
                'setage' => set_value('edit_age'),
                'setgender' => set_value('edit_gender'),
                'setemail' => set_value('edit_email'),
                'setpassword' =>set_value('edit_password'),
                'validation' => true
            );
            echo json_encode($form_validation);
        }
      
    }

    public function deleteStdInfo()
    {
        $id = $_POST['id'];
        $result= $this->Mymodel->getStdInfo($id);
        $this->Mymodel->deleteStdInfo($id);
        $file = " ";
        foreach($result->result() as $fl){
            $file=$fl->picture;
        }
        if(file_exists("./assets/images/student_profile/".$file)){
            unlink("./assets/images/student_profile/".$file);
        }
        
    }
    public function displayStdInfo()
    {
        $StdInfo = $this->Mymodel->displayStdInfo();
        $json_data ['data'] = $StdInfo;
        echo json_encode($json_data);
        
    }

    public function teacherInfo()
    {
        $this->load->view('adminpage/teachersInfo');

    }
    public function displayTeacherInfo()
    {
        $StdInfo = $this->Mymodel->displayTeacherInfo();
        $json_data ['data'] = $StdInfo;
        echo json_encode($json_data);
        
    }

    public function getTeacherInfo()
    {

        $id = $_POST['id'];
        $result = $this->Mymodel->getTeacherInfo($id);
        $response = array('teacherNo'=>'94463347', 'name' =>'Ricky');
        foreach($result->result() as $row){
           $response = $row;
        }
        echo json_encode($response);

    }

    public function addTeacherInfo(){
        
        extract($_POST);
        $this->form_validation->set_rules('add_tname','Fullname','trim|required|min_length[5]|max_length[20]|is_unique[teacher_info.fullname]');
        $this->form_validation->set_rules('add_temail', 'Email','trim|required|is_unique[teacher_info.email]|valid_email');
        $this->form_validation->set_rules('add_tpassword', 'Password ','trim|required|md5');
        $this->form_validation->set_rules('add_tnumber', 'StudentNo','trim|required|is_unique[teacher_info.teacherNo]|min_length[8]|max_length[8]');
        if($this->form_validation->run()==true){

            $file_name = $_FILES['add_tprofile']['name'];
            $new_file = time()."".str_replace(' ','-',$file_name);
      
            $config= ['upload_path'   => './assets/images/teacher_profile/',
                      'allowed_types' => 'gif|jpg|png|jpeg',
                      'file_name' => $new_file,
                     ];
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('add_tprofile')) 
            {
                // $imageError = array('error' => $this->upload->display_errors());
                // $this->session->set_flashdata('staf_status_danger',$imageError['error']);
                //  $upload_validation = array(
                //      'upload_error' =>$this->upload->display_errors(),
                //      'validation' => 'upload'
                //  );
                //  echo json_encode($upload_validation);
            }
            else
            {
                $data = array(
                    'teacherNo' => $add_tnumber,
                    'fullname' => $add_tname,
                    'email' => $add_temail,
                    'password' =>$this->input->post('add_tpassword'),
                    'picture' =>$new_file
                   );
                   $this->Mymodel->addTeacherInfo($data);
                   $form_validation= array(
                       'validation'=>false,
                   );
                   echo json_encode($form_validation);
            }

        }
        else
        {
            $form_validation = array(
                'tnumber' => form_error('add_tnumber'), 
                'temail' => form_error('add_temail'),
                'tpassword' =>form_error('add_tpassword'),
                'tname' => form_error('add_tname'),
                'settnumber' => set_value('add_tnumber'),
                'settname' => set_value('add_tname'),
                'settemail' => set_value('add_temail'),
                'settpassword' =>set_value('add_tpassword'),
                'validation' => true
            );
            echo json_encode($form_validation);
        }
        
        
      
    }

    public function editTeacherInfo(){
        
        extract($_POST);
        $this->form_validation->set_rules('edit_tname','FullName','trim|required|min_length[5]|max_length[20]');
        $this->form_validation->set_rules('edit_temail', 'Email','trim|required|valid_email');
        $this->form_validation->set_rules('edit_tnumber', 'StudentNo','trim|required|min_length[8]|max_length[8]');
        $this->form_validation->set_rules('edit_tpassword', 'Password' ,'trim|md5');
        if($this->form_validation->run()==true)
        {

            $old_filename = $this->input->post('oldp');
            $old_password = $this->input->post('oldpassword');
            $new_password = $this->input->post('edit_tpassword');
            $new_filename = $_FILES['edit_tprofile']['name'];

            if($new_password == null)
            {
                $new_password = $old_password;
            }
            else
            {
               $new_password = $new_password;
            }
            
            if($new_filename == TRUE)
            {
                $update_filename = time()."_".str_replace(' ','-', $new_filename);
                $config= ['upload_path'   => './assets/images/teacher_profile/',
                'allowed_types' => 'gif|jpg|png',
                'file_name' =>  $update_filename,
                ];
                $this->load->library('upload', $config);
                if( $this->upload->do_upload('edit_tprofile'))
                {
                    if(file_exists("./assets/images/teacher_profile/".$old_filename))
                    {
                        unlink("./assets/images/teacher_profile/".$old_filename);
                       
                    }
                }
            }
            else
            {
                $update_filename = $old_filename;
               
            }
            $data = array(
                'id' => $this->input->post('id'),
                'teacherNo' => $edit_tnumber,
                'fullname' => $edit_tname,
                'email' => $edit_temail,
                'password' =>$new_password,
                'picture' =>$update_filename
               );
               $this->Mymodel->updateTeacherInfo($data);
               $form_validation= array(
                   'validation' =>false,
               );
               echo json_encode($form_validation);
                
        }
        else
        {
            $form_validation = array(
                'editTnumber' => form_error('edit_tnumber'), 
                'editTemail' => form_error('edit_temail'),
                'editTpassword' =>form_error('edit_tpassword'),
                'editTname' => form_error('edit_tname'),
                'setEditTnumber' => set_value('edit_tnumber'),
                'setEditTname' => set_value('edit_tname'),
                'setEditTemail' => set_value('edit_temail'),
                'validation' => true
            );
            echo json_encode($form_validation);
        }
      
    }

    public function deleteTeacherInfo()
    {
        $id = $_POST['id'];
        $result= $this->Mymodel->getTeacherInfo($id);
        $this->Mymodel->deleteTeacherInfo($id);
        $file = " ";
        foreach($result->result() as $fl){
            $file=$fl->picture;
        }
        if(file_exists("./assets/images/teacher_profile/".$file)){
            unlink("./assets/images/teacher_profile/".$file);
        }
        
    }

    public function clubList()
    {
        $data['club'] =$this->Mymodel->fecthClub();
        $this->load->view('studentpage/clublist',$data);
    }

    public function club()
    {
        $data['instructor'] =$this->Mymodel->displayTeacherInfo(); 
        $this->load->view('adminpage/club',$data);
    }

    public function displayClub()
    {
        $Club = $this->Mymodel->displayClub();
        $json_data ['data'] = $Club;
        echo json_encode($json_data);
    }

    public function addClub(){
        
        extract($_POST);
        $this->form_validation->set_rules('add_club','Clubname','trim|required|min_length[3]|max_length[20]|is_unique[clubs.clubname]');
        $this->form_validation->set_rules('add_instructor', 'Intructor','trim|required');
        if($this->form_validation->run()==true){

            $file_name = $_FILES['add_banner']['name'];
            $new_file = time()."".str_replace(' ','-',$file_name);
      
            $config= ['upload_path'   => './assets/images/clubbanner/',
                      'allowed_types' => 'gif|jpg|png',
                      'file_name' => $new_file,
                     ];
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('add_banner')) 
            {
                // $imageError = array('error' => $this->upload->display_errors());
                // $this->session->set_flashdata('staf_status_danger',$imageError['error']);
                //  $upload_validation = array(
                //      'upload_error' =>$this->upload->display_errors(),
                //      'validation' => 'upload'
                //  );
                //  echo json_encode($upload_validation);
            }
            else
            {
                $data = array(
                    'clubname' => $add_club,
                    'teacherid' => $add_instructor,
                    'banner' =>$new_file,
                   );
                    $this->Mymodel->addClub($data);
                    $form_validation= array(
                       'validation'=>false,
                   );
                    echo json_encode($form_validation);
            }

        }
        else
        {
            $form_validation = array(
                'clubname' => form_error('add_club'), 
                'instructor' => form_error('add_instructor'),
                'setclubname' => set_value('add_club'),
                'setinstructor' => set_value('add_instructor'),
                'validation' => true
            );
            echo json_encode($form_validation);
        }
        
        
      
    }

    public function getClub()
    {
        $id = $_POST['id'];
        $result = $this->Mymodel->getClub($id);
        $response = array();
        foreach($result->result() as $row){
           $response = $row;
        }
        echo json_encode($response);

    }

    public function editClub()
    {
        extract($_POST);
        $this->form_validation->set_rules('edit_club','Clubname','trim|required|min_length[3]|max_length[20]');
        $this->form_validation->set_rules('edit_instructor', 'Intructor','trim|required');

        if($this->form_validation->run()==true)
        {

            $old_filename = $this->input->post('oldp');
            $new_filename = $_FILES['edit_banner']['name'];

            if($new_filename == TRUE)
            {
                $update_filename = time()."_".str_replace(' ','-', $new_filename);
                $config= ['upload_path'   => './assets/images/clubbanner/',
                'allowed_types' => 'gif|jpg|png',
                'file_name' =>  $update_filename,
                ];
                $this->load->library('upload', $config);
                if( $this->upload->do_upload('edit_banner'))
                {
                    if(file_exists("./assets/images/clubbanner/".$old_filename))
                    {
                        unlink("./assets/images/clubbanner/".$old_filename);
                       
                    }
                }
            }
            else
            {
                $update_filename = $old_filename;
               
            }
            $data = array(
                'id' => $this->input->post('id'),
                'clubname' => $edit_club,
                'teacherid' => $edit_instructor,
                'banner' => $update_filename,
               );
                $this->Mymodel->editClub($data);
                $form_validation= array(
                   'validation'=>false,
               );
                echo json_encode($form_validation);
        }
        else
        {
            $form_validation = array(
                'clubname' => form_error('edit_club'), 
                'instructor' => form_error('edit_instructor'),
                'setclubname' => set_value('edit_club'),
                'setinstructor' => set_value('edit_instructor'),
                'validation' => true
            );
            echo json_encode($form_validation);
        }
    }

    public function deleteClub()
    {
        $id = $_POST['id'];
        $result= $this->Mymodel->getClub($id);
        $this->Mymodel->deleteclub($id);
        $file = " ";
        foreach($result->result() as $fl){
            $file=$fl->banner;
        }
        if(file_exists("./assets/images/clubbanner/".$file)){
            unlink("./assets/images/clubbanner/".$file);
        }
    }

    public function error404()
    {
        $this->load->view('error404');
    }

    public function searchpage()
    {
        $foundpage= $this->input->post('fpage');
        redirect($foundpage);
    }
   
    public function clubhome()
    {
        $this->load->view('studentpage/clubhome');
    }



}

?>