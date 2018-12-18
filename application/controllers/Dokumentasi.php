<?php 
if(defined('basepath')) exit ('No direct access script allowed');

class Dokumentasi extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('GlobalCrud','crud');
	}

	function create(){
        if(!empty($_FILES)){
            $tempFile = $_FILES['file']['tmp_name'];
            $fileName = date('YmdHis');
            
            $targetPath = 'files/';
            $file = $_FILES['file']['name'];
            $ext = pathinfo($file,PATHINFO_EXTENSION);
            
                
                $targetFile = $targetPath . $fileName.".".$ext;
            
                move_uploaded_file($tempFile,$targetFile);

                $query = array(
                    'id_ekskul' => $this->input->post('id_ekskul'),
                    'path' => $targetFile,
                    
                );

                $this->crud->insert('dokumentasi',$query);
            
            
            
        }
    }
}