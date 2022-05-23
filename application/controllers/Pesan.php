<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan extends CI_Controller {

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


	public function send()
	{
		if ($this->m_lapor->sendPesan()) {
		$this->session->set_flashdata('messageAlert', $this->messageAlert('success', '<b>Pesan Berhasil dikirim</b> Terimakasih atas masukan yang diberikan.'));
		redirect(site_url('beranda'));
	} else {
			$this->session->set_flashdata('messageAlert', $this->messageAlert('error', '<b>Pesan Gagal dikirim</b>'));
			redirect(site_url('beranda'));
		}
	}

}
?>
