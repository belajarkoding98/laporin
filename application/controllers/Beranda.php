<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_lapor');
		$this->load->model('m_admin');
		//$this->output->enable_profiler(TRUE);
	}

	public function messageAlert($type, $title)
    {
        $messageAlert = "
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 5000
      });
      Toast.fire({
          type: '" . $type . "',
          title: '" . $title . "'
      });
      ";
        return $messageAlert;
    }


	public function index()
	{
		if ($this->session->userdata('login') == true) {
			if ($this->session->userdata('klasifikasi') == 'admin') {
				redirect('admin');
			} else {
				redirect('beranda/lapor');
			}
		} else {
			$data = [
				'title' => 'Beranda | Sistem Aspirasi & Pengaduan Masyarakat',
				'total_pengaduan' => $this->m_admin->getTotalPengaduan(),
				'diproses_pengaduan' => $this->m_admin->getPengaduan(['status' => '0']),
				'selesai_pengaduan' => $this->m_admin->getPengaduan(['status' => '1']),
				'ditolak_pengaduan' => $this->m_admin->getPengaduan(['status' => '2']),
			];
			// var_dump($data);
			$this->load->view('v_beranda', $data);
		}
	}

	public function lapor()
	{
		if ($this->session->userdata('login') == true) {
			$data['main_view'] = 'v_lapor';
			$data['pelapor'] = $this->m_admin->getPelapor(['status' => '1']);
			$data['title'] = 'Beranda | Sistem Aspirasi & Pengaduan Masyarakat';
			$this->load->view('template', $data);
		} else {
			redirect('beranda');
		}
	}

	public function history()
	{
		$data['main_view'] = 'v_history';
		$data['title'] = 'History | Sistem Aspirasi & Pengaduan Masyarakat';
		$data['history'] = $this->m_lapor->getHistory();
		$data['laporan'] = $this->m_lapor->getDetailHistory($this->session->userdata('id_pelapor'));
		// var_dump($data);
		$this->load->view('template', $data);
	}

	public function login()
	{
		if ($this->m_lapor->login()) {
			redirect('beranda/lapor');
		} else {
		// $this->session->set_flashdata('messageAlert', $this->messageAlert('success', 'Login Gagal, cek kembali email dan password anda/aktivasi akun anda'));
			$this->session->set_flashdata('failed', 'Login Gagal, cek kembali email dan password anda/aktivasi akun anda');
			redirect('auth/login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();

		redirect('beranda');
	}

	public function chat()
	{
		if ($this->m_lapor->sendChat()) {
			redirect($this->session->userdata('url'));
		} else {
			redirect($this->session->userdata('url'));
		}
	}

	public function aktivasiAkun($id)
	{
		$base_64 = $id . str_repeat('=', strlen($id) % 4);
		$id=base64_decode($base_64);

		if ($this->m_lapor->aktivasiAkun($id)) {
			$this->session->set_flashdata('success', 'Aktivasi email anda berhasil, silahkan login untuk melanjutkan');
			redirect('beranda');
		} else {
			redirect('beranda');
		}
	}

	public function sendEmail($id, $email)
	{
		$this->load->library('email');
		
		$config = array(
			'protocol' 	=> 'smtp',
			'smtp_host'	=> 'ponpesnurulhuda.org', 
			'smtp_port'	=> 465,
			'smtp_user'	=> 'cs@ponpesnurulhuda.org',
			'smtp_pass'	=> 'CustomerServiceNH2022',
			'charset'   => 'utf-8',
'mailtype'  => 'html',
'crlf'   => "\r\n", 
'newline'   => "\r\n", 
			'wordwrap'	=> true
		);
		// $this->load->library('email', $config);
		
		$this->email->initialize($config);
		$id=base64_encode($id);
		$idtrim = rtrim($id, '=');
		$link = base_url().'beranda/aktivasiAkun/'.$idtrim;
		// $this->email->set_newline("\r\n");
		$this->email->from('peradenancomputer@gmail.com', 'Sistem Aspirasi & Pengaduan Masyarakat');
		$this->email->to($email);
		$this->email->subject('Verifikasi Akun E-Lapor');
		$this->email->message('Klik link berikut untuk aktivasi email anda '.$link);

		if ($this->email->send()) {
			return true;
		} else {
			return false;
		}
	}

	public function register()
	{
		$config['upload_path'] = './uploads/ktp/';
		$config['allowed_types'] = 'gif|jpg|png|txt|doc|docx|pdf|jpeg';
		$config['max_size']  = '10000';
		
		$this->load->library('upload', $config);
		var_dump($this->upload->do_upload('files'));
		if ( ! $this->upload->do_upload('files')){
			$this->session->set_flashdata('failed', $this->upload->display_errors());
			redirect('auth/register');
		}
		else{
			if ($this->m_lapor->register($this->upload->data())) {
				$id = $this->db->select('id_pelapor, email')->order_by('id_pelapor',"desc")->limit(1)->get('pelapor')->row();
				$this->sendEmail($id->id_pelapor, $id->email);
			// $this->session->set_flashdata('messageAlert', $this->messageAlert('success', '<b>Pendaftaran Berhasil</b> Silahkan Cek Alamat Email Anda.'));
			// $this->session->set_flashdata('success', '<b>Pendaftaran Berhasil</b> Silahkan Cek Alamat Email Anda untuk verifikasi.');
			$this->session->set_flashdata('success', '<b>Pendaftaran Berhasil</b> tunggu beberapa saat, akun anda segera kami aktifkan.');
			redirect('auth/register');
		} else {
				// $this->session->set_flashdata('messageAlert', $this->messageAlert('danger', 'Pendaftaran Gagal'));
				$this->session->set_flashdata('failed', 'Pendaftaran Gagal. Silahkan coba lagi.');
				redirect('auth/register');
			}
		}
	}


	public function uploadFile()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = '*';
		$config['max_size']  = '100000';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('bukti')){
			$this->session->set_flashdata('error', $this->upload->display_errors());
			redirect($this->session->userdata('url'));
		}
		else{
			if ($this->m_lapor->uploadFile($this->upload->data())) {
				redirect($this->session->userdata('url'));
			} else {
				redirect($this->session->userdata('url'));
			}
		}
	}

	public function insertLapor()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|txt|doc|docx|pdf|jpeg';
		$config['max_size']  = '10000';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('bukti')){
			$this->session->set_flashdata('failed', $this->upload->display_errors());
			redirect('beranda/lapor');
		}
		else{
			//pemanggilan algoritma huffman
			$check_compress = explode('.', $this->upload->data()['file_name']);
			if($check_compress[1] == 'doc' || $check_compress[1] == 'docx' || $check_compress[1] == 'pdf'){
				$compress_file = $this->upload->data()['file_name'];
			}else{
				$compress_file="compress_".$this->upload->data()['file_name'];
		$compressed_img='./uploads/'.$compress_file;
		$compressed_image=$this->HufmanCompressImage('./uploads/'.$this->upload->data()['file_name'],$compressed_img);
		unlink('./uploads/'.$this->upload->data()['file_name']);
			}

			// var_dump($check_compress[1]);
			
			if ($this->m_lapor->lapor($compress_file)) {
				$this->session->set_flashdata('success', "Pelaporan Berhasil");
				redirect('beranda/lapor');		
			} else {
				$this->session->set_flashdata('failed', "Pelaporan Gagal");
				redirect('beranda/lapor');
			}
		}
	}

	public function detail($ticket,$id)
	{
		$data['main_view'] = 'v_detail';
		$data['aduan'] = $this->m_admin->detailAduan($ticket);
		$data['chat'] = $this->m_lapor->getChat();
		$array = array(
			'url' => base_url().uri_string(),
			'id_aduan' => $id
		);
		
		$this->session->set_userdata( $array );
		$this->load->view('template', $data);
	}

	//ALgoritma Huffman
	function HufmanCompressImage($source_image,$compress_image)
{
$image_info=getimagesize($source_image);
if($image_info['mime']=='image/jpeg'){
	$source_image=imagecreatefromjpeg($source_image);
	imagejpeg($source_image,$compress_image,35);
}
elseif ($image_info['mine']=='image/jpeg'){
	$source_image=imagecreatefrompng($source_image);
	imagepng($source_image,$compress_image,9);
}
return $compress_image;

}

}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */