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
}
?>
