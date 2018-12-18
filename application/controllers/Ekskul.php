<?php 

if(defined('basepath')) exit ('no direct access script allowed');

class Ekskul extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('GlobalCrud','crud');
	}

	function create(){
		$this->validation();
		if($this->form_validation->run() == FALSE){

			$this->message = "Komponen Ekskul Wajib Diisi !";
	        $this->session->set_flashdata('warning',$this->message);            
	        redirect('admin/ekskul');

		} else {

			$query = array(
				'nama_ekskul' => $this->input->post('nama_ekskul'),
				'penanggung_jawab' => $this->input->post('penanggung_jawab'),
				'lokasi' => $this->input->post('lokasi'),
				'hari' => $this->input->post('hari'),
				'jam_mulai' => $this->input->post('jam_mulai'),
				'jam_selesai' => $this->input->post('jam_selesai')
				
			);
			$this->crud->insert('ekskul',$query);
			$this->message = "Data Ekskul Berhasil Disimpan !";
	        $this->session->set_flashdata('success',$this->message);            
	        redirect('admin/ekskul');

		}
		

	}

	function get($id){
		$query = array(
			'id_ekskul' => $id
		);

		$result = $this->crud->get('ekskul',$query)->row();
		echo json_encode($result);
	}

	function update(){
		$query = array(
				'nama_ekskul' => $this->input->post('nama_ekskul'),
				'penanggung_jawab' => $this->input->post('penanggung_jawab'),
				'lokasi' => $this->input->post('lokasi'),
				'hari' => $this->input->post('hari'),
				'jam_mulai' => $this->input->post('jam_mulai'),
				'jam_selesai' => $this->input->post('jam_selesai'),
			);
		$this->crud->update('ekskul',$query,'id_ekskul',$this->input->post('id_ekskul'));
		$this->message = "Data Ekskul Berhasil Diubah !";
        $this->session->set_flashdata('success',$this->message);            
        redirect('admin/ekskul');
	}

	function destroy($id){
		$this->crud->delete('ekskul','id_ekskul',$id);
		$this->message = "Data Ekskul Berhasil Dihapus !";
        $this->session->set_flashdata('success',$this->message);            
        redirect('admin/ekskul');
	}

	function data_pendaftar($id_ekskul){
		$data = array(
			'set' => $this->crud->threeTablesFusionCondition(
				'registrasi',
				'ekskul',
				'siswa',
				'siswa.id_siswa as id_siswa,
				 siswa.nama_siswa as nama,
				 siswa.nis as nis,
				 siswa.kelas as kelas,
				 siswa.jurusan as jurusan,
				 siswa.rombel as rombel,
				 registrasi.tanggal_daftar as tanggal,
				 ekskul.id_ekskul as id_ekskul
				',
				'ekskul.id_ekskul=registrasi.id_ekskul',
				'siswa.id_siswa=registrasi.id_siswa',
				'registrasi.id_ekskul',
				$id_ekskul)->result()

		);


        $this->load->view('layouts/header');
        $this->load->view('layouts/nav');
        $this->load->view('admin/ekskul/pendaftar',$data);
        $this->load->view('layouts/footer');
	}

	function hapus_pendaftar($id_ekskul,$id_siswa){
		$this->crud->delete_pendaftar($id_ekskul,$id_siswa);
		$this->message = "Data Pendaftar Berhasil Dihapus !";
        $this->session->set_flashdata('success',$this->message);            
        redirect('admin/ekskul');

	}

	function validation(){
        $this->form_validation->set_rules('nama_ekskul','','required');
        $this->form_validation->set_rules('penanggung_jawab','','required');
        $this->form_validation->set_rules('lokasi','','required');
        $this->form_validation->set_rules('hari','','required');
        $this->form_validation->set_rules('jam_mulai','','required');
 		$this->form_validation->set_rules('jam_selesai','','required');
	}
}