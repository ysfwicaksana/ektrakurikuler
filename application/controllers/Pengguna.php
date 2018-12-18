<?php
if(defined('basepath')) exit ('No direct access script allowed');

class Pengguna extends CI_Controller{
    
    var $message;
    
    function __construct(){
        parent::__construct();
        $this->load->model('GlobalCrud','crud');
        $this->load->model('UserModel','user');
        if($this->session->userdata('role') != 1){
            redirect('login');
        }
    }
    
    function create(){
        $this->validation();
        if($this->form_validation->run() == FALSE){
            $this->message = "Komponen Pengguna Wajib Diisi !";
            $this->session->set_flashdata('warning',$this->message);            
            redirect('admin/pengguna');
        } else {
            
            $query = array(
               
                'username' => $this->input->post('username'),
                'password' => sha1($this->input->post('password')),
                'id_siswa' => $this->input->post('id_siswa'),
                'role' => '0'
            );
            
            $this->crud->insert('user',$query);
            $this->message = "Pengguna Baru Berhasil Disimpan :)";
            $this->session->set_flashdata('success',$this->message);
            redirect('admin/pengguna');
            
        }
    }
    
    function get($id){
        
        $data = array(
            'id_user' => $id
        );
        
        $result = $this->crud->get('user',$data)->row();
        echo json_encode($result);
        
    }
    
    function update(){
        $this->validation();
        if($this->form_validation->run() == FALSE){
            $this->message = "Komponen Pengguna Wajib Diisi !";
            $this->session->set_flashdata('warning',$this->message);            
            redirect('admin/partisipan');
        } else {
            $query = array(
                'username' => $this->input->post('username'),
            
            );
            
            $this->crud->update('user',$query,'id_user',$this->input->post('id_user'));
            $this->message = "Pengguna Berhasil Diubah :)";
            $this->session->set_flashdata('success',$this->message);
            redirect('admin/pengguna');
        }
    }
    
    function destroy($id){
        $this->message = "Pengguna berhasil dihapus :)";
        $this->crud->delete('user','id_user',$id);
        $this->session->set_flashdata('success',$this->message);
        redirect('admin/pengguna');
        
    }
    
    function reset_password(){       
            $old_password = $this->user->reset($this->input->post('id_user'));
            if($old_password == sha1($this->input->post('password'))){
                
                $query = array(
                    'password' => sha1($this->input->post('new_password'))
                );
                
                $this->crud->update('user',$query,'id_user',$this->input->post('id_user'));
                $this->message = 'Password berhasil diubah';
                $this->session->set_flashdata('success',$this->message);
                redirect('admin/pengguna');
                
            } else {
                
                $this->message = 'Password baru tidak sesuai!';
                $this->session->set_flashdata('danger',$this->message);
                redirect('admin/pengguna');
            }  
    }
    
    function validation(){
        $this->form_validation->set_rules('username','','required');
        $this->form_validation->set_rules('password','','required');
        $this->form_validation->set_rules('id_siswa','','required');
        
    }
    
}