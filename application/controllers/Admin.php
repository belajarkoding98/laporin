<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_admin');
		$this->load->model('m_lapor');
		//$this->output->enable_profiler(TRUE);
	}

	public function index()
	{
		if ($this->session->userdata('login') == true) {
			if ($this->session->userdata('klasifikasi') == 'admin') {
				redirect('admin/chart');	
			} else {
				redirect('beranda/lapor');
			}
		} else {
			redirect('admin/login');
		}
	}

	public function createLaporan()
	{
		if ($this->session->userdata('login') == true) {
			if ($this->session->userdata('klasifikasi') == 'admin') {
				$data['main_view'] = 'admin/v_lapor';
				$data['pelapor'] = $this->m_admin->getPelapor(['status' => '1']);
				$data['title'] = 'Laporan | Sistem Aspirasi & Pengaduan Masyarakat';
				$this->load->view('admin/template',$data);	
			} else {
				redirect('beranda/lapor');
			}
		} else {
			redirect('admin/login');
		}
	}

	public function hapusPelapor($id)
	{
		if ($this->m_admin->hapusPelapor($id)) {
			$this->session->set_flashdata('notif', 'Sukses');
			redirect('admin/pelapor');
		} else {
			$this->session->set_flashdata('notif', 'Gagal');
			redirect('admin/pelapor');
		}
	}

	public function updatePelapor()
	{
		$id = $this->input->post('id');
		$nama_tmp = $this->input->post('regNama');
		$data = $this->db->select('nama_pelapor, status')->where('id_pelapor', $id)->get('pelapor')->row_array();

		if ($this->m_admin->updatePelapor($id)) {
			$this->session->set_flashdata('notif', 'Update Sukses');
			if($data['status'] == "1"){

				redirect('admin/pelapor');
			}else{
				redirect('admin/pelapor_nonactive');

			}
		} else {
			// var_dump($nama);
			if($nama_tmp == $data['nama_pelapor']){

				$this->session->set_flashdata('notif', 'Data tidak ada yang dirubah');
			}else{

				$this->session->set_flashdata('notif', 'Update Gagal');
			}

			if($data['status'] == "1"){

				redirect('admin/pelapor');
			}else{
				redirect('admin/pelapor_nonactive');

			}
		}
	}

	public function chart()
	{
		$jan=0;$feb=0;$mar=0;$apr=0;$mei=0;$jun=0;$jul=0;$ags=0;$sep=0;$okt=0;$nov=0;$des=0;
		foreach ($this->m_admin->getWaktuLaporan() as $data) {
			if (substr($data->waktu_laporan,5,2) == 01) {
				$jan+=1;
			} elseif (substr($data->waktu_laporan,5,2) == 02) {
				$feb+=1;
			}elseif (substr($data->waktu_laporan,5,2) == 03) {
				$mar+=1;
			}elseif (substr($data->waktu_laporan,5,2) == 04) {
				$apr+=1;
			}elseif (substr($data->waktu_laporan,5,2) == 05) {
				$mei+=1;
			}elseif (substr($data->waktu_laporan,5,2) == 06) {
				$jun+=1;
			}elseif (substr($data->waktu_laporan,5,2) == 07) {
				$jul+=1;
			}elseif (substr($data->waktu_laporan,6,1) == 8) {
				$ags+=1;
			}elseif (substr($data->waktu_laporan,6,1) == 9) {
				$sep+=1;
			}elseif (substr($data->waktu_laporan,5,2) == 10) {
				$okt+=1;
			}elseif (substr($data->waktu_laporan,5,2) == 11) {
				$nov+=1;
			}elseif (substr($data->waktu_laporan,5,2) == 12) {
				$des+=1;
			}
		}

		$data = array(
			'jan' => $jan,
			'feb' => $feb,
			'mar' => $mar,
			'apr' => $apr,
			'mei' => $mei,
			'jun' => $jun,
			'jul' => $jul,
			'ags' => $ags,
			'sep' => $sep,
			'okt' => $okt,
			'nov' => $nov,
			'des' => $des,
		 );

		if ($this->session->userdata('login') == true) {
			if ($this->session->userdata('klasifikasi') == 'admin') {
				$data['donut1'] = $this->m_admin->donutChart(1);
				$data['donut2'] = $this->m_admin->donutChart(2);
				$data['donut3'] = $this->m_admin->donutChart(3);
				$data['donut4'] = $this->m_admin->donutChart(4);
				$data['main_view'] = 'admin/v_chart';
				$data['title'] = 'Dashboard | Sistem Aspirasi & Pengaduan Masyarakat';
				$this->load->view('admin/template',$data);	
			} else {
				redirect('beranda/lapor');
			}
		} else {
			redirect('admin/login');
		}
	}

	public function laporan()
	{
		if ($this->session->userdata('login') == true) {
			if ($this->session->userdata('klasifikasi') == 'admin') {
				$data['main_view'] = 'admin/v_laporan';
				$data['laporan'] = $this->m_lapor->getHistory1();
				$data['title'] = 'Laporan | Sistem Aspirasi & Pengaduan Masyarakat';
				$this->load->view('admin/template',$data);	
			} else {
				redirect('beranda/lapor');
			}
		} else {
			redirect('admin/login');
		}
	}

	public function progress()
	{
		if ($this->session->userdata('login') == true) {
			if ($this->session->userdata('klasifikasi') == 'admin') {
				$data['main_view'] = 'admin/v_progress';
				$data['title'] = 'Sedang Ditangani | Sistem Aspirasi & Pengaduan Masyarakat';
				if ($this->session->userdata('admin') == 1) {
					$data['laporan'] = $this->m_lapor->getHistoryVerif1('1');
				} else {
					$data['laporan'] = $this->m_lapor->getHistoryVerif('1');
				}
				$this->load->view('admin/template',$data);	
			} else {
				redirect('beranda/lapor');
			}
		} else {
			redirect('admin/login');
		}
	}

	public function progress_ditolak()
	{
		if ($this->session->userdata('login') == true) {
			if ($this->session->userdata('klasifikasi') == 'admin') {
				$data['main_view'] = 'admin/v_progress_ditolak';
				$data['title'] = 'Ditolak | Sistem Aspirasi & Pengaduan Masyarakat';
				if ($this->session->userdata('admin') == 1) {
					$data['laporan'] = $this->m_lapor->getHistoryVerif1('2');
				} else {
					$data['laporan'] = $this->m_lapor->getHistoryVerif('2');
				}
				$this->load->view('admin/template',$data);	
			} else {
				redirect('beranda/lapor');
			}
		} else {
			redirect('admin/login');
		}
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
			$this->load->view('admin/v_login');	
		}
	}

	public function auth() {
		if ($this->m_admin->login()) {
			redirect('admin');
		} else {
			$this->session->set_flashdata('failed', 'failed');
			redirect('admin/login');
		}
	}

	public function logout() {
		$this->session->sess_destroy();

		redirect('admin/login');
	}

	public function verif_lapor($id)
	{
		$data = $this->input->post('jenis');
		$data2 = $this->input->post('alasan');
		if ($this->m_admin->verifikasi(['status_verif' => $data, 'alasan' => $data2], $id)) {
			redirect('admin/laporan');	
		} else {
			redirect('admin/laporan');
		}
	}

	public function updateStatusAduan($id, $z)
	{
		$a = array('r' => true);
		if ($this->m_admin->updateStatusAduan($id, $z)) {
			echo json_encode($a);
		} else {
			$a['r'] = 'false';
			echo json_encode($a);
		}
	}

	public function lapor($ticket,$id)
	{
		$array = array(
			'ticket' => $ticket,
			'id_aduan' => $id
		);
		
		if ($this->session->userdata('login') == true) {
			if ($this->session->userdata('klasifikasi') == 'admin') {
				$this->session->set_userdata( $array );
				$data['main_view'] = 'admin/v_tangani_laporan';
				$data['aduan'] = $this->m_admin->detailAduan($ticket);
				$data['chat'] = $this->m_admin->getChat();
				$data['ditangani'] = $this->m_admin->ditanganiOleh();
				$this->load->view('admin/template', $data);	

				$this->output->enable_profiler(TRUE);
			} else {
				redirect('beranda/lapor');
			}
		} else {
			redirect('admin/login');
		}
	}

	public function updateDitangani()
	{
		$id = $this->session->userdata('id_aduan');
		if ($this->m_admin->updateDitangani($id)) {
			$this->session->set_flashdata('notif', 'Sukses');
			redirect('admin/lapor/'.$this->session->userdata('ticket').'/'.$this->session->userdata('id_aduan').'');
		} else {
			$this->session->set_flashdata('notif', 'Sukses');
			redirect('admin/lapor/'.$this->session->userdata('ticket').'/'.$this->session->userdata('id_aduan').'');
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
			if ($this->m_admin->uploadFile($this->upload->data())) {
				redirect($this->session->userdata('url'));
			} else {
				redirect($this->session->userdata('url'));
			}
		}
	}

	public function chat()
	{
		if ($this->m_admin->chat()) {
			redirect('admin/lapor/'.$this->session->userdata('ticket').'/'.$this->session->userdata('id_aduan').'');
		} else {
			redirect('admin/lapor/'.$this->session->userdata('ticket').'/'.$this->session->userdata('id_aduan').'');
		}
	}

	public function tampilChat($id)
	{
		if ($this->m_admin->tampilChat($id)) {
			redirect('admin/lapor/'.$this->session->userdata('ticket').'/'.$this->session->userdata('id_aduan').'');
		} else {
			redirect('admin/lapor/'.$this->session->userdata('ticket').'/'.$this->session->userdata('id_aduan').'');
		}
	}

	public function deleteChat($id)
	{
		if ($this->m_admin->deleteChat($id)) {
			redirect('admin/lapor/'.$this->session->userdata('ticket').'/'.$this->session->userdata('id_aduan').'');
		} else {
			redirect('admin/lapor/'.$this->session->userdata('ticket').'/'.$this->session->userdata('id_aduan').'');
		}
	}

	public function pelapor()
	{
		if ($this->session->userdata('login') == true) {
			if ($this->session->userdata('klasifikasi') == 'admin') {
				$data['pelapor'] = $this->m_admin->getPelapor('status = 1');
				$data['main_view'] = 'admin/v_pelapor';
				$data['title'] = 'Manajemen User Belum Aktif | Sistem Aspirasi & Pengaduan Masyarakat';
				$this->load->view('admin/template',$data);	
			} else {
				redirect('beranda/lapor');
			}
		} else {
			redirect('admin/login');
		}
	}

	public function pelapor_nonactive()
	{
		if ($this->session->userdata('login') == true) {
			if ($this->session->userdata('klasifikasi') == 'admin') {
				$data['pelapor'] = $this->m_admin->getPelapor('status = 0');
				$data['main_view'] = 'admin/v_pelapor_nonactive';
				$data['title'] = 'Manajemen User Belum Aktif | Sistem Aspirasi & Pengaduan Masyarakat';
				$this->load->view('admin/template',$data);	
			} else {
				redirect('beranda/lapor');
			}
		} else {
			redirect('admin/login');
		}
	}
	
	public function changeStatus(){
		$status = $this->input->post('status');
		$id_pelapor = $this->input->post('id_p');
		
		if($this->m_admin->changeStatus(['status' => $status], $id_pelapor)){
			if($status == "1"){

				$this->session->set_flashdata('notif', 'Status sukses diupdate menjadi Sudah Aktif');
				redirect('admin/pelapor');
			}else{
				$this->session->set_flashdata('notif', 'Status sukses diupdate menjadi Belum Aktif');
				redirect('admin/pelapor_nonactive');

			}
		}else{
			redirect('admin/pelapor');
			$this->session->set_flashdata('notif', 'Status gagal diupdate');
		}
	}

}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */