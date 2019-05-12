<?php
/**
 * 
 */
class api_ci extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('api_model');
		$this->load->helper(array('form', 'url'));
	}

	public function aksi_upload_user(){
		$config['upload_path']          = './foto/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 1000;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;
 
		$this->load->library('upload', $config);
 
		if ( ! $this->upload->do_upload('foto')){
			echo("gagal ");

		}else{
			$data_upload = $this->upload->data(); // Get the file data
            $fileData[] = $data_upload; // It's an array with many data
            // Interate throught the data to work with them
            foreach ($fileData as $file) {
                $file_data = $file;
            }

            // var_dump($file_data);

            $input = array();
            $input['foto'] = $file_data['file_name'];

            $simpan = $this->api_model->insert_img($input);
			if ($simpan) {
				$data['msg'] = "Berhasil Login";
			} else {
				$data['msg'] = "Gagal Login";
			}

			echo json_encode($data);
		}
	}

}

?>