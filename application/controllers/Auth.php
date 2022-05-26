<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_lapor');
		$this->load->model('m_admin');
		//$this->output->enable_profiler(TRUE);
	}

	public function login()
	{
		if ($this->session->userdata('login') == true) {
			if ($this->session->userdata('klasifikasi') == 'admin') {
				redirect('admin');
			} else {
				redirect('beranda/lapor');
			}
		} else {
			$data = [
				'title' => 'Login | Sistem Aspirasi & Pengaduan Masyarakat'
			];
			$this->load->view('v_login', $data);
		}
	}
	public function reset_password()
	{
			$data = [
				'title' => 'Reset Password | Sistem Aspirasi & Pengaduan Masyarakat'
			];
			$this->load->view('v_reset_password', $data);
	}
	public function register()
	{
		if ($this->session->userdata('login') == true) {
			if ($this->session->userdata('klasifikasi') == 'admin') {
				redirect('admin');
			} else {
				redirect('beranda/lapor');
			}
		} else {
			$data = [
				'title' => 'Registrasi | Sistem Aspirasi & Pengaduan Masyarakat'
			];
			$this->load->view('v_register', $data);
		}
	}

	public function forgetpassword(){
		$email = $this->input->post('emailMasuk');
		$no_ktp = $this->input->post('regId');

		// var_dump($email.$no_ktp);

		$cek_data = $this->m_lapor->checkUser($email, $no_ktp);
		if($cek_data){
			$data = [
				'title' => 'Password Baru | Sistem Aspirasi & Pengaduan Masyarakat',
				'id' => $cek_data->id_pelapor
			];
			$this->load->view('v_newpassword', $data);
		}else{
			$this->session->set_flashdata('failed', 'Reset Password Gagal. Silahkan coba lagi.');
			redirect('auth/reset_password');
		}
	}

	public function newpassword(){
		$pass = $this->input->post('regKonfirmasiPass');
		$id = $this->input->post('id_pelapor');

		// var_dump($email.$no_ktp);

		$update_data = $this->m_lapor->updatePassword($id, ['password' => sha1($pass)]);
		if($update_data){
			$this->session->set_flashdata('success', 'Pembuatan Password Baru Berhasil. Silahkan Login');
			redirect('auth/login');
		}else{
			$this->session->set_flashdata('failed', 'Pembuatan Password Baru Gagal. Silahkan coba lagi.');
			redirect('auth/forgetpassword');
		}
		var_dump($update_data);
	}
}
?>
