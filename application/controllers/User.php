<?php 

if(defined('basepath')) exit ('No direct access script allowed');

class User extends CI_Controller {
    
    var $message;

    function __construct(){
        parent::__construct();
        $this->load->model('GlobalCrud','crud');
        date_default_timezone_set('Asia/Jakarta');
        
        if($this->session->userdata('role') != '0'){
            redirect('login','refresh');
        }
    }
    
    function register(){


        $count = array(
            'id_siswa' => $this->session->userdata('id_siswa')
        );

        $data = array(
            'set' => $this->crud->all('ekskul')->result(),
            'set_siswa' => $this->crud->twoTablesFusionCondition('user','siswa','*','user.id_siswa = siswa.id_siswa','id_user',$this->session->userdata('id_user'))->result(),
            'set_ekskul' => $this->crud->twoTablesFusionCondition('registrasi','ekskul','*','registrasi.id_ekskul= ekskul.id_ekskul','id_siswa',$this->session->userdata('id_siswa'))->result(),
            'total_ekskul' => $this->crud->get('registrasi',$count)->num_rows()
        );

        $this->load->view('layouts/header');
        $this->load->view('layouts/nav');
        $this->load->view('user/register',$data);
        $this->load->view('layouts/footer');
    }

    function registered($id_ekskul){

        $cek = array(
            'id_siswa' => $this->session->userdata('id_siswa'),
            'id_ekskul' => $id_ekskul      
        );

        $result = $this->crud->get('registrasi',$cek)->num_rows();
        if($result > 0){
            $this->message = 'Anda tidak bisa mengikuti ekskul yang sama lebih dari satu';
            $this->session->set_flashdata('warning',$this->message);
            redirect('user/register');

        } else {

            $count = array(
                 'id_siswa' => $this->session->userdata('id_siswa')      
            );

            $total = $this->crud->get('registrasi',$count)->num_rows();

            if($total >= 3){

                $this->message = 'Anda tidak bisa mengikuti ekskul lebih dari 3';
                $this->session->set_flashdata('warning',$this->message);
                redirect('user/register');

            } else {

                $query = array(
                    'id_ekskul' => $id_ekskul,
                    'id_siswa'  => $this->session->userdata('id_siswa'),
                    'tanggal_daftar' => date('Y-m-d')
                );

                $this->crud->insert('registrasi',$query);
                $this->message = 'Anda berhasil mengikuti ekskul :)';
                $this->session->set_flashdata('success',$this->message);
                redirect('user/register');
            }

        }

      
    }

    function galeri(){
        $data = array(
            'set' => $this->crud->twoTablesFusion('dokumentasi','ekskul','*','dokumentasi.id_ekskul=ekskul.id_ekskul')->result()
        );

        $this->load->view('layouts/header');
        $this->load->view('layouts/nav');
        $this->load->view('galeri/kelola',$data);
        $this->load->view('layouts/footer');
    }
    
    
    
    
}