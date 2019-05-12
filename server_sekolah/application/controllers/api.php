<?php
class api extends CI_Controller {


// Ini Api Untuk Panggil data ya di insert
// ini untuk GET data tb_siswa
function login(){

 $username = $this->input->post("username");
 $password = $this->input->post("password");
 // $level = $this->input->post("level");

 $this->db->where("username",$username);
 $this->db->where("password",md5($password));
 // $this->db->where("level",$level);


 $hasil = $this->db->get("user");

  //check query ada datanya apa enggak
  if($hasil -> num_rows() > 0 ){

   // 
 //bikin response k mobile
   $data['pesan'] = "login berhasil";
   $data['sukses']  = true ;
   $data['data'] = $hasil->row();
  }else{
   $data['pesan'] = "username atau password salah";
   $data['sukses']  = false ;

  }
  echo json_encode($data);


}

function get_user(){
	$hasil = $this->db->get("user");

	// cek kondisi ada datanya apa gak
	if ($hasil -> num_rows() > 0) {
		// Bikin response 
		$data["pesan"] = "Data Ada";
		$data["sukses"] = true;
		$data['data'] = $hasil->result();
	}else{
		$data["pesan"] = "Data Tidak Ditemukan";
		$data["sukses"] = false;
	}
	echo json_encode($data);
}	
function get_menu(){
	$this->db->SELECT("CONCAT('http://192.168.1.47/server_sekolah/foto/menu/', gambar )as gambar");
	$this->db->from('tb_listmenu');
	$hasil = $this->db->get();

	// cek kondisi ada datanya apa gak
	if ($hasil -> num_rows() > 0) {
		// Bikin response 
		$data["pesan"] = "Data Ada";
		$data["sukses"] = true;
		$data['data'] = $hasil->result();
	}else{
		$data["pesan"] = "Data Tidak Ditemukan";
		$data["sukses"] = false;
	}
	echo json_encode($data);
}	
// ini untuk GET data tb_berita
// function get_berita(){
// 	$this->db->SELECT("judul, konten, tgl_terbit, penerbit,CONCAT('http://192.168.100.25/server_sekolah/foto/berita/', gambar)as gambar");
// 	$this->db->from('tb_berita');
// 	$hasil = $this->db->get();

// 	if ($hasil -> num_rows() > 0) {
// 		//Bikin response 
// 		$data["pesan"] = "Data Ada";
// 		$data["sukses"] = true;
// 		$data["data"] = $hasil->result();
// 	}else{
// 		$data["pesan"] = "Data Tidak Ditemukan";
// 		$data["sukses"] = false;
// 	}
// 	echo json_encode($data);
// }
// // ini untuk GET data tb_kegiatan
// function get_kegiatan(){
// 	$this->db->SELECT("nama_kegiatan, tujuan, keterangan, jam, tgl, lokasi, CONCAT('http://192.168.100.25/server_sekolah/foto/kegiatan/', foto) as foto");
// 	$this->db->from('tb_kegiatan');
// 	$hasil = $this->db->get();

// 	if ($hasil -> num_rows() > 0) {
// 		//Bikin response 
// 		$data["pesan"] = "Data Ada";
// 		$data["sukses"] = true;
// 		$data["data"] = $hasil->result();
// 	}else{
// 		$data["pesan"] = "Data Tidak Ditemukan";
// 		$data["sukses"] = false;
// 	}
// 	echo json_encode($data);
// }
// // ini untuk GET data tb_laporan
// function get_laporan(){
// 	$this->db->SELECT("nama, kelas, wali, poin, melanggar, keterangan, tgl_lapor, pelapor, CONCAT('http://192.168.60.25/server_sekolah/foto/Laporan/', foto) as foto");
// 	$this->db->from('tb_laporan');
// 	$hasil = $this->db->get();

// 	if ($hasil -> num_rows() > 0) {
// 		//Bikin response 
// 		$data["pesan"] = "Data Ada";
// 		$data["sukses"] = true;
// 		$data["data"] = $hasil->result();
// 	}else{
// 		$data["pesan"] = "Data Tidak Ditemukan";
// 		$data["sukses"] = false;
// 	}
// 	echo json_encode($data);
// }
// // ini untuk GET data tb_guru
// function get_guru(){
// 	$this->db->SELECT("nama, umur, tgl_lahir, no_telp, alamat, CONCAT('http://192.168.100.25/server_sekolah/foto/Guru/', foto) as foto");
// 	$this->db->from('tb_guru');
// 	$hasil = $this->db->get();

// 	// cek kondisi ada datanya apa gak
// 	if ($hasil -> num_rows() > 0) {
// 		// Bikin response 
// 		$data["pesan"] = "Data Ada";
// 		$data["sukses"] = true;
// 		$data['data'] = $hasil->result();
// 	}else{
// 		$data["pesan"] = "Data Tidak Ditemukan";
// 		$data["sukses"] = false;
// 	}
// 	echo json_encode($data);
// }	
// // ini untuk GET data tb_guru
// function get_peraturan(){
// 	$hasil = $this->db->get("tb_peraturan");

// 	// cek kondisi ada datanya apa gak
// 	if ($hasil -> num_rows() > 0) {
// 		// Bikin response 
// 		$data["pesan"] = "Data Ada";
// 		$data["sukses"] = true;
// 		$data['data'] = $hasil->result();
// 	}else{
// 		$data["pesan"] = "Data Tidak Ditemukan";
// 		$data["sukses"] = false;
// 	}
// 	echo json_encode($data);
// }	

// ++++++++++++++++++++++++Membuat Fungsi Menghapus Data++++++++++++++++++++++++++

// // membuat fungsi delete untuk tb_siswa
// function hapus_siswa($id){

// 	$this->db->where('id',$id);
	

// 	$getId = $this->db->get('tb_siswa');
// 	if ($getId -> num_rows() == 0) {
// 		$data['sukses'] = false;
// 		$data['pesan'] = "datanya belum ada tidak Bisa Hapus";


// 	}else{

// 	$this->db->where('id',$id);


// 	$hasil = $this->db->delete('tb_siswa');
// 	if ($hasil ) {
// 		// Bikin respones k emobile
// 		$data["pesan"] = "Berhasil Hapus Data";
// 		$data["sukses"] = true;

// 	}else{
// 		$data["pesan"] = "datanya tidak bisa dihapus";
// 		$data["sukses"] = false;
// 	}
// }		
// 	echo json_encode($data);
// }	
// // membuat fungsi delete untuk tb_berita
// function hapus_berita($id){

// 	$this->db->where('id',$id);

// 	$getId = $this->db->get('tb_berita');
// 	if ($getId -> num_rows() == 0) {
// 		$data['sukses'] = false;
// 		$data['pesan'] = "beritanya belum ada tidak Bisa Hapus";


// 	}else{

// 	$this->db->where('id',$id);


// 	$hasil = $this->db->delete('tb_berita');
// 	if ($hasil ) {
// 		// Bikin respones k emobile
// 		$data["pesan"] = "Berhasil Hapus Data Bang";
// 		$data["sukses"] = true;

// 	}else{
// 		$data["pesan"] = "beritanya tidak bisa dihapus";
// 		$data["sukses"] = false;
// 	}
// }		
// 	echo json_encode($data);
// }	
// // membuat fungsi delete untuk tb_kegiatan
// function hapus_kegiatan($id){

// 	$this->db->where('id',$id);
	

// 	$getId = $this->db->get('tb_kegiatan');
// 	if ($getId -> num_rows() == 0) {
// 		$data['sukses'] = false;
// 		$data['pesan'] = "datanya belum ada, tidak Bisa Hapus";


// 	}else{

// 	$this->db->where('id',$id);


// 	$hasil = $this->db->delete('tb_kegiatan');
// 	if ($hasil ) {
// 		// Bikin respones k emobile
// 		$data["pesan"] = "Berhasil Hapus kegiatan";
// 		$data["sukses"] = true;

// 	}else{
// 		$data["pesan"] = "kegiatan tidak bisa dihapus";
// 		$data["sukses"] = false;
// 	}
// }		
// 	echo json_encode($data);
// }	
// // membuat fungsi delete untuk tb_laporan
// function hapus_laporan($id){

// 	$this->db->where('id',$id);
	

// 	$getId = $this->db->get('tb_laporan');
// 	if ($getId -> num_rows() == 0) {
// 		$data['sukses'] = false;
// 		$data['pesan'] = "laporan belum ada, tidak Bisa Hapus";


// 	}else{

// 	$this->db->where('id',$id);


// 	$hasil = $this->db->delete('tb_laporan');
// 	if ($hasil ) {
// 		// Bikin respones k emobile
// 		$data["pesan"] = "Berhasil Hapus laporan";
// 		$data["sukses"] = true;

// 	}else{
// 		$data["pesan"] = "laporan tidak bisa dihapus";
// 		$data["sukses"] = false;
// 	}
// }		
// 	echo json_encode($data);
// }	
// // membuat fungsi delete untuk tb_guru
// function hapus_guru($id){

// 	$this->db->where('id',$id);
	

// 	$getId = $this->db->get('tb_guru');
// 	if ($getId -> num_rows() == 0) {
// 		$data['sukses'] = false;
// 		$data['pesan'] = "datanya belum ada tidak Bisa Hapus";


// 	}else{

// 	$this->db->where('id',$id);


// 	$hasil = $this->db->delete('tb_guru');
// 	if ($hasil ) {
// 		// Bikin respones k emobile
// 		$data["pesan"] = "Berhasil Hapus Data";
// 		$data["sukses"] = true;

// 	}else{
// 		$data["pesan"] = "datanya tidak bisa dihapus";
// 		$data["sukses"] = false;
// 	}
// }		
// 	echo json_encode($data);
// }	
// // membuat fungsi delete untuk tb_peraturan
// function hapus_peraturan($id){

// 	$this->db->where('id',$id);
	

// 	$getId = $this->db->get('tb_peraturan');
// 	if ($getId -> num_rows() == 0) {
// 		$data['sukses'] = false;
// 		$data['pesan'] = "datanya belum ada tidak Bisa Hapus";


// 	}else{

// 	$this->db->where('id',$id);


// 	$hasil = $this->db->delete('tb_peraturan');
// 	if ($hasil ) {
// 		// Bikin respones k emobile
// 		$data["pesan"] = "Berhasil Hapus Data";
// 		$data["sukses"] = true;

// 	}else{
// 		$data["pesan"] = "datanya tidak bisa dihapus";
// 		$data["sukses"] = false;
// 	}
// }		
// 	echo json_encode($data);
// }	

// ++++++++++++++++++++++++++++Batas Fungsi Menghapus Data+++++++++++++++++++++++++++++++

// Membuat post di tb_siswa / INSERT
function tambah_siswa(){
// Variabel inputan mobile
	$nama 		= $this->input->post("nama");
	$kelas 		= $this->input->post("kelas");
	$alamat 	= $this->input->post("alamat");
	$umur		= $this->input->post("umur");
	$tgl_lahir 	= $this->input->post("tgl_lahir");


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
        $input['foto'] 						= $file_data['file_name'];
		$input["nama"] 						= $nama;
		$input["kelas"] 					= $kelas;
		$input["alamat"] 					= $alamat;
		$input["umur"]						= $umur;
		$input["tgl_lahir"]					= $tgl_lahir;


		// Using quoery for insert database

		$status = $this->db->insert("tb_siswa",$input);


		$data = array();
		// Cek berhasil apa gak
		if ($status) {
			
			$data['sukses'] = true;
			$data['pesan'] = "Insert Berhasil";
		}else{

			$data['sukses'] = false;
			$data['pesan'] = "Insert tidak berhasil";

		}

		echo json_encode($data);           
	}
}
// Membuat post di tb_berita / INSERT
function tambah_berita(){
// Variabel inputan mobile
	$judul 			= $this->input->post("judul");
	$konten 		= $this->input->post("konten");
	$tgl_terbit 	= $this->input->post("tgl_terbit");
	$penerbit		= $this->input->post("penerbit");
	$gambar 		= $this->input->post("gambar");


	$config['upload_path']          = './foto/';
	$config['allowed_types']        = 'gif|jpg|png';
	$config['max_size']             = 1000;
	$config['max_width']            = 1024;
	$config['max_height']           = 768;

	$this->load->library('upload', $config);

	if ( ! $this->upload->do_upload('gambar')){
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
        $input['gambar'] = $file_data['file_name'];
		$input["judul"] 					= $judul;
		$input["konten"] 					= $konten;
		$input["tgl_terbit"] 				= $tgl_terbit;
		$input["penerbit"]					= $penerbit;


		// Using quoery for insert database

		$status = $this->db->insert("tb_berita",$input);


		$data = array();
		// Cek berhasil apa gak
		if ($status) {
			
			$data['sukses'] = true;
			$data['pesan'] = "Insert Berhasil";
		}else{

			$data['sukses'] = false;
			$data['pesan'] = "Insert tidak berhasil";

		}

		echo json_encode($data);           
	}
}
  // Membuat post di tb_kegiatan / INSERT
function tambah_kegiatan(){
// Variabel inputan mobile
	$nama_kegiatan 			= $this->input->post("nama_kegiatan");
	$tujuan 				= $this->input->post("tujuan");
	$keterangan				= $this->input->post("keterangan");
	$jam 					= $this->input->post("jam");
	$tgl					= $this->input->post("tgl");
	$lokasi 				= $this->input->post("lokasi");

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
		$input["nama_kegiatan"] 			= $nama_kegiatan;
		$input["tujuan"] 					= $tujuan;
		$input["keterangan"]				= $keterangan;
		$input["jam"] 						= $jam;
		$input["tgl"]						= $tgl;
		$input["lokasi"]					= $lokasi;


		// Using quoery for insert database

		$status = $this->db->insert("tb_kegiatan",$input);


		$data = array();
		// Cek berhasil apa gak
		if ($status) {
			
			$data['sukses'] = true;
			$data['pesan'] = "Insert Berhasil";
		}else{

			$data['sukses'] = false;
			$data['pesan'] = "Insert tidak berhasil";

		}

		echo json_encode($data);           
	}


	


  }
  // Membuat post di tb_laporan / INSERT
function tambah_laporan(){
// Variabel inputan mobile
	$nama 						= $this->input->post("nama");
	$kelas 						= $this->input->post("kelas");
	$wali 						= $this->input->post("wali");
	$poin						= $this->input->post("poin");
	$melanggar 					= $this->input->post("melanggar");
	$keterangan					= $this->input->post("keterangan");
	$tgl_lapor					= $this->input->post("tgl_lapor");
	$pelapor					= $this->input->post("pelapor");
	$foto						= $this->input->post("foto");


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
        $input['foto'] 						= $file_data['file_name'];
		$input["nama"] 						= $nama;
		$input["kelas"] 					= $kelas;
		$input["wali"] 						= $wali;
		$input["poin"]						= $poin;
		$input["melanggar"]					= $melanggar;
		$input["keterangan"]				= $keterangan;
		$input["tgl_lapor"]					= $tgl_lapor;
		$input["pelapor"]					= $pelapor;


		// Using quoery for insert database

		$status = $this->db->insert("tb_laporan",$input);


		$data = array();
		// Cek berhasil apa gak
		if ($status) {
			
			$data['sukses'] = true;
			$data['pesan'] = "Insert Berhasil";
		}else{

			$data['sukses'] = false;
			$data['pesan'] = "Insert tidak berhasil";

		}

		echo json_encode($data);           
	}
}
// Membuat post di tb_guru / INSERT
function tambah_guru(){
// Variabel inputan mobile
	$nama 		= $this->input->post("nama");
	$umur 		= $this->input->post("umur");
	$tgl_lahir 	= $this->input->post("tgl_lahir");
	$no_telp	= $this->input->post("no_telp");
	$alamat 	= $this->input->post("alamat");
	$foto		= $this->input->post('foto');


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
        $input['foto'] 						= $file_data['file_name'];
		$input["nama"] 						= $nama;
		$input["umur"] 						= $umur;
		$input["tgl_lahir"] 				= $tgl_lahir;
		$input["no_telp"]					= $no_telp;
		$input["alamat"]					= $alamat;


		// Using quoery for insert database

		$status = $this->db->insert("tb_guru",$input);


		$data = array();
		// Cek berhasil apa gak
		if ($status) {
			
			$data['sukses'] = true;
			$data['pesan'] = "Insert Berhasil";
		}else{

			$data['sukses'] = false;
			$data['pesan'] = "Insert tidak berhasil";

		}

		echo json_encode($data);           
	}
}
function tambah_peraturan(){
// Variabel inputan mobile
	$judul = $this->input->post("judul");
	$isi = $this->input->post("isi");
	$penulis = $this->input->post("penulis");


	// d implementasi nama field databasenya
	$simpan = array();
	$simpan["judul"] 	= $judul;
	$simpan["isi"] 		= $isi;
	$simpan["penulis"] 	= $penulis;


	// Using quoery for insert database

	$status = $this->db->insert("tb_peraturan",$simpan);


	$data = array();
	// Cek berhasil apa gak
	if ($status) {
		
		$data['sukses'] = true;
		$data['pesan'] = "Insert Berhasil";
	}else{

		$data['sukses'] = false;
		$data['pesan'] = "Insert tidak berhasil";

	}

	echo json_encode($data);


  }

//  ++++++++++++++++++ Buat Fungsi Register +++++++++++++++++++++

function register(){


//variable untuk ambil inputan dari mobile
 $nama			= $this->input->post("nama");
 $username 		= $this->input->post("username");
 $password 		= $this->input->post("password");
 $alamat 		= $this->input->post("alamat");
 $phone 		= $this->input->post("phone");
 //$level 		= $this->input->post("level");

 // 	$config['upload_path']          = './foto/';
	// $config['allowed_types']        = 'gif|jpg|png';
	// $config['max_size']             = 1000;
	// $config['max_width']            = 1024;
	// $config['max_height']           = 768;

	// $this->load->library('upload', $config);

	// if ( ! $this->upload->do_upload('foto')){
	// 	echo("gagal ");

	// }else{
	// 	$data_upload = $this->upload->data(); // Get the file data
 //        $fileData[] = $data_upload; // It's an array with many data
 //        // Interate throught the data to work with them
 //        foreach ($fileData as $file) {
 //            $file_data = $file;
 //        }

        // var_dump($file_data);

         $input = array();
        // $input['foto'] 							= $file_data['file_name'];
		$input["username"] 						= $username;
		//$input["alamat"]						= $alamat;
		//$input["phone"] 						= $phone;
		$input["password"]						= $password;
		//$input["level"]							= $level;
		$input["nama"]							= $nama;


		// Using quoery for insert database

		$status = $this->db->insert("admin",$input);


		$data = array();
		// Cek berhasil apa gak
		if ($status) {
			
			$data['sukses'] = true;
			$data['pesan'] = "Insert Berhasil";
		}else{

			$data['sukses'] = false;
			$data['pesan'] = "Insert tidak berhasil";

		}

		echo json_encode($data);           
	}
}


// function loginUser(){


// 	$email = $this->input->post("email");
// 	$password = $this->input->post("password");

// 	$this->db->where('user_email',$email);
// 	$verifEmail = $this->db->get("tb_user");

// 	$this->db->where('user_password',$password);
// 	$verifPassword = $this->db->get("tb_user");

// 	// cek kondisi ada datanya apa gak
// 	if ($verifEmail -> num_rows() != 0 && $verifPassword -> num_rows() != 0) {
// 		// Bikin respones k emobile
// 		$data["pesan"] = "Sukses Login";
// 		$data["sukses"] = true;
// 		$data['data'] = $verifEmail->result();
// 	}else if ($verifEmail -> num_rows() == 0){
// 		$data["pesan"] = "username salah bang!";
// 		$data["sukses"] = false;
// 	}else{
// 		$data["pesan"] = "password salah bang!";
// 		$data["sukses"] = false;

// 	}
// 	echo json_encode($data);
// }	

?>