<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mymodel extends CI_Model{

    public function getStudent(){

        return $this->db->get('student_Info');
    }
    
    public function login($data)
    {
        
        $this->db->select('*');
        $this->db->where('email',$data['email']);
        $this->db->where('password',$data['password']);
        $this->db->from('admin');
        
        $query = $this->db->get();
        if($query->num_rows()==1)
        {
            return $query->row();
        }
        else
        {
            return false;
        }
    }
    public function displayStdInfo()
    {
         $this->db->select('*');
         $query= $this->db->get('student_info');
         return $query->result();

    }

    public function getStdInfo($id)
    {
        $user_id = $id;
        $this->db->select('*');
        $this->db->from('student_info');
        $this->db->where('id',$user_id);
        return $this->db->get();
    }

    
    public function addStdInfo($data){
        $this->db->insert('student_info',$data);
        return true;
    }

    public function updateStdInfo($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('student_info', $data);
        return true;
    }

    public function deleteStdInfo($id){
        $this->db->where("id", $id);
        $this->db->delete("student_info");
        return true;
    }

    public function totalStudent()
    {
        $this->db->select('count(id) as totalStudent');
        $this->db->from('student_info');
        $query =  $this->db->get();
        foreach($query->result() as $totalStudent){
            return $totalStudent->totalStudent;
        }

    }

    public function displayTeacherInfo()
    {
         $this->db->select('*');
         $query= $this->db->get('teacher_info');
         return $query->result();

    }
    public function getTeacherInfo($id)
    {
        $user_id = $id;
        $this->db->select('*');
        $this->db->from('teacher_info');
        $this->db->where('id',$user_id);
        return $this->db->get();
    }
    public function addTeacherInfo($data)
    {
        $this->db->insert('teacher_info',$data);
        return true;
    }
    public function updateTeacherInfo($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('teacher_info', $data);
        return true;
    }
    public function deleteTeacherInfo($id)
    {
        $this->db->where("id", $id);
        $this->db->delete("teacher_info");
        return true;
    }
    public function displayClub()
    {
         $this->db->select('*');
         $query= $this->db->get('club');
         return $query->result();

    }

    public function addClub($data)
    {
        $this->db->insert('club',$data);
        return true;
    }

    public function getClub($id)
    {
        $club_id = $id;
        $this->db->select('*');
        $this->db->from('club');
        $this->db->where('id',$club_id);
        return $this->db->get();
    }

    public function editClub($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('club', $data);
        return true;
    }

    public function deleteClub($id)
    {
        $this->db->where("id", $id);
        $this->db->delete("club");
        return true;
    }

    public function fecthClub()
    {
        $this->db->select('c.id,c.banner,c.clubname,t.picture');
        $this->db->from('club as c');
        $this->db->join('teacher_info as t','c.teacherid = t.id');
        $query = $this->db->get();
        return $query->result();
    }

    public function displayAdmin()
    {
         $this->db->select('*');
         $query= $this->db->get('admin');
         return $query->result();
    }

    public function addAdmin($data){
        $this->db->insert('admin',$data);
        return true;
    }

    public function getAdmin($id)
    {
        $user_id = $id;
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('id',$user_id);
        return $this->db->get();
    }

    public function updateAdmin($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('admin', $data);
        return true;
    }

    public function deleteAdmin($id){
        $this->db->where("id", $id);
        $this->db->delete("admin");
        return true;
    }

}
?>